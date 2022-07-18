<div
    x-data="{ closed: false }"
    class="bg-blue-500"
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

<header class="border-b p-4 sm:p-2 sticky top-0 z-30 bg-white">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <a href="{{ route('index') }}" class="text-2xl lg:text-3xl font-bold tracking-wider">
            Kredit<span class="text-blue-500">IN</span>
        </a>
        <form action="{{ route('search') }}" class="flex-grow px-4 relative mx-2 md:mx-4 hidden sm:flex">
            <div class="hidden lg:flex w-64 border border-gray-300 rounded-l border-r-0 items-center px-4">
                <x-phosphor-list-dashes-bold class="w-4 md:w-6 h-4:h-6" />
                <span class="ml-2 text-xs">
                    Kategori Belanjang
                </span>
            </div>
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
            <a href="javascript:void(0)" class="transition duration-300 ease-in-out flex items-center hover:bg-gray-200 p-2 rounded h-full ml-0 md:ml-3">
                <x-phosphor-user-bold class="w-4 md:w-6 h-4 md:h-6" />
                <span class="ml-4 text-xs hidden sm:flex">
                    Masuk / Daftar
                </span>
            </a>
        </div>
    </div>
</header>