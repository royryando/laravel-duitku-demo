@extends('layout')
@section('title', 'Select Payment Method')
@section('body')
    <div class="col-12 col-md-6 col-lg-6 mx-auto">
        <h2 class="text-center">Select Payment Method</h2>
        <hr>
        <form action="{{ route('payment-method.post') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $invoice->id }}" name="id">
            <table class="table table-sm table-striped">
                <tr>
                    <th>Name</th>
                    <td>{{ $invoice->crm_name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $invoice->crm_email }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>Rp{{ number_format($invoice->price, 0, 0, ',') }}</td>
                </tr>
            </table>
            <div class="form-group">
                <label for="payment_method">Payment Method:</label>
                @foreach($methods as $key => $method)
                    <div class="form-check my-2">
                        <input class="form-check-input" type="radio" name="payment_method" id="payment_method_{{$key}}" value="{{ $method['code'] }}">
                        <label for="payment_method_{{$key}}">
                            <img class="form-check-label" src="{{ $method['image'] }}" alt="{{ $method['name'] }}">
                        </label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary float-right">Pay Now</button>
        </form>
    </div>
@endsection
