@extends('app.layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $film->title }}</h2>
        <img src="{{ asset($film->image) }}" alt="{{ $film->title }}" class="img-fluid">
        <p>{{ $film->description }}</p>
        <p><strong>قیمت:</strong> {{ number_format($film->price) }} تومان</p>
        <form action="{{ route('cart.add', $film->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">اضافه به سبد خرید</button>
        </form>
    </div>
@endsection
