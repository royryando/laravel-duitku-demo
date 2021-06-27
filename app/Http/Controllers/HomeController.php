<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Royryando\Duitku\Facades\Duitku;

class HomeController extends Controller
{

    public function index() {
        $invoices = History::orderBy('created_at', 'DESC')
            ->get();
        return view('index', compact('invoices'));
    }

    /**
     * Step 1:
     * Collect data (customer name, email, product detail, price)
     */
    public function payment() {
        return view('payment');
    }

    /**
     * Step 2:
     * Store the data and get a list of payment methods
     */
    public function postPayment(Request $request) {
        $price = (int)$request->input('price');

        /*
         * Save order detail with the generated id
         */
        $invoice = new History();
        $invoice->code = 'DEMO'.time();
        $invoice->crm_name = $request->input('name');
        $invoice->crm_email = $request->input('email');
        $invoice->price = $price;
        $invoice->save();

        /*
         * Get a list of payment methods
         */
        $methods = Duitku::paymentMethods((int)$request->input('price'));

        return view('payment_method', compact('invoice', 'methods'));
    }

    /**
     * Step 3:
     * Call Duitku::createInvoice to create the invoice in Duitku
     * Make sure you save the payment url and reference id (this is useful for tracking the payment between application
     * and Duitku system, only if needed)
     */
    public function postPaymentMethod(Request $request) {
        $invoice = History::find($request->input('id'));
        if (!$invoice) abort(404);

        $method = $request->input('payment_method');
        /*
         * Create invoice
         */
        $response = Duitku::createInvoice($invoice->code, $invoice->price, $method, 'Demo Item', $invoice->crm_name, $invoice->crm_email, 30);
        if (!$response['success']) {
            abort(400, $response['message']);
        }

        $invoice->method = $method;
        $invoice->duitku_ref = $response['reference'];
        $invoice->payment_url = $response['payment_url'];
        $invoice->save();

        /*
         * Redirect to the payment url
         */
        return Redirect::to($invoice->payment_url);
    }

}
