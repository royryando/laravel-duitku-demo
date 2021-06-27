@extends('layout')
@section('title', 'Home')
@section('body')
    <div class="col-12">
        <h2 class="text-center">Payment History</h2>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Price</th>
                    <th>Amount Paid</th>
                    <th>Reference ID</th>
                </tr>
                </thead>
                <tbody>
                @foreach($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->code }}</td>
                        <td>{{ $invoice->crm_name }}</td>
                        <td>{{ $invoice->crm_email }}</td>
                        <td>Rp{{ number_format($invoice->price, 0, 0, ',') }}</td>
                        <td>Rp{{ number_format((int)$invoice->paid, 0, 0, ',') }}</td>
                        <td>{{ $invoice->duitku_ref }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
