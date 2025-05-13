<section class="mx-auto">
    <div id="hero-swiper" class="swiper hero sm:h-[calc(100vh-80px)]  hero-swiper w-full" >
        <div class="swiper-wrapper  w-full" >
            @php
                $sliders = [
                    '/images/test-front/s1.jpg',
                    '/images/test-front/s2.jpg',
                    '/images/test-front/s3.jpg',
                    '/images/test-front/s4.jpg',
                    '/images/test-front/s5.jpg',
                ];
            @endphp
            @foreach ($sliders as $slider)
                <div class="swiper-slide overflow-hidden ">
                    {{-- <a href="{{ $slider->button_link }}" class="w-full h-full"> --}}
                    {{-- h-[200px] md:h-[300px] lg:h-[450px] --}}
                    <img
                        class="slider-image w-full rounded-0  lg:rounded-box h-full  object-center object-cover "
                        {{-- src="{{ asset('storage/' . $slider->image) }}" --}}
                        src="{{asset($slider)}}"
                        alt="{{ $slider }}">
                    {{-- </a> --}}
                </div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination "></div>
    </div>

</section>
