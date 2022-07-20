<x-app-layout>
    <div class="grid grid-cols-12 grid-flow-row gap-6">
        <div class="col-span-12 sm:col-span-6 lg:col-span-8">
            <h3 class="text-2xl font-bold tracking-wider mb-2">
                Penting hari ini
            </h3>
            <p class="mb-2">
                Aktivitas yang perlu kamu pantau untuk jaga kepuasan pembeli
            </p>
            <div class="grid grid-cols-4 grid-flow-row gap-4 mb-8">
                <div class="bg-white rounded p-3 border border-gray-300">
                    <p class="text-sm text-gray-500">
                        Pesanan Baru
                    </p>
                    <h4 class="text-xl font-bold">
                        0
                    </h4>
                </div>
                <div class="bg-white rounded p-3 border border-gray-300">
                    <p class="text-sm text-gray-500">
                        Siap Dikirim
                    </p>
                    <h4 class="text-xl font-bold">
                        0
                    </h4>
                </div>
                <div class="bg-white rounded p-3 border border-gray-300">
                    <p class="text-sm text-gray-500">
                        Ulasan Baru
                    </p>
                    <h4 class="text-xl font-bold">
                        0
                    </h4>
                </div>
                <div class="bg-white rounded p-3 border border-gray-300">
                    <p class="text-sm text-gray-500">
                        Jatuh Tempo Kredit
                    </p>
                    <h4 class="text-xl font-bold">
                        0
                    </h4>
                </div>
            </div>

            <h3 class="text-2xl font-bold tracking-wider mb-2">
                Analisis Website
            </h3>
            <p class="mb-2">
                Update terakhir <span class="font-bold">{{ now()->isoFormat('LLL') }}</span>
            </p>
            <div class="grid grid-cols-2 grid-flow-row gap-2">
                <div class="bg-white p-3 rounded border border-gray-300 col-span-2">
                    Traffic Produk 7 hari ini
                </div>
                <div class="bg-white p-3 rounded border border-gray-300 h-full">
                    Pengingat Restok
                </div>
                <div class="bg-white p-3 rounded border border-gray-300 h-full">
                    Produk Terlaris
                </div>
            </div>
        </div>

        <div class="col-span-12 sm:col-span-6 lg:col-span-4">
            <h3 class="text-2xl font-bold tracking-wider mb-2">
                Aktivitas Hari Ini
            </h3>
            <p class="mb-2">
                10 produk dengan traffic tertinggi
            </p>
            <div class="bg-white p-4 border border-gray-300 rounded">
                @for ($i = 0; $i < 10; $i++)
                    <div class="flex mt-4 first-of-type:!mt-0">
                        <div class="w-16 h-16 mr-2">
                            <img src="https://via.placeholder.com/100.png" class="w-full h-full rounded" />
                        </div>
                        <div class="flex flex-col">
                            <h6 class="text-sm mb-1">
                                {{ fake()->productName }}
                            </h6>
                            <p class="text-xs flex items-center mb-0.5">
                                <x-phosphor-eye class="w-3 h-3" />
                                <span class="ml-1">
                                    {{ fake()->numberBetween(0, 100) }}
                                </span>
                            </p>
                            <p class="text-xs flex items-center">
                                <x-phosphor-package class="w-3 h-3" />
                                <span class="ml-1">
                                    {{ fake()->numberBetween(0, 100) }}
                                </span>
                            </p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</x-app-layout>
