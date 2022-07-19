<div
    x-data="{ closed: false }"
    class="bg-blue-500 relative z-30"
    x-show="!closed"
    x-transition
>
    <div class="text-xs md:text-base mx-auto max-w-7xl p-2 flex justify-between items-center">
        <div class="flex items-center">
            <a href="javascript:void(0)" x-on:click="closed = true">
                <x-phosphor-x-circle-fill class="w-6 h-6 text-white opacity-75" />
            </a>
            <div class="font-semibold text-white ml-4 hidden sm:flex">
                Belanja hemat bebas ongkir*
            </div>
        </div>
        <div class="text-white flex items-center ml-4">
            <span class="underline">Download Aplikasi kreditin.id</span>
            <x-phosphor-arrow-right-bold class="w-4 h-4 ml-4 hidden sm:block" />
        </div>
        <div class="hidden sm:flex">
            <img src="{{ asset('images/google-play-badge.png') }}" class="h-6 md:h-8 object-contain">
            <img src="{{ asset('images/app-store-badge.svg') }}" class="h-6 md:h-8 ml-2 object-contain">
        </div>
    </div>
</div>

<header
    class="border-b p-4 sm:p-2 sticky top-0 z-30 bg-white"
    x-data="{
        categoryOpened: false,
    }"
>
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <a href="{{ route('index') }}" class="text-2xl lg:text-3xl font-bold tracking-wider">
            Kredit<span class="text-blue-500">IN</span>
        </a>
        <form action="{{ route('search') }}" class="flex-grow px-4 relative mx-2 md:mx-4 hidden sm:flex">
            <a
                href="javascript:void(0)"
                x-on:click="categoryOpened = !categoryOpened"
                class="hidden lg:flex w-64 border border-gray-300 rounded-l border-r-0 items-center px-4"
            >
                <x-phosphor-list-dashes-bold class="w-4 md:w-6 h-4:h-6" />
                <span class="ml-2 text-xs">
                    Kategori Belanja
                </span>
            </a>
            <input
                type="text"
                name="query"
                class="w-full h-full border border-gray-300 text-xs md:text-sm"
                placeholder="Cari produk atau merek..."
                value="{{ request()->get('query') ?? '' }}"
            >
            <button type="submit" class="bg-blue-500 rounded-r w-16 flex justify-center items-center">
                <x-phosphor-magnifying-glass-bold class="text-white w-4 h-4" />
            </button>
        </form>
        <div class="items-center flex">
            <a href="javascript:void(0)" class="transition duration-300 ease-in-out items-center hover:bg-gray-200 p-2 rounded h-full flex sm:hidden">
                <x-phosphor-magnifying-glass-bold class="w-4 md:w-6 h-4:h-6" />
            </a>
            <a href="javascript:void(0)" class="transition duration-300 ease-in-out flex items-center hover:bg-gray-200 p-2 rounded h-full">
                <x-phosphor-shopping-cart-simple-bold class="w-4 md:w-6 h-4:h-6" />
                <span class="ml-2 text-sm w-6 h-6 rounded-full bg-gray-200 items-center justify-center hidden sm:flex">
                    0
                </span>
            </a>
            <a href="javascript:void(0)" class="transition duration-300 ease-in-out flex items-center hover:bg-gray-200 p-2 rounded h-full ml-0 md:ml-3">
                <x-phosphor-bell-bold class="w-4 md:w-6 h-4:h-6" />
                <span class="ml-3 text-sm w-6 h-6 rounded-full bg-gray-200 items-center justify-center hidden sm:flex">
                    0
                </span>
            </a>
            <a href="javascript:void(0)" class="transition duration-300 ease-in-out flex items-center hover:bg-gray-200 p-2 rounded h-full ml-0 md:ml-3">
                <x-phosphor-notebook-bold class="w-4 md:w-6 h-4:h-6" />
                <span class="ml-4 text-xs leading-4 hidden sm:flex">
                    Status<br/>Pesanan
                </span>
            </a>
            <a href="{{ route('login') }}" class="transition duration-300 ease-in-out flex items-center hover:bg-gray-200 p-2 rounded h-full ml-0 md:ml-3">
                <x-phosphor-user-bold class="w-4 md:w-6 h-4 md:h-6" />
                <span class="ml-4 text-xs hidden sm:flex">
                    @auth
                    {{ auth()->user()->name }}
                    @endauth
                    @guest()
                        Masuk / Daftar
                    @endguest
                </span>
            </a>
        </div>
    </div>

    <div
        x-cloak
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-show="categoryOpened"
        class="bg-white w-full absolute z-30 left-0 top-16"
    >
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-12 grid-flow-row">
                <a href="javascript:void(0)" class="transition duration-300 ease-in-out flex flex-col items-center hover:shadow-lg px-2 py-3">
                    <x-phosphor-armchair-thin class="w-10 h-10" />
                    <p class="text-[0.65rem] text-center">
                        Rumah<br/>
                        Tangga
                    </p>
                </a>
                <a href="javascript:void(0)" class="transition duration-300 ease-in-out flex flex-col items-center hover:shadow-lg px-2 py-3">
                    <x-phosphor-cooking-pot-thin class="w-10 h-10" />
                    <p class="text-[0.65rem] text-center">
                        Alat<br/>
                        Dapur
                    </p>
                </a>
                <a href="javascript:void(0)" class="transition duration-300 ease-in-out flex flex-col items-center hover:shadow-lg px-2 py-3">
                    <x-phosphor-lamp-thin class="w-10 h-10" />
                    <p class="text-[0.65rem] text-center">
                        Furnitur
                    </p>
                </a>
                <a href="javascript:void(0)" class="transition duration-300 ease-in-out flex flex-col items-center hover:shadow-lg px-2 py-3">
                    <x-phosphor-hard-drives-thin class="w-10 h-10" />
                    <p class="text-[0.65rem] text-center">
                        Rak dan<br/>
                        Penyimpanan
                    </p>
                </a>
                <a href="javascript:void(0)" class="transition duration-300 ease-in-out flex flex-col items-center hover:shadow-lg px-2 py-3">
                    <x-phosphor-shower-thin class="w-10 h-10" />
                    <p class="text-[0.65rem] text-center">
                        Bed &<br/>
                        Bath
                    </p>
                </a>
                <a href="javascript:void(0)" class="transition duration-300 ease-in-out flex flex-col items-center hover:shadow-lg px-2 py-3">
                    <x-phosphor-frame-corners-thin class="w-10 h-10" />
                    <p class="text-[0.65rem] text-center">
                        Home<br/>
                        Improvement
                    </p>
                </a>
                <a href="javascript:void(0)" class="transition duration-300 ease-in-out flex flex-col items-center hover:shadow-lg px-2 py-3">
                    <x-phosphor-poker-chip-thin class="w-10 h-10" />
                    <p class="text-[0.65rem] text-center">
                        Otomotif
                    </p>
                </a>
                <a href="javascript:void(0)" class="transition duration-300 ease-in-out flex flex-col items-center hover:shadow-lg px-2 py-3">
                    <x-phosphor-handbag-thin class="w-10 h-10" />
                    <p class="text-[0.65rem] text-center">
                        Hobi dan<br/>
                        Gaya Hidup
                    </p>
                </a>
                <a href="javascript:void(0)" class="transition duration-300 ease-in-out flex flex-col items-center hover:shadow-lg px-2 py-3">
                    <x-phosphor-bicycle-thin class="w-10 h-10" />
                    <p class="text-[0.65rem] text-center">
                        Kesehatan dan<br/>
                        Olahraga
                    </p>
                </a>
                <a href="javascript:void(0)" class="transition duration-300 ease-in-out flex flex-col items-center hover:shadow-lg px-2 py-3">
                    <x-phosphor-device-mobile-thin class="w-10 h-10" />
                    <p class="text-[0.65rem] text-center">
                        Elektronik dan<br/>
                        Gadget
                    </p>
                </a>
                <a href="javascript:void(0)" class="transition duration-300 ease-in-out flex flex-col items-center hover:shadow-lg px-2 py-3">
                    <x-phosphor-pinwheel-thin class="w-10 h-10" />
                    <p class="text-[0.65rem] text-center">
                        Mainan
                    </p>
                </a>
                <a href="javascript:void(0)" class="transition duration-300 ease-in-out flex flex-col items-center hover:shadow-lg px-2 py-3">
                    <x-phosphor-tag-thin class="w-10 h-10" />
                    <p class="text-[0.65rem] text-center">
                        Best Deals
                    </p>
                </a>
            </div>

            <div class="grid grid-cols-12 grid-flow-row gap-2 my-2 mb-4">
                @for ($i = 0; $i < 6; $i++)
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3 xl:col-span-2">
                        <p class="text-sm text-blue-500">{{ fake()->department }}</p>
                        <ol>
                            @for ($j = 0; $j < rand(1, 10); $j++)
                                <li>
                                    <a class="transition duration-300 ease-in-out hover:text-blue-500 text-xs" href="{{ route('category', $category = str()->slug(fake()->department)) }}">
                                        {{ str()->headline($category) }}
                                    </a>
                                </li>
                            @endfor
                        </ol>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div
        x-cloak
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-on:click="categoryOpened = false"
        x-show="categoryOpened"
        class="bg-black/50 w-full h-screen absolute z-20 left-0 top-16"
    ></div>
</header>