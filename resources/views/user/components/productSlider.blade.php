<div class=" swiper product-slider">
    <div class="swiper-wrapper py-4 rounded-box">
        @php
            $x = array(1,2,3,4,5);
        @endphp
        @foreach ($x as $product)
            @component('user.components.productCard', ['product' => $product])
            @endcomponent
        @endforeach

    </div>
</div>
