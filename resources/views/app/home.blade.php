@extends('app.layouts.app')

@section('content')
    <!-- نمایش جدیدترین فیلم‌ها -->
    <div class="container">
        <h2>جدیدترین فیلم‌ها</h2>
        <div class="row">
            @foreach($films as $film)
                <div class="col-md-3">
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
