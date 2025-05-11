@extends('layouts.app')

@section('title', 'سبد خرید')

@section('content')
    <div class="container">
        <h2>سبد خرید</h2>
        <table class="table">
            <thead>
            <tr>
                <th>عنوان فیلم</th>
                <th>قیمت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cart as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ number_format($item->price) }} تومان</td>
                    <td>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-between">
            <h4>جمع کل: {{ number_format($totalPrice) }} تومان</h4>
            <a href="{{ route('payment.index') }}" class="btn btn-success">پرداخت</a>
        </div>
    </div>
@endsection
