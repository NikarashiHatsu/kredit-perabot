<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="text-gray-700">
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
                <div class="flex-grow px-4 relative mx-2 md:mx-4 hidden sm:flex">
                    <div class="hidden lg:flex w-64 border border-gray-300 rounded-l border-r-0 items-center px-4">
                        <x-phosphor-list-dashes-bold class="w-4 md:w-6 h-4:h-6" />
                        <span class="ml-2 text-xs">
                            Kategori Belanjang
                        </span>
                    </div>
                    <input type="text" class="w-full h-full border border-gray-300 text-xs md:text-sm" placeholder="Cari produk atau merek...">
                    <button type="submit" class="bg-blue-500 rounded-r w-16 flex justify-center items-center">
                        <x-phosphor-magnifying-glass-bold class="text-white w-4 h-4" />
                    </button>
                </div>
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

        <div class="font-sans text-gray-900 antialiased">
            <div class="max-w-7xl mx-auto p-4 py-6">
                {{ $slot }}
            </div>
        </div>

        <div class="bg-blue-500 mb-4">
            <div class="text-xs md:text-base mx-auto max-w-7xl p-4 flex justify-around items-center">
                <div class="flex items-center">
                    <div class="font-semibold text-white">
                        Belanja Lebih Cepat<br/>
                        via KreditIN Mobile Apps
                    </div>
                </div>
                <div class="flex">
                    <img src="{{ asset('images/google-play-badge.png') }}" class="h-6 md:h-12 object-contain">
                    <img src="{{ asset('images/app-store-badge.svg') }}" class="h-6 md:h-12 ml-2 object-contain">
                </div>
            </div>
        </div>

        <footer>
            <div class="w-full border-b mb-4">
                <div class="max-w-7xl mx-auto pb-2 sm:pb-4 p-4 flex justify-between items-center">
                    <a href="javascript:void(0)" class="text-2xl md:text-4xl font-bold tracking-wider">
                        Kredit<span class="text-blue-500">IN</span>
                    </a>
                    <div class="flex items-center">
                        <a href="javascript:void">
                            <x-phosphor-facebook-logo-fill class="w-5 sm:w-6 h-5 sm:h-6 ml-2 text-gray-700" />
                        </a>
                        <a href="javascript:void">
                            <x-phosphor-twitter-logo-fill class="w-5 sm:w-6 h-5 sm:h-6 ml-2 text-gray-700" />
                        </a>
                        <a href="javascript:void">
                            <x-phosphor-instagram-logo-fill class="w-5 sm:w-6 h-5 sm:h-6 ml-2 text-gray-700" />
                        </a>
                        <a href="javascript:void">
                            <x-phosphor-linkedin-logo-fill class="w-5 sm:w-6 h-5 sm:h-6 ml-2 text-gray-700" />
                        </a>
                        <a href="javascript:void">
                            <x-phosphor-youtube-logo-fill class="w-5 sm:w-6 h-5 sm:h-6 ml-2 text-gray-700" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto p-4 pb-4 mb-4 border-b">
                <div class="grid grid-cols-12 grid-flow-row gap-6">
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                        <h4 class="text-xl font-bold mb-4">
                            Layanan Konsumen
                        </h4>
                        <ol>
                            <li class="mb-2"><a href="javascript:void(0)">Pusat Resolusi</a></li>
                            <li class="mb-2"><a href="javascript:void(0)">Cara Belanja</a></li>
                            <li class="mb-2"><a href="javascript:void(0)">Pembayaran</a></li>
                            <li class="mb-2"><a href="javascript:void(0)">Pengembalian</a></li>
                            <li class="mb-2"><a href="javascript:void(0)">Pengiriman & Pengambilan Barang</a></li>
                            <li class="mb-2"><a href="javascript:void(0)">FAQ</a></li>
                            <li class="mb-2"><a href="javascript:void(0)">Gratis Ongkir</a></li>
                            <li class="mb-2"><a href="javascript:void(0)">Program Cicilan & Paylater</a></li>
                            <li class="mb-2"><a href="javascript:void(0)">Solusi Bisnis & Usaha</a></li>
                            <li class="mb-2"><a href="javascript:void(0)">Custom Furniture</a></li>
                        </ol>
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                        <h4 class="text-xl font-bold mb-4">
                            kreditin.id
                        </h4>
                        <ol>
                            <li class="mb-2"><a href="javascript:void(0)">Tentang Kami</a></li>
                            <li class="mb-2"><a href="javascript:void(0)">Blog</a></li>
                            <li class="mb-2"><a href="javascript:void(0)">Syarat & Ketentuan</a></li>
                            <li class="mb-2"><a href="javascript:void(0)">Kebijakan & Privasi</a></li>
                            <li class="mb-2"><a href="javascript:void(0)">Karir</a></li>
                        </ol>
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                        <h4 class="text-xl font-bold mb-4">
                            Hubungi Kami
                        </h4>
                        <ol>
                            <li class="mb-2"><a href="javascript:void(0)" class="flex items-center"><x-phosphor-envelope class="w-4 h-4 mr-1"/>help@kreditin.id</a></li>
                            <li class="mb-2"><a href="javascript:void(0)" class="flex items-center"><x-phosphor-envelope class="w-4 h-4 mr-1"/>aghits@shiroyuki.dev</a></li>
                            <li class="mb-2"><a href="javascript:void(0)" class="flex items-center"><x-phosphor-phone class="w-4 h-4 mr-1"/>(+62) 812-2361-2635</a></li>
                            <li class="mb-2"><a href="javascript:void(0)">Senin s/d Jum'at</a></li>
                            <li class="mb-2"><a href="javascript:void(0)">Pukul 09:00 s/d 21:00 WIB</a></li>
                        </ol>
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                        <h4 class="text-xl font-bold mb-4">
                            Download Aplikasi kreditin.id
                        </h4>
                        <div class="flex mb-8">
                            <img src="{{ asset('images/google-play-badge.png') }}" class="h-8 md:h-10 object-contain">
                            <img src="{{ asset('images/app-store-badge.svg') }}" class="h-8 md:h-10 ml-2 object-contain">
                        </div>
                        <h4 class="text-xl font-bold mb-4">
                            Daftar Newsletter
                        </h4>
                        <p class="mb-4">
                            Jadilah yang pertama untuk mendapatkan informasi
                            dan promo yang tersedia di kreditin.id
                        </p>
                        <div class="flex">
                            <input type="email" class="w-full h-full border border-gray-300 text-xs md:text-sm rounded-l" placeholder="Email Anda...">
                            <button type="submit" class="bg-blue-500 rounded-r px-3 flex justify-center items-center text-sm text-white">
                                Berlangganan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto p-4 pb-4 mb-4 border-b">
                <div class="grid grid-cols-12 grid-flow-row gap-6">
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                        <h4 class="text-xl font-bold mb-4">
                            Cicilan 2,5%
                        </h4>
                        <ol class="grid grid-cols-4 grid-flow-row gap-2">
                            <li><img class="w-full h-8" src="{{ asset('images/cicilan/logo-bni.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/cicilan/logo-bca.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/cicilan/logo-bri.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/cicilan/logo-citi1.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/cicilan/logo-cimb.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/cicilan/logo-hsbc.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/cicilan/logo-mandiri.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/cicilan/logo-ocbc.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/cicilan/logo-permata.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/cicilan/logo-digibank.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/cicilan/logo-uob.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/cicilan/logo-mega.png') }}" /></li>
                        </ol>
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                        <h4 class="text-xl font-bold mb-4">
                            Metode Pembayaran
                        </h4>
                        <ol class="grid grid-cols-4 grid-flow-row gap-2">
                            <li><img class="w-full h-8" src="{{ asset('images/pembayaran/bank-transfer.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/pembayaran/atm-bersama.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/pembayaran/ovo.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/pembayaran/gopay.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/pembayaran/klik-pay.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/pembayaran/visa.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/pembayaran/mastercard.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/pembayaran/jcb.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/pembayaran/kredivo.png') }}" /></li>
                        </ol>
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                        <h4 class="text-xl font-bold mb-4">
                            Jasa Pengiriman
                        </h4>
                        <ol class="grid grid-cols-4 grid-flow-row gap-2">
                            <li><img class="w-full h-8" src="{{ asset('images/pengiriman/jne.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/pengiriman/bluebird.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/pengiriman/ncs.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/pengiriman/gosend.png') }}" /></li>
                        </ol>
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                        <h4 class="text-xl font-bold mb-4">
                            Keamanan Belanja
                        </h4>
                        <ol class="grid grid-cols-4 grid-flow-row gap-2">
                            <li><img class="w-full h-8" src="{{ asset('images/keamanan/verified-visa.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/keamanan/mastercard-secure.png') }}" /></li>
                            <li><img class="w-full h-8" src="{{ asset('images/keamanan/sectigo-secure.png') }}" /></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto p-4 flex justify-end mb-8 text-gray-400">
                &copy; Aghits Nidallah {{ date('Y') }}
            </div>
        </footer>
    </body>

    {!! $script ?? "" !!}
</html>
