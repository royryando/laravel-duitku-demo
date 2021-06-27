<?php

namespace App\Http\Controllers;

use App\Models\History;
use Royryando\Duitku\Http\Controllers\DuitkuBaseController;

class CallbackController extends DuitkuBaseController
{

    /**
     * Step 4:
     * Get the success payment callback by overriding this function and update the status in database
     */
    protected function onPaymentSuccess(string $orderId, string $productDetail, int $amount, string $paymentCode, ?string $shopeeUserHash, string $reference, ?string $additionalParam): void
    {
        $invoice = History::where('code', $orderId)->first();
        if (!$invoice) return;
        $invoice->paid = $amount;
        $invoice->save();
    }

    /**
     * Step 5:
     * Setup on failed function too by overriding this function
     */
    protected function onPaymentFailed(string $orderId, string $productDetail, int $amount, string $paymentCode, ?string $shopeeUserHash, string $reference, ?string $additionalParam): void
    {
        $invoice = History::where('code', $orderId)->first();
        if (!$invoice) return;
        /*
         * Transaction failed, just delete
         */
        $invoice->delete();
    }

    /**
     * Step 6:
     * Create your own return callback function
     */
    public function myReturnCallback() {
        return 'You can close this page';
    }

}
