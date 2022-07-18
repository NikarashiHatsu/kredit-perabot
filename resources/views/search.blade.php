<x-guest-layout>
    <div class="grid grid-cols-12 grid-flow-row gap-6">
        <div class="col-span-12 sm:col-span-5 md:col-span-4 lg:col-span-3">
            <div class="bg-orange-100 p-4 text-sm mb-6">
                Menampilkan <b>{{ $productCount = rand(1, 48) }}</b> produk dalam <b>Semua Kategori</b>
                dengan kata kunci <b>{{ request()->get('query') }}</b>
            </div>

            <div class="bg-white border rounded mb-6 sticky">
                <div class="p-4 flex justify-between items-center border-b">
                    <p class="font-semibold text-gray-600">Urut Berdasarkan</p>
                    <a href="javascript:void(0)" class="text-orange-600 text-sm">Reset</a>
                </div>
                <div class="p-4">
                    <select name="order" class="border border-gray-300 rounded text-sm w-full">
                        <option value="palingRelevan">Paling Relevan</option>
                        <option value="hargaTermurah">Harga Termurah</option>
                        <option value="hargaTermahal">Harga Termahal</option>
                        <option value="produkTerbaru">Produk Terbaru</option>
                        <option value="diskonTerendah">Diskon Terendah</option>
                        <option value="diskonTertinggi">Diskon Tertinggi</option>
                        <option value="ulasanTerbanyak">Ulasan Terbanyak</option>
                        <option value="ratingTertinggi">Rating Tertinggi</option>
                    </select>
                </div>
            </div>

            <div class="sticky top-0">
                <div class="bg-white border rounded">
                    <div class="p-4 flex justify-between items-center border-b">
                        <p class="text-base font-semibold text-gray-600">Filter</p>
                        <a href="javascript:void(0)" class="text-orange-600 text-sm">Reset</a>
                    </div>
                    <div class="p-4 border-b">
                        <p class="text-gray-600 mb-2">Harga</p>
                        <div class="flex justify-between items-center">
                            <input
                                type="number"
                                name="hargaMinimum"
                                class="text-xs p-2 border border-gray-300 rounded w-full mr-2"
                                placeholder="Harga Minimum"
                            >
                            <input
                                type="number"
                                name="hargaMaximum"
                                class="text-xs p-2 border border-gray-300 rounded w-full ml-2"
                                placeholder="Harga Maximum"
                            >
                        </div>
                    </div>
                    <div class="p-4 border-b">
                        <p class="text-gray-600 mb-2">Lokasi Pengiriman</p>
                        <p class="font-bold mb-2">Daerah, Kota, Provinsi</p>
                        <button class="transition duration-300 ease-in-out hover:bg-orange-500 hover:border-orange-600 hover:text-white border border-gray-300 rounded w-full flex items-center justify-center py-2 text-xs">
                            <x-phosphor-map-pin class="w-4 h-4" />
                            <span class="ml-2">
                                Ubah
                            </span>
                        </button>
                    </div>
                    <div class="p-4 border-b">
                        <p class="text-gray-600 mb-2">Dukungan Pengiriman</p>
                        <div class="flex items-center mb-2">
                            <input type="checkbox" name="dukunganPengiriman" id="sameDayDelivery" value="sameDayDelivery" class="border border-gray-300 rounded" />
                            <label for="sameDayDelivery" class="ml-2 text-sm">Same Day Delivery</label>
                        </div>
                        <div class="flex items-center mb-2">
                            <input type="checkbox" name="dukunganPengiriman" id="regularDelivery" value="regularDelivery" class="border border-gray-300 rounded" />
                            <label for="regularDelivery" class="ml-2 text-sm">Regular Delivery</label>
                        </div>
                        <div class="flex items-center mb-2">
                            <input type="checkbox" name="dukunganPengiriman" id="pickup" value="pickup" class="border border-gray-300 rounded" />
                            <label for="pickup" class="ml-2 text-sm">Pickup</label>
                        </div>
                        <div class="flex items-center mb-2">
                            <input type="checkbox" name="dukunganPengiriman" id="instantDelivery" value="instantDelivery" class="border border-gray-300 rounded" />
                            <label for="instantDelivery" class="ml-2 text-sm">Instant Delivery</label>
                        </div>
                    </div>
                    <div class="p-4 border-b">
                        <p class="text-gray-600 mb-2">Kategori</p>
                        <div class="relative">
                            <input type="text" name="categorySearch" id="categorySearch" class="border border-gray-300 rounded text-xs mb-3 w-full" placeholder="Cari kategori..." />
                        </div>
                        @for ($i = 0; $i < 10; $i++)
                            <div class="flex items-center mb-2">
                                <input type="checkbox" name="category" id="{{ $name = fake()->department }}" value="{{ $name }}" class="border border-gray-300 rounded" />
                                <label for="{{ $name }}" class="ml-2 text-sm">{{ $name }}</label>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-12 sm:col-span-7 md:col-span-8 lg:col-span-9">
            <div class="bg-white p-4 border rounded">
                <div class="grid grid-cols-4 grid-flow-row gap-4">
                    @for ($i = 0; $i < $productCount; $i++)
                        <div class="col-span-4 sm:col-span-2 lg:col-span-1 border border-gray-200 rounded">
                            <div class="aspect-w-1 aspect-h-1">
                                <img src="https://via.placeholder.com/300.png" alt="" class="w-full h-full rounded-t object-cover">
                            </div>
                            <div class="p-2">
                                <div class="flex flex-col justify-between h-full">
                                    <p class="font-bold text-orange-500 tracking-wide">
                                        Rp{{ number_format(rand(150000, 1000000), 0, '.', '.') }}
                                    </p>
                                    <p class="text-gray-600 text-sm mb-1">
                                        {{ fake()->productName }}
                                    </p>
                                    <p class="flex text-xs items-center mb-2">
                                        <x-phosphor-star-fill class="w-4 h-4 text-yellow-400" />
                                        <span class="border-r border-gray-300 pr-2 mx-1">
                                            {{ rand(1, 5) }}
                                        </span>
                                        <span>
                                            {{ rand(1, 50) }}
                                            Ulasan
                                        </span>
                                    </p>
                                    <button class="text-center w-full text-sm bg-blue-500 rounded p-2 text-white mt-auto">
                                        Lihat Produk
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>