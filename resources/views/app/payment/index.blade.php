@extends('app.layouts.app')
@section('title', 'پرداخت')

@section('content')
    <h2>پرداخت</h2>
    <p>جمع کل:  تومان</p>

    <form action="{{ route('payment.store') }}" method="POST">
        @csrf
        <button class="btn btn-primary">پرداخت آنلاین</button>
    </form>
@endsection
