<div class="navbar  bg-base-300 p-0 flex-wrap h-[80px]">
    <div class="basis-full flex justify-between items-center px-2 py-4  max-w-screen-xl mx-auto">
        <div class=" basis-1/2 lg:basis-1/4 gap-2 flex items-center">
            <div class="dropdown">
                <label for="my-drawer-4" class="drawer-button btn btn-ghost btn-circle lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h8m-8 6h16"/>
                    </svg>
                </label>
            </div>
            <a href="{{route('home')}}"
               class="text-primary text-2xl lg:text-3xl font-bold">{{config('app.site_name')}}</a>
        </div>
        <div class=" hidden lg:flex justify-center align-center basis-5/12">
            <div class=" w-full">
                <div class="mx-auto relative max-w-96 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" class="size-6 opacity-50 absolute z-2 right-2 top-2.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                    </svg>

                    <input type="search" class="input pr-8 focus:outline-none max-w-96 w-full" required
                           placeholder="جستجو..."/>
                </div>
            </div>
        </div>
        <div class="text-left basis-1/2 lg:basis-1/4  gap-2">
            <button id="light-btn" class="btn  btn-circle" onclick="setTheme('light')">
                {{--sun--}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75"
                     stroke="currentColor" class="size-5 lg:size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"/>
                </svg>
            </button>
            <button id="dark-btn" class="btn  btn-circle" onclick="setTheme('dark')">
                {{--moon--}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75"
                     stroke="currentColor" class="size-5 lg:size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z"/>
                </svg>
            </button>
            <button class="btn  btn-circle btn-primary btn-soft">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75"
                     stroke="currentColor" class="size-5 lg:size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                </svg>
            </button>
        </div>
    </div>
</div>
<div class="drawer drawer-start">
    <input id="my-drawer-4" type="checkbox" class="drawer-toggle"/>
    <div class="drawer-content">

    </div>
    <div class="drawer-side z-10">
        <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>


        <div class="bg-base-200 text-base-content min-h-full w-full relative  max-w-80 px-2 py-4">


            <div class="flex justify-between items-center">
                <span
                    class="text-primary text-2xl lg:text-3xl font-bold">{{config('app.site_name')}}
                </span>
                <label for="my-drawer-4" class="drawer-button btn btn-ghost btn-circle ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                    </svg>
                </label>
            </div>
            <div class="divider"></div>

            <div class="flex flex-col gap-y-3 mt-5">
                <a class="bg-primary text-primary-content p-2 rounded-box flex items-center gap-x-2" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                    </svg>

                    <span>صفحه اصلی</span>
                </a>
                <a class=" p-2 rounded-box flex items-center gap-x-2" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/>
                    </svg>

                    <span>دسته بندی ها</span>
                </a>
                <a class=" p-2 rounded-box flex items-center gap-x-2" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>

                    <span>پروفایل</span>
                </a>
                <a class=" p-2 rounded-box flex items-center gap-x-2" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                    </svg>

                    <span>دانلود های من</span>
                </a>
            </div>

            <a href="#" class="btn btn-primary  bottom-0 btn-block w-[calc(100%-16px)] mx-auto absolute bottom-0 right-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                     stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                </svg>
                <span>ورود</span>
            </a>
        </div>
    </div>
</div>
