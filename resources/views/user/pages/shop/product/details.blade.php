@extends('user.index')
@section('content')
    <section>
        <div class="relative  h-[calc(100vh-80px)]">
            <div
                class="absolute h-full w-full bg-linear-120 from-neutral/0 from-33% to-neutral to-70%  p-8 text-neutral-content flex items-end justify-start">
                <div class="flex flex-col gap-y-4">
                    <div class="text-xl font-bold"> نام فیلم</div>
                    <div>1404</div>
                    <div>
                        <button class="btn btn-primary">خرید فیلم</button>
                        <button class="btn  mr-2 btn-soft">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                 class="size-5">
                                <path fill-rule="evenodd"
                                      d="M4.5 5.653c0-1.427 1.529-2.33 2.779-1.643l11.54 6.347c1.295.712 1.295 2.573 0 3.286L7.28 19.99c-1.25.687-2.779-.217-2.779-1.643V5.653Z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <span>پیش نمایش</span>
                        </button>
                    </div>
                    <div class="opacity-75 font-medium"> دسته بندی</div>
                    <div class="opacity-75 font-medium">
                        <span>ستارگان:</span>
                        <div>
                            <span>بازیگر 1</span>
                            <span>بازیگر 2</span>
                            <span>بازیگر 3</span>
                            <span>بازیگر 4</span>
                            <span>بازیگر 5</span>
                            <span>بازیگر 6</span>
                        </div>
                    </div>
                    <div class="opacity-75 font-medium">
                        <span>کارگردان:</span>
                        <span>نام تستی</span>
                    </div>
                    <div class="opacity-75 font-medium text-sm">
                        <span class="text-primary">تگ 1</span>,
                        <span class="text-primary">تگ 2</span>,
                        <span class="text-primary">تگ 3</span>,
                        <span class="text-primary">تگ 4</span>,
                        <span class="text-primary">تگ 5</span>,
                        <span class="text-primary">تگ 6</span>
                    </div>
                </div>
            </div>
            <img src="{{ asset('/images/test-front/s1.jpg') }}"
                 class="w-full h-[calc(100vh-80px)] object-cover " alt="">

        </div>
        <div class="max-w-screen-xl mx-auto p-2 mt-8">

            {{-- about --}}
            <div class="p-4 rounded-box bg-base-200">
                <h3 class="block text-2xl font-medium flex items-center gap-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-7">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                    </svg>

                    درباره نام فیلم
                </h3>

                <div class="mt-6 opacity-75">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                    چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                    تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در
                    شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها
                    شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی
                    ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط
                    سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته
                    اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.

                </div>
            </div>

            {{-- download --}}
            <div class="p-4 rounded-box mt-4 bg-base-200">
                <h3 class="block text-2xl font-medium flex items-center gap-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-7">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                    </svg>

                    باکس دانلود
                </h3>

                <div class="mt-6">

                    <div role="alert" class="alert alert-error alert-soft">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75"
                             stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/>
                        </svg>

                        <span>برای دانلود باید ابتدا این فیلم را خریداری کنید!</span>
                    </div>


                    <div class="mt-3 flex flex-wrap">
                        <div class="basis-full">لینک مستقیم:</div>
                        <div class="basis-full md:basis-1/3 p-2">
                            <button class="btn w-full btn-success ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                                </svg>
                                کیفیت 1080p
                            </button>
                        </div>
                        <div class="basis-full md:basis-1/3 p-2">

                            <button class="btn w-full btn-success ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                                </svg>
                                کیفیت 720p
                            </button>
                        </div>
                        <div class="basis-full md:basis-1/3 p-2">
                            <button class="btn w-full btn-success ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                                </svg>
                                کیفیت 480p
                            </button>

                        </div>
                    </div>
                </div>
            </div>

            {{-- actors --}}
            <div class="p-4 rounded-box mt-4 bg-base-200">
                <h3 class="block text-2xl font-medium flex items-center gap-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-7">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/>
                    </svg>

                    بازیگران
                </h3>

                <div class="mt-6">
                    @component('user.components.categories') @endcomponent
                </div>
            </div>

            {{-- comments --}}
            <div class="p-4 rounded-box mt-4 bg-base-200">
                <h3 class="block text-2xl font-medium flex items-center gap-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-7">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"/>
                    </svg>

                    نظرات کاربران
                </h3>

                <div class="mt-6 ">
                    <div class="">


                        <div role="alert" class="alert alert-warning alert-soft">
                            <span>برای ثبت نظر باید ابتدا وارد شوید</span>
                        </div>

                        <div class="w-full mt-3 md:w-2/3 lg:w-1/2 xl:w-2/5">
                            <textarea class="textarea w-full block mb-2" placeholder="نظر شما"></textarea>
                            <button class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                </svg>

                                ثبت نظر
                            </button>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class=" lg:col-span-2 divide-y">
                        @php
                            $w = array(1,2,3,4,5,6);
                        @endphp
                        @foreach($w as $q)
                            <div class="border-base-300 p-2">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                         class="size-10">
                                        <path fill-rule="evenodd"
                                              d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                                              clip-rule="evenodd"/>
                                    </svg>

                                    <div class="opacity-75">نام کاربر</div>
                                </div>
                                <div class="mt-2">
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12 max-w-screen-xl mx-auto p-2">
            @component('user.components.sectionTitle',['title'=>'فیلم های مشابه'])
            @endcomponent
            @component('user.components.productSlider',['products'=>[]]) @endcomponent
        </div>
    </section>

@endsection
