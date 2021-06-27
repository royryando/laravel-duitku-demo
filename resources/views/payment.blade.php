@extends('layout')
@section('title', 'Payment')
@section('body')
    <div class="col-12 col-md-6 col-lg-6 mx-auto">
        <h2 class="text-center">Payment</h2>
        <hr>
        <form action="{{ route('payment.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" min="10000" id="price" name="price" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary float-right">Next</button>
        </form>
    </div>
@endsection
