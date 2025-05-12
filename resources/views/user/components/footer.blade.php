<footer class="bg-base-300 p-2 md:p-4 mt-12">
    <div class="flex flex-wrap items-start justify-between">
        <div class="basis-full sm:basis-1/4 p-2">
            <div class="font-bold text-primary text-lg md:text-2xl">{{config('app.site_name')}}</div>
            <div class="mt-8">راه های ارتباطی</div>
            <div class="flex items-center mt-2 gap-2">
                <a href="#"><img src="{{asset('instagram.svg')}}" class="w-8 opacity-75" alt=""></a>
                <a href="#"><img src="{{asset('telegram.svg')}}" class="w-8 opacity-75" alt=""></a>
                <a href="#"><img src="{{asset('whatsapp.svg')}}" class="w-8 opacity-75" alt=""></a>
            </div>
        </div>
        <div class="basis-full sm:basis-1/4 text-center p-2">
            <div class="font-medium">دسترسی سریع</div>
            <div class="flex flex-col gap-y-2 mt-2">
                <a href="#" class="opacity-75 text-sm">صفحه اصلی</a>
                <a href="#" class="opacity-75 text-sm">فیلم ها</a>
                <a href="#" class="opacity-75 text-sm">دسته بندی ها</a>
                <a href="#" class="opacity-75 text-sm">حساب کاربری</a>
            </div>
        </div>
        <div class="basis-full sm:basis-1/4 flex flex-row flex-wrap p-2">
            <img src="{{asset('/images/test-front/samandehi.png')}}" class="w-full mx-auto max-w-[80px]" alt="">
            <img src="{{asset('/images/test-front/enamad.png')}}" class="w-full mx-auto max-w-[80px]" alt="">
        </div>
    </div>
</footer>
