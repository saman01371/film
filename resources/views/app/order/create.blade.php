@extends('app.layouts.app')
@section('title', 'ثبت سفارش')

@section('content')
    <h2>ثبت سفارش</h2>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">نام و نام خانوادگی</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email">ایمیل</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="mb-3">
            <label for="address">آدرس</label>
            <textarea name="address" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">تأیید و ادامه به پرداخت</button>
    </form>
@endsection
