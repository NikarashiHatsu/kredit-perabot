<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.css"/>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 flex">
        <aside class="w-64 border-r bg-white h-screen max-h-screen overflow-y-auto fixed top-0 flex flex-col">
            <a href="{{ route('index') }}" class="text-2xl lg:text-3xl font-bold tracking-wider mb-6 pl-4 pt-4">
                Kredit<span class="text-blue-500">IN</span>
            </a>
            <div class="text-gray-500 text-xs border-t py-4 mx-4">
                <div class="flex items-center justify-between mb-3">
                    <span>
                        Pendapatan
                    </span>
                    <span class="font-bold text-gray-700">
                        Rp5.000.000
                    </span>
                </div>
                <div class="flex items-center justify-between mb-3">
                    <span>
                        Kreditor Aktif
                    </span>
                    <span class="font-bold text-gray-700">
                        {{ $creditors }} orang
                    </span>
                </div>
                <div class="flex items-center justify-between">
                    <span>
                        Produk Aktif
                    </span>
                    <span class="font-bold text-gray-700">
                        {{ $products }} Produk
                    </span>
                </div>
            </div>
            <div class="text-gray-500 text-sm border-t py-4 flex flex-col">
                <a
                    href="{{ route('dashboard.index') }}"
                    @class([
                        'border-l-blue-500 text-blue-500 bg-blue-100' => request()->routeIs('dashboard.index'),
                        'transition duration-300 ease-in-out flex items-center border-l-4 hover:border-l-blue-500 pl-4 py-3 hover:bg-blue-100'
                    ])
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                    </svg>
                    <span class="ml-2 font-bold">
                        Dashboard
                    </span>
                </a>

                @if (in_array(auth()->user()->role, ['super_admin', 'admin']))
                    <a href="javascript:void(0)" class="mb-2 mt-4 pl-5 uppercase text-xs tracking-wider font-bold text-gray-400">
                        Data Master
                    </a>
                    <a
                        href="{{ route('dashboard.category.index') }}"
                        @class([
                            'border-l-blue-500 text-blue-500 bg-blue-100' => request()->routeIs('dashboard.category.*'),
                            'transition duration-300 ease-in-out flex items-center border-l-4 hover:border-l-blue-500 pl-4 py-3 hover:bg-blue-100'
                        ])
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 4h6v6h-6z"></path>
                            <path d="M14 4h6v6h-6z"></path>
                            <path d="M4 14h6v6h-6z"></path>
                            <circle cx="17" cy="17" r="3"></circle>
                        </svg>
                        <span class="ml-2 font-bold">
                            Kategori
                        </span>
                    </a>
                    <a
                        href="{{ route('dashboard.subcategory.index') }}"
                        @class([
                            'border-l-blue-500 text-blue-500 bg-blue-100' => request()->routeIs('dashboard.subcategory.*'),
                            'transition duration-300 ease-in-out flex items-center border-l-4 hover:border-l-blue-500 pl-4 py-3 hover:bg-blue-100'
                        ])
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-2" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 4h6v6h-6z"></path>
                            <path d="M4 14h6v6h-6z"></path>
                            <circle cx="17" cy="17" r="3"></circle>
                            <circle cx="7" cy="7" r="3"></circle>
                        </svg>
                        <span class="ml-2 font-bold">
                            Sub-Kategori
                        </span>
                    </a>
                    <a
                        href="{{ route('dashboard.product.index') }}"
                        @class([
                            'border-l-blue-500 text-blue-500 bg-blue-100' => request()->routeIs('dashboard.product.*'),
                            'transition duration-300 ease-in-out flex items-center border-l-4 hover:border-l-blue-500 pl-4 py-3 hover:bg-blue-100'
                        ])
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-package" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                            <line x1="12" y1="12" x2="20" y2="7.5"></line>
                            <line x1="12" y1="12" x2="12" y2="21"></line>
                            <line x1="12" y1="12" x2="4" y2="7.5"></line>
                            <line x1="16" y1="5.25" x2="8" y2="9.75"></line>
                        </svg>
                        <span class="ml-2 font-bold">
                            Produk
                        </span>
                    </a>
                    <a
                        href="{{ route('dashboard.creditor.index') }}"
                        @class([
                            'border-l-blue-500 text-blue-500 bg-blue-100' => request()->routeIs('dashboard.creditor.*'),
                            'transition duration-300 ease-in-out flex items-center border-l-4 hover:border-l-blue-500 pl-4 py-3 hover:bg-blue-100'
                        ])
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                        </svg>
                        <span class="ml-2 font-bold">
                            Kreditor
                        </span>
                    </a>
                @endif

                @if (in_array(auth()->user()->role, ['super_admin']))
                    <a href="javascript:void(0)" class="mb-2 mt-4 pl-5 uppercase text-xs tracking-wider font-bold text-gray-400">
                        Data Pengguna
                    </a>
                    <a
                        href="{{ route('dashboard.admin.index') }}"
                        @class([
                            'border-l-blue-500 text-blue-500 bg-blue-100' => request()->routeIs('dashboard.admin.*'),
                            'transition duration-300 ease-in-out flex items-center border-l-4 hover:border-l-blue-500 pl-4 py-3 hover:bg-blue-100'
                        ])
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cardboards" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 8v8.5a2.5 2.5 0 0 0 2.5 2.5h1.06a3 3 0 0 0 2.34 -1.13l1.54 -1.92a2 2 0 0 1 3.12 0l1.54 1.92a3 3 0 0 0 2.34 1.13h1.06a2.5 2.5 0 0 0 2.5 -2.5v-8.5a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2z"></path>
                            <circle cx="8" cy="12" r="1"></circle>
                            <circle cx="16" cy="12" r="1"></circle>
                        </svg>
                        <span class="ml-2 font-bold">
                            Admin Web
                        </span>
                    </a>

                    <a href="javascript:void(0)" class="mb-2 mt-4 pl-5 uppercase text-xs tracking-wider font-bold text-gray-400">
                        Transaksi
                    </a>
                    <a href="javascript:void(0)" class="transition duration-300 ease-in-out flex items-center border-l-4 border-l-transparent hover:border-l-blue-500 pl-4 py-3 hover:bg-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-invoice" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                            <line x1="9" y1="7" x2="10" y2="7"></line>
                            <line x1="9" y1="13" x2="15" y2="13"></line>
                            <line x1="13" y1="17" x2="15" y2="17"></line>
                        </svg>
                        <span class="ml-2 font-bold">
                            Pesanan
                        </span>
                    </a>
                    <a href="javascript:void(0)" class="transition duration-300 ease-in-out flex items-center border-l-4 border-l-transparent hover:border-l-blue-500 pl-4 py-3 hover:bg-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="13" r="7"></circle>
                            <polyline points="12 10 12 13 14 13"></polyline>
                            <line x1="7" y1="4" x2="4.25" y2="6"></line>
                            <line x1="17" y1="4" x2="19.75" y2="6"></line>
                        </svg>
                        <span class="ml-2 font-bold">
                            Jatuh Tempo
                        </span>
                    </a>
                    <a href="javascript:void(0)" class="transition duration-300 ease-in-out flex items-center border-l-4 border-l-transparent hover:border-l-blue-500 pl-4 py-3 hover:bg-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-line" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="4" y1="19" x2="20" y2="19"></line>
                            <polyline points="4 15 8 9 12 11 16 6 20 10"></polyline>
                        </svg>
                        <span class="ml-2 font-bold">
                            Statistik
                        </span>
                    </a>
                @endif

                <a href="javascript:void(0)" class="mb-2 mt-4 pl-5 uppercase text-xs tracking-wider font-bold text-gray-400">
                    Pengaturan
                </a>
                @if (in_array(auth()->user()->role, ['super_admin']))
                    <a
                        href="{{ route('dashboard.application-setting.index') }}"
                        @class([
                            'border-l-blue-500 text-blue-500 bg-blue-100' => request()->routeIs('dashboard.application-setting.index'),
                            'transition duration-300 ease-in-out flex items-center border-l-4 hover:border-l-blue-500 pl-4 py-3 hover:bg-blue-100'
                        ])
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-app-window" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                            <path d="M6 8h.01"></path>
                            <path d="M9 8h.01"></path>
                        </svg>
                        <span class="ml-2 font-bold">
                            Aplikasi
                        </span>
                    </a>
                @endif
                <a
                    href="{{ route('dashboard.setting.index') }}"
                    @class([
                        'border-l-blue-500 text-blue-500 bg-blue-100' => request()->routeIs('dashboard.setting.index'),
                        'transition duration-300 ease-in-out flex items-center border-l-4 hover:border-l-blue-500 pl-4 py-3 hover:bg-blue-100'
                    ])
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    <span class="ml-2 font-bold">
                        Akun
                    </span>
                </a>
                <form action="{{ route('logout') }}" method="post" class="w-full flex flex-col">
                    @csrf
                    <button class="transition duration-300 ease-in-out flex items-center border-l-4 border-l-transparent hover:border-l-blue-500 pl-4 py-3 hover:bg-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                            <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
                        </svg>
                        <span class="ml-2 font-bold">
                            Logout
                        </span>
                    </button>
                </form>
            </div>
        </aside>
        <main class="w-full pl-64">
            <header class="w-full bg-white border-b p-4 flex items-center justify-end text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="9"></circle>
                    <circle cx="12" cy="10" r="3"></circle>
                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                </svg>
                <span class="ml-2">
                    {{ auth()->user()->name }}
                </span>
            </header>
            <div class="w-full h-full">
                <div class="p-6">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </body>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/34.2.0/ckeditor.min.js" integrity="sha512-rpy6z/f66611MGAFKrP+PE8q9TFUtG5otj76nLKLK/WYesZL1xgVeFzf37jyUWM0PHaF5vJxfrwIYjpG8Mwjag==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{ $scripts ?? "" }}
</html>
