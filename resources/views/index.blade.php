<x-guest-layout>
    <div class="flex justify-between -mt-2 mb-4">
        @foreach ($categories->slice(0, 7) as $category)
            <a href="javascript:void(0)" class="transition duration-300 ease-in-out hover:text-blue-500 text-sm">
                {{ $category->name }}
            </a>
        @endforeach
    </div>

    <x-swiper>
        <div class="swiper-slide aspect-w-16 aspect-h-4"><img class="rounded" src="{{ asset('images/sliders/slider-desktop.webp') }}" /></div>
        <div class="swiper-slide aspect-w-16 aspect-h-4"><img class="rounded" src="{{ asset('images/sliders/rev-hlw-slider-desktop-2.webp') }}" /></div>
        <div class="swiper-slide aspect-w-16 aspect-h-4"><img class="rounded" src="{{ asset('images/sliders/slider-desktop (1).webp') }}" /></div>
    </x-swiper>

    <div class="grid grid-cols-12 grid-flow-row gap-4 mt-4 mb-8">
        <div class="col-span-12 sm:col-span-9">
            <div class="aspect-w-16 aspect-h-2"><img src="{{ asset('images/sliders/sisip-panjang-desktop.webp') }}" class="rounded"/></div>
        </div>
        <div class="col-span-12 sm:col-span-3">
            <img src="{{ asset('images/sliders/sisip-pendek-desktop.webp') }}" class="rounded w-full h-full"/>
        </div>
    </div>

    <div class="pb-8 mb-8 border-b">
        <div class="w-full bg-blue-500 rounded h-64 relative">
            <div class="absolute inset-0 flex flex-col items-center justify-start pt-8">
                <div class="text-white text-center text-xl font-bold">
                    Flash Sale
                </div>
                <p class="text-white text-center mb-4">
                    Akan berakhir dalam
                </p>
            </div>
        </div>
        <div class="grid grid-cols-12 grid-flow-row gap-4 -mt-40 mx-4">
            @foreach ($products as $product)
                <a href="{{ route('show', $product->slug) }}" class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3 xl:col-span-2 border border-gray-200 rounded bg-white">
                    <div class="aspect-w-1 aspect-h-1">
                        <img src="{{ $product->picture_1 }}" alt="" class="w-full h-full rounded-t object-cover">
                    </div>
                    <div class="p-2">
                        <div class="flex flex-col justify-between h-full">
                            <p class="font-bold text-orange-500 tracking-wide">
                                Rp{{ number_format($product->price, 0, '.', '.') }}
                            </p>
                            <p class="text-gray-600 text-sm mb-1">
                                {{ $product->name }}
                            </p>
                            <p class="flex text-xs items-center mb-2">
                                {{-- TODO: Ulasan --}}
                                <x-phosphor-star-fill class="w-4 h-4 text-yellow-400" />
                                <span class="border-r border-gray-300 pr-2 mx-1">
                                    {{ rand(1, 5) }}
                                </span>
                                <span>
                                    {{ rand(1, 50) }}
                                    Ulasan
                                </span>
                            </p>
                            <button class="transition duration-300 ease-in-out text-center w-full text-sm bg-blue-500 hover:bg-blue-600 rounded p-2 text-white mt-auto">
                                Lihat Produk
                            </button>
                        </div>
                    </div>
                </a>
            @endforeach
            <a href="javascript:void(0)" class="transition duration-300 ease-in-out col-span-12 py-2 text-center border border-blue-500 rounded text-blue-500 hover:text-white hover:bg-blue-500">
                Lihat Semua Produk Penawaran Spesial
            </a>
        </div>
    </div>

    <section class="border-b pb-8 mb-8">
        <h5 class="text-xl font-bold">
            Penawaran Spesial Hari Ini
        </h5>
        <div class="overflow-x-scroll">
            <div class="flex">
                @foreach ($categories as $category)
                    <a href="javascript:void(0)" class="transition duration-300 first-of-type:pl-0 ease-in-out border-b flex-grow flex-shrink-0 px-6 py-2 hover:border-b-orange-500 hover:font-bold hover:text-orange-500">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="pt-4">
            <div class="grid grid-cols-6 grid-flow-row gap-4">
                <div class="col-span-6 sm:col-span-3 md:col-span-2">
                    <div class="aspect-w-1 aspect-h-1">
                        <img src="{{ asset('images/sliders/diskon-kaget-hemat-hingga-50-persen-47194-thumbnail-1658386406.webp') }}" class="w-full h-full rounded" />
                    </div>
                </div>
                @foreach ($products->slice(0, 4) as $product)
                    <a href="{{ route('show', $product->slug) }}" class="col-span-6 sm:col-span-3 md:col-span-2 lg:col-span-1 border border-gray-200 rounded bg-white">
                        <div class="aspect-w-1 aspect-h-1">
                            <img src="{{ $product->picture_1 }}" alt="" class="w-full h-full rounded-t object-cover">
                        </div>
                        <div class="p-2">
                            <div class="flex flex-col justify-between h-full">
                                <p class="font-bold text-orange-500 tracking-wide">
                                    Rp{{ number_format($product->price, 0, '.', '.') }}
                                </p>
                                <p class="text-gray-600 text-sm mb-1">
                                    {{ $product->name }}
                                </p>
                                <p class="flex text-xs items-center mb-2">
                                    {{-- TODO: Ulasan --}}
                                    <x-phosphor-star-fill class="w-4 h-4 text-yellow-400" />
                                    <span class="border-r border-gray-300 pr-2 mx-1">
                                        {{ rand(1, 5) }}
                                    </span>
                                    <span>
                                        {{ rand(1, 50) }}
                                        Ulasan
                                    </span>
                                </p>
                                <button class="transition duration-300 ease-in-out text-center w-full text-sm bg-blue-500 hover:bg-blue-600 rounded p-2 text-white mt-auto">
                                    Lihat Produk
                                </button>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="pb-8 mb-8 border-b">
        <h5 class="text-xl font-bold mb-4">
            Kategori Pilihan
        </h5>
        <div class="grid grid-cols-8 grid-flow-row gap-8">
            @foreach ($categories->slice(0, 8) as $category)
                <div class="col-span-8 sm:col-span-4 md:col-span-2 lg:col-span-1">
                    <div class="aspect-w-1 aspect-h-1 mb-2">
                        <img src="https://via.placeholder.com/200x200.png" class="w-full h-full rounded" />
                    </div>
                    <div class="text-sm text-center">
                        {{ $category->name }}
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="pb-8 mb-8 border-b">
        <h5 class="text-xl font-bold mb-4">
            Penawaran Saat Ini
        </h5>
        <div class="grid grid-cols-12 grid-flow-row gap-8">
            <div class="col-span-12 sm:col-span-6">
                <img src="{{ asset('images/sliders/penawaran-saat-ini-desktop.webp') }}" class="rounded" />
            </div>
            <div class="col-span-12 sm:col-span-6">
                <img src="{{ asset('images/sliders/penwaran-saatini-orange-desktop.webp') }}" class="rounded" />
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-4">
                <img src="{{ asset('images/sliders/oe-desktop.webp') }}" class="rounded" />
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-4">
                <img src="{{ asset('images/sliders/produk-terlaris-desktop.webp') }}" class="rounded" />
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-4">
                <img src="{{ asset('images/sliders/bogo-kuning-desktop.webp') }}" class="rounded" />
            </div>
        </div>
    </section>

    <section class="pb-8 mb-8 border-b">
        <h5 class="text-xl font-bold mb-4">
            Produk yang Sempat Anda Cari
        </h5>
        <div class="grid grid-cols-12 grid-flow-row gap-8">
            @foreach ($products->slice(0, 12) as $product)
                <a href="{{ route('show', $product->slug) }}" class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3 xl:col-span-2 border border-gray-200 rounded bg-white">
                    <div class="aspect-w-1 aspect-h-1">
                        <img src="{{ $product->picture_1 }}" alt="" class="w-full h-full rounded-t object-cover">
                    </div>
                    <div class="p-2">
                        <div class="flex flex-col justify-between h-full">
                            <p class="font-bold text-orange-500 tracking-wide">
                                Rp{{ number_format($product->price, 0, '.', '.') }}
                            </p>
                            <p class="text-gray-600 text-sm mb-1">
                                {{ $product->name }}
                            </p>
                            <p class="flex text-xs items-center mb-2">
                                {{-- TODO: Ulasan --}}
                                <x-phosphor-star-fill class="w-4 h-4 text-yellow-400" />
                                <span class="border-r border-gray-300 pr-2 mx-1">
                                    {{ rand(1, 5) }}
                                </span>
                                <span>
                                    {{ rand(1, 50) }}
                                    Ulasan
                                </span>
                            </p>
                            <button class="transition duration-300 ease-in-out text-center w-full text-sm bg-blue-500 hover:bg-blue-600 rounded p-2 text-white mt-auto">
                                Lihat Produk
                            </button>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
</x-guest-layout>