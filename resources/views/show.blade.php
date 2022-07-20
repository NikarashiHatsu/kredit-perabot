<x-guest-layout>
    <div
        x-data="{
            price: {{ rand(250000, 10000000) }},
            modalOpened: false,
            quantity: 1,
            formatter: new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }),
            interestRate: {{ $interest_rate }},
            serviceRate: {{ $service_rate }},
        }"
        class="flex flex-col"
    >
        <div class="grid grid-cols-12 grid-flow-row gap-6">
            <div class="col-span-12 sm:col-span-7 md:col-span-8">
                <x-swiper>
                    <div class="swiper-slide aspect-w-16 aspect-h-8"><img class="rounded" src="" /></div>
                    <div class="swiper-slide aspect-w-16 aspect-h-8"><img class="rounded" src="" /></div>
                    <div class="swiper-slide aspect-w-16 aspect-h-8"><img class="rounded" src="" /></div>
                </x-swiper>

                <div class="bg-white p-6 border rounded mt-6">
                    <h3 class="text-2xl font-bold tracking-wide text-gray-500 mb-2">
                        {{ ucwords(str_replace('-', ' ', $slug)) }}
                    </h3>
                    <h6 class="text-lg tracking-wide flex items-center mb-6">
                        <span class="flex">
                            <x-phosphor-star-fill class="w-5 h-5 text-yellow-400" />
                            <x-phosphor-star-fill class="w-5 h-5 text-yellow-400" />
                            <x-phosphor-star-fill class="w-5 h-5 text-yellow-400" />
                            <x-phosphor-star-fill class="w-5 h-5 text-yellow-400" />
                            <x-phosphor-star-fill class="w-5 h-5 text-yellow-400" />
                        </span>
                        <span class="ml-4">
                            ({{ rand(1, 10) }}) Ulasan
                        </span>
                    </h6>

                    <h5 class="text-xl tracking-wide font-semibold mb-2">
                        Jenis Pengiriman yang Tersedia
                    </h5>
                    <div class="grid grid-cols-12 grid-flow-row gap-4 mb-8">
                        <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                            <div class="flex items-center">
                                <x-phosphor-package class="w-12 h-12" />
                                <span class="ml-2 text-sm">
                                    Regular<br/>
                                    Delivery
                                </span>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                            <div class="flex items-center">
                                <x-phosphor-truck class="w-12 h-12" />
                                <span class="ml-2 text-sm">
                                    Armada<br/>
                                    Toko
                                </span>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                            <div class="flex items-center">
                                <x-phosphor-timer class="w-12 h-12" />
                                <span class="ml-2 text-sm">
                                    Same Day<br/>
                                    Delivery
                                </span>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                            <div class="flex items-center">
                                <x-phosphor-rocket-launch class="w-12 h-12" />
                                <span class="ml-2 text-sm">
                                    Instant<br/>
                                    Delivery
                                </span>
                            </div>
                        </div>
                    </div>

                    <h5 class="text-xl tracking-wide font-semibold mb-2">
                        Self Pickup
                    </h5>
                    <div class="flex items-center mb-8">
                        <x-phosphor-person-simple-run class="w-12 h-12" />
                        <span class="ml-2 text-sm">
                            Anda dapat mengambil produk ini di<br/>
                            <a href="javascript:void(0)" class="underline">Cirebon</a>
                        </span>
                    </div>

                    <h5 class="text-xl tracking-wide font-semibold mb-2">
                        Ketersediaan Pengiriman
                    </h5>
                    <div class="border border-b-0 border-gray-300 rounded-t p-4 flex items-center justify-between">
                        <div class="flex items-center">
                            <x-phosphor-map-pin-line class="w-6 h-6" />
                            <span class="ml-2">
                                Nama Kota, Lokasi
                            </span>
                        </div>
                        <a href="javascript:void(0)" class="font-semibold text-orange-500 underline">
                            Ubah
                        </a>
                    </div>
                    <div class="border border-green-500 rounded-b bg-green-100 p-4 flex items-center justify-center mb-8">
                        <x-phosphor-check-circle-fill class="w-6 h-6 text-green-700 opacity-75" />
                        <span class="ml-2 text-green-700">
                            Pengiriman Tersedia
                        </span>
                    </div>
                    {{-- <div class="!border border-red-500-b bg-red-100 p-4 flex items-center justify-center mb-8">
                        <x-phosphor-x-circle-fill class="w-6 h-6 text-red-700 opacity-75" />
                        <span class="ml-2 rounded text-red-700white
                            Pengiriman Tidak Tersedia
                        </span>
                    </div> --}}

                    <h5 class="text-xl tracking-wide font-semibold mb-2">
                        Detail Produk
                    </h5>
                    <div class="prose mb-8">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor, tenetur obcaecati? Fuga, fugit. Eos natus et corporis cumque molestiae perferendis eligendi atque ex, sit ipsam autem praesentium porro in aspernatur.</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In nihil amet quia repellat, dolorum nam facere animi est omnis sint incidunt rem beatae quaerat nemo odio quam deserunt? Eligendi, nobis!</p>
                        <ol>
                            <li>List A</li>
                            <li>List B</li>
                            <li>List C</li>
                            <li>List D</li>
                        </ol>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti voluptas molestiae debitis consectetur odit beatae excepturi quibusdam quas tempora eligendi similique expedita modi fuga sunt eius, eaque dignissimos? Doloremque, laborum!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas distinctio aperiam sint blanditiis at beatae suscipit libero alias, cum iusto aspernatur commodi aliquam temporibus, repellendus sed atque animi. Repudiandae, fuga!</p>
                        <ul>
                            <li>Feature 1</li>
                            <li>Feature 2</li>
                            <li>Feature 3</li>
                            <li>Feature 4</li>
                        </ul>
                    </div>
                    <div class="grid grid-cols-3 grid-flow-row gap-4 mb-8">
                        <div class="col-span-3 sm:col-span-1">
                            <div class="border border-gray-300 rounded p-4 flex flex-col items-center justify-center h-full">
                                <div class="bg-white w-12 h-12 border border-gray-400 rounded-full mb-2"></div>
                                <p class="text-sm">Warna</p>
                                <p class="text-sm font-bold">Putih</p>
                            </div>
                        </div>
                        <div class="col-span-3 sm:col-span-1">
                            <div class="border border-gray-300 rounded p-4 flex flex-col items-center justify-center h-full">
                                <x-phosphor-cube-thin class="w-12 h-12 text-gray-400" />
                                <p class="text-sm">Dimensi Kemasan</p>
                                <p class="text-sm font-bold">Panjang x Lebar x Tinggi cm</p>
                            </div>
                        </div>
                        <div class="col-span-3 sm:col-span-1">
                            <div class="border border-gray-300 rounded p-4 flex flex-col items-center justify-center h-full">
                                <x-phosphor-cube-thin class="w-12 h-12 text-gray-400" />
                                <p class="text-sm">Berat</p>
                                <p class="text-sm font-bold">0,17kg</p>
                            </div>
                        </div>
                    </div>

                    <h5 class="text-xl tracking-wide font-semibold mb-4">
                        Ulasan
                    </h5>
                    <div class="w-full flex flex-col-reverse md:flex-row mb-4">
                        <div class="flex flex-col">
                            <div class="flex items-center mb-3">
                                <span>5</span>
                                <x-phosphor-star-fill class="w-5 h-5 text-yellow-400 ml-2" />
                                <div class="w-64 h-5 bg-blue-500 rounded-full mx-2"></div>
                                <span>12</span>
                            </div>
                            <div class="flex items-center mb-3">
                                <span>4</span>
                                <x-phosphor-star-fill class="w-5 h-5 text-yellow-400 ml-2" />
                                <div class="w-64 h-5 bg-gray-200 rounded-full mx-2"></div>
                                <span>0</span>
                            </div>
                            <div class="flex items-center mb-3">
                                <span>3</span>
                                <x-phosphor-star-fill class="w-5 h-5 text-yellow-400 ml-2" />
                                <div class="w-64 h-5 bg-gray-200 rounded-full mx-2"></div>
                                <span>0</span>
                            </div>
                            <div class="flex items-center mb-3">
                                <span>2</span>
                                <x-phosphor-star-fill class="w-5 h-5 text-yellow-400 ml-2" />
                                <div class="w-64 h-5 bg-gray-200 rounded-full mx-2"></div>
                                <span>0</span>
                            </div>
                            <div class="flex items-center mb-3">
                                <span>1</span>
                                <x-phosphor-star-fill class="w-5 h-5 text-yellow-400 ml-2" />
                                <div class="w-64 h-5 bg-gray-200 rounded-full mx-2"></div>
                                <span>0</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center flex-grow mb-6 md:mb-0">
                            <h1 class="text-5xl font-bold mb-2">5</h2>
                            <div class="flex mb-2">
                                <x-phosphor-star-fill class="w-5 h-5 text-yellow-400" />
                                <x-phosphor-star-fill class="w-5 h-5 text-yellow-400 ml-2" />
                                <x-phosphor-star-fill class="w-5 h-5 text-yellow-400 ml-2" />
                                <x-phosphor-star-fill class="w-5 h-5 text-yellow-400 ml-2" />
                                <x-phosphor-star-fill class="w-5 h-5 text-yellow-400 ml-2" />
                            </div>
                            <p>
                                (12 ulasan)
                            </p>
                        </div>
                    </div>
                    <div class="mb-8">
                        @for ($i = 0; $i < 5; $i++)
                            <div class="flex flex-col mb-4 pb-4 border-b last-of-type:border-b-0">
                                <div class="flex mb-1">
                                    <x-phosphor-star-fill class="w-4 h-4 text-yellow-400" />
                                    <x-phosphor-star-fill class="w-4 h-4 text-yellow-400 ml-1" />
                                    <x-phosphor-star-fill class="w-4 h-4 text-yellow-400 ml-1" />
                                    <x-phosphor-star-fill class="w-4 h-4 text-yellow-400 ml-1" />
                                    <x-phosphor-star-fill class="w-4 h-4 text-yellow-400 ml-1" />
                                </div>
                                <div class="flex items-center justify-between my-1">
                                    <span>
                                        {{ fake()->name }}
                                    </span>
                                    <span class="text-sm text-gray-400">
                                        {{ now()->subDays(rand(0, 365))->isoFormat('LL') }}
                                    </span>
                                </div>
                                <div class="porange mb-2">
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore architecto aperiam, minus id animi et sequi quod minima ullam repellendus dignissimos non inventore modi ex qui, cupiditate obcaecati. Neque, a.</p>
                                </div>
                                <div class="flex">
                                    @for ($i = 0; $i < rand(1, 6); $i++)
                                        <div class="w-16 h-16 mr-2">
                                            <img src="" alt="" class="w-full h-full rounded object-cover" />
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        @endfor
                        <button class="transition duration-300 ease-in-out bg-transparent hover:bg-orange-500 hover:text-white border border-orange-500 text-orange-500 w-full py-2 rounded">
                            Lihat Semua Ulasan
                        </button>
                    </div>

                    <h5 class="text-xl tracking-wide font-semibold mb-2">
                        Produk yang Mungkin Anda Suka
                    </h5>
                    <div class="mb-8">
                        TODO: Tampilin Slider Produk, Max 16 Produk (4 produk/slide)
                    </div>

                    <h5 class="text-xl tracking-wide font-semibold mb-2">
                        Produk Terkait
                    </h5>
                    <div class="mb-8">
                        TODO: Tampilin Slider Produk, Max 16 Produk (4 produk/slide)
                    </div>

                    <h5 class="text-xl tracking-wide font-semibold mb-2">
                        Berdasarkan Pencarian Anda
                    </h5>
                    <div>
                        TODO: Tampilin Produk, Max 8 Produk
                    </div>
                </div>
            </div>

            <div class="col-span-12 sm:col-span-5 md:col-span-4">
                <div class="bg-white border rounded sticky top-24">
                    <div class="p-4 border-b">
                        <h3 class="text-2xl font-bold text-orange-500 mb-6">
                            <span x-html="formatter.format(price * quantity)"></span>
                        </h3>
                        <div class="flex items-center h-8">
                            <button
                                x-on:click="if (quantity > 1) quantity--"
                                class="px-2 h-full border border-gray-300 rounded-l border-r-0"
                            >
                                <x-phosphor-minus class="w-4 h-4" />
                            </button>
                            <input
                                x-model="quantity"
                                type="number"
                                class="text-sm h-full w-32 border border-gray-300"
                                min="1"
                                max="999"
                            />
                            <button
                                x-on:click="if (quantity < 999) quantity++"
                                class="px-2 h-full border border-gray-300 rounded-r border-l-0"
                            >
                                <x-phosphor-plus class="w-4 h-4" />
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center justify-between px-4 py-3 border-b">
                        <div class="flex items-center">
                            <x-phosphor-credit-card class="w-6 h-6" />
                            <span class="ml-2 font-bold">
                                Cicilan & Paylater
                            </span>
                        </div>
                        <a href="javascript:void(0)" x-on:click="modalOpened = !modalOpened" class="text-orange-500 font-bold">
                            Info
                        </a>
                    </div>
                    <div
                        x-data="{
                            isOnCart: false,
                        }"
                        class="p-4"
                    >
                        <button
                            x-bind:class="{
                                'text-orange-500 hover:bg-orange-500 hover:text-white': !isOnCart,
                                'bg-orange-500 text-white hover:bg-transparent hover:text-orange-500': isOnCart,
                            }"
                            x-on:click="isOnCart = !isOnCart"
                            class="transition duration-300 ease-in-out border border-orange-500 w-full flex justify-center items-center py-3 rounded text-sm"
                        >
                            <span>
                                <span x-html="isOnCart ? 'Hapus dari' : 'Tambah ke'"></span> Keranjang
                            </span>
                            <x-phosphor-shopping-cart-fill class="w-4 h-4 ml-2"/>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <x-modal
            x-show="modalOpened"
            x-data="{
                selected: 'BNI',
                duration: 0,
            }"
        >
            <x-slot name="title">Simulasi Cicilan</x-slot>

            <div class="flex items-center mb-2">
                <x-phosphor-info-fill class="w-5 h-5 opacity-50"/>
                <span class="ml-2">
                    Pilih cicilan {{ str_replace('.', ',', $interest_rate) }}% dengan Kartu Kredit
                </span>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 grid-flow-row gap-2 mb-6">
                <a href="javascript:void(0)" x-on:click="selected = 'BNI'">
                    <img
                        x-bind:class="{ '!border-orange-500': selected == 'BNI' }"
                        src="{{ asset('images/cicilan/logo-bni.png') }}"
                        class="w-full rounded border border-white"
                    />
                </a>
                <a href="javascript:void(0)" x-on:click="selected = 'BCA'">
                    <img
                        x-bind:class="{ '!border-orange-500': selected == 'BCA' }"
                        src="{{ asset('images/cicilan/logo-bca.png') }}"
                        class="w-full rounded border border-white"
                    />
                </a>
                <a href="javascript:void(0)" x-on:click="selected = 'BRI'">
                    <img
                        x-bind:class="{ '!border-orange-500': selected == 'BRI' }"
                        src="{{ asset('images/cicilan/logo-bri.png') }}"
                        class="w-full rounded border border-white"
                    />
                </a>
                <a href="javascript:void(0)" x-on:click="selected = 'CITI'">
                    <img
                        x-bind:class="{ '!border-orange-500': selected == 'CITI' }"
                        src="{{ asset('images/cicilan/logo-citi1.png') }}"
                        class="w-full rounded border border-white"
                    />
                </a>
                <a href="javascript:void(0)" x-on:click="selected = 'CIMB'">
                    <img
                        x-bind:class="{ '!border-orange-500': selected == 'CIMB' }"
                        src="{{ asset('images/cicilan/logo-cimb.png') }}"
                        class="w-full rounded border border-white"
                    />
                </a>
                <a href="javascript:void(0)" x-on:click="selected = 'HSBC'">
                    <img
                        x-bind:class="{ '!border-orange-500': selected == 'HSBC' }"
                        src="{{ asset('images/cicilan/logo-hsbc.png') }}"
                        class="w-full rounded border border-white"
                    />
                </a>
                <a href="javascript:void(0)" x-on:click="selected = 'Mandiri'">
                    <img
                        x-bind:class="{ '!border-orange-500': selected == 'Mandiri' }"
                        src="{{ asset('images/cicilan/logo-mandiri.png') }}"
                        class="w-full rounded border border-white"
                    />
                </a>
                <a href="javascript:void(0)" x-on:click="selected = 'OCBC'">
                    <img
                        x-bind:class="{ '!border-orange-500': selected == 'OCBC' }"
                        src="{{ asset('images/cicilan/logo-ocbc.png') }}"
                        class="w-full rounded border border-white"
                    />
                </a>
                <a href="javascript:void(0)" x-on:click="selected = 'Permata'">
                    <img
                        x-bind:class="{ '!border-orange-500': selected == 'Permata' }"
                        src="{{ asset('images/cicilan/logo-permata.png') }}"
                        class="w-full rounded border border-white"
                    />
                </a>
                <a href="javascript:void(0)" x-on:click="selected = 'Digibank'">
                    <img
                        x-bind:class="{ '!border-orange-500': selected == 'Digibank' }"
                        src="{{ asset('images/cicilan/logo-digibank.png') }}"
                        class="w-full rounded border border-white"
                    />
                </a>
                <a href="javascript:void(0)" x-on:click="selected = 'UOB'">
                    <img
                        x-bind:class="{ '!border-orange-500': selected == 'UOB' }"
                        src="{{ asset('images/cicilan/logo-uob.png') }}"
                        class="w-full rounded border border-white"
                    />
                </a>
                <a href="javascript:void(0)" x-on:click="selected = 'MEGA'">
                    <img
                        x-bind:class="{ '!border-orange-500': selected == 'MEGA' }"
                        src="{{ asset('images/cicilan/logo-mega.png') }}"
                        class="w-full rounded border border-white"
                    />
                </a>
            </div>

            <div class="flex items-center mb-2">
                <x-phosphor-info-fill class="w-5 h-5 opacity-50"/>
                <span class="ml-2">
                    Pilih cicilan {{ str_replace('.', ',', $interest_rate) }}% tanpa kartu
                </span>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 grid-flow-row gap-2 mb-6">
                <a href="javascript:void(0)" x-on:click="selected = 'Kredivo'">
                    <img
                        x-bind:class="{ '!border-orange-500': selected == 'Kredivo' }"
                        src="{{ asset('images/pembayaran/kredivo.png') }}"
                        class="w-full rounded border border-white"
                    />
                </a>
            </div>

            <div class="flex items-center mb-2">
                <x-phosphor-clock-fill class="w-5 h-5 opacity-50"/>
                <span class="ml-2">
                    Mau cicil berapa lama?
                </span>
            </div>
            <p class="text-xs italic">
                * Cicilan 3 bulan, minimal transaksi Rp1.000.000,-
            </p>
            <p class="text-xs italic">
                * Cicilan 6 bulan, minimal transaksi Rp3.000.000,-
            </p>
            <p class="text-xs italic">
                * Cicilan 9 bulan, minimal transaksi Rp5.000.000,-
            </p>
            <p class="text-xs italic mb-3">
                * Cicilan 12 bulan, minimal transaksi Rp10.000.000,-
            </p>

            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 grid-flow-row gap-2 mb-6">
                <a
                    href="javascript:void(0)"
                    x-on:click="(price * quantity) > 10000000 ? duration = 12 : null"
                    x-bind:class="{
                        'border-orange-500': duration == 12,
                        'opacity-20': (price * quantity) < 10000000,
                    }"
                    class="w-full p-2 text-sm border rounded-xl text-center"
                >
                    12 Bulan
                </a>
                <a
                    href="javascript:void(0)"
                    x-on:click="(price * quantity) > 5000000 ? duration = 9 : null"
                    x-bind:class="{
                        'border-orange-500': duration == 9,
                        'opacity-20': (price * quantity) < 5000000,
                    }"
                    class="w-full p-2 text-sm border rounded-xl text-center"
                >
                    9 Bulan
                </a>
                <a
                    href="javascript:void(0)"
                    x-on:click="(price * quantity) > 3000000 ? duration = 6 : null"
                    x-bind:class="{
                        'border-orange-500': duration == 6,
                        'opacity-20': (price * quantity) < 3000000,
                    }"
                    class="w-full p-2 text-sm border rounded-xl text-center"
                >
                    6 Bulan
                </a>
                <a
                    href="javascript:void(0)"
                    x-on:click="(price * quantity) > 1000000 ? duration = 3 : null"
                    x-bind:class="{
                        'border-orange-500': duration == 3,
                        'opacity-20': (price * quantity) < 1000000,
                    }"
                    class="w-full p-2 text-sm border rounded-xl text-center"
                >
                    3 Bulan
                </a>
                <a
                    href="javascript:void(0)"
                    x-on:click="duration = 0"
                    x-bind:class="{
                        'border-orange-500': duration == 0,
                    }"
                    class="w-full p-2 text-sm border rounded-xl text-center"
                >
                    Bayar Nanti
                </a>
            </div>

            <p class="font-semibold mb-4">
                Hasil Simulasi Cicilan dengan <span x-html="selected"></span>
            </p>
            <p class="flex justify-between mb-2">
                <span>
                    Bunga ({{ str_replace('.', ',', $interest_rate) }}%)
                </span>
                <span x-html="formatter.format((price * quantity) * (interestRate/100) * duration)"></span>
            </p>
            <p class="flex justify-between mb-4">
                <span>
                    Biaya Layanan ({{ str_replace('.', ',', $service_rate) }}%)
                </span>
                <span x-html="formatter.format((price * quantity) * (serviceRate/100))"></span>
            </p>
            <div class="px-4 py-2 rounded bg-gray-200 flex justify-between mb-2">
                <span>
                    Cicilan <span x-html="duration"></span>x
                </span>
                <div class="flex">
                    <span x-html="formatter.format(((price * quantity) / (duration != 0 ? duration : 1)) + ((price * quantity) * (duration != 0 ? interestRate/100 : 0)) + ((price * quantity) * (serviceRate/100)))" class="font-bold"></span>/bulan
                </div>
            </div>
            <div class="flex flex-col items-start text-sm italic">
                <p class="mb-1">
                    * Bunga = (Harga * {{ str_replace('.', ',', $interest_rate) }}%)) * durasi bulan
                </p>
                <p class="mb-1">
                    * Biaya Layanan = Harga Barang * {{ str_replace('.', ',', $service_rate) }}%)
                </p>
                <p class="mb-1">
                    * Cicilan per-bulan = ((Harga / Durasi Cicilan) * {{ str_replace('.', ',', $interest_rate) }}%) + Biaya Layanan
                </p>
            </div>
        </x-modal>
    </div>
</x-guest-layout>