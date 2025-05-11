@extends('app.layouts.app')

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
            @foreach($cart as $film)
                <tr>
                    <td>{{ $film->name }}</td>
                    <td>{{ number_format($film->price) }} تومان</td>
                    <td>
                        <form action="{{ route('cart.remove', $film->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h4>جمع کل: {{ number_format($totalPrice) }} تومان</h4>
        <a href="{{ route('payment.index') }}" class="btn btn-primary">پرداخت</a>
    </div>
@endsection
