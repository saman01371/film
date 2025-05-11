@extends('app.layouts.app')

@section('title', $category->name)

@section('content')
    <div class="container">
        <h2>{{ $category->name }}</h2>
        <div class="row">
            @foreach($category->films as $film)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $film->thumbnail) }}" class="card-img-top" alt="{{ $film->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $film->title }}</h5>
                            <p class="card-text">{{ Str::limit($film->description, 100) }}</p>
                            <a href="{{ route('films.show', $film->id) }}" class="btn btn-primary">مشاهده جزئیات</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
