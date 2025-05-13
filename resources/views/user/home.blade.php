@extends('user.index')
@section('content')
    @include('user.components.hero')
    @include('user.components.banners')
    <div class="mt-16 max-w-screen-xl mx-auto">
        @component('user.components.sectionTitle',['title'=>'ویژه'])
        @endcomponent
        @component('user.components.productSlider',['products'=>[]]) @endcomponent
    </div>
    <div class="mt-12 max-w-screen-xl mx-auto px-2">
        @component('user.components.sectionTitle',['title'=>'بازیگران'])
        @endcomponent
        @include('user.components.categories')
    </div>
    <div class="mt-16 max-w-screen-xl mx-auto">
        @component('user.components.sectionTitle',['title'=>'جدیدترین فیلم‌ها'])
        @endcomponent
        @component('user.components.productSlider',['products'=>[$films]]) @endcomponent
    </div>
@endsection
