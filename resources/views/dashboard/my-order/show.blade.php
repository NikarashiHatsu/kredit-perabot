<x-app-layout>
    <div class="flex items-center justify-between mb-4">
        <a href="{{ route('dashboard.my-order.index') }}" class="transition duration-300 ease-in-out bg-blue-500 text-white rounded px-4 py-2">
            Kembali
        </a>
        <h5 class="text-xl font-bold">
            Detail Pesanan
        </h5>
    </div>

    <x-alerts/>

    <div class="grid grid-cols-12 grid-flow-row gap-4">
        <div class="col-span-12 md:col-span-6">
            <div class="bg-white p-6 rounded border border-gray-300">
                <h6 class="text-lg font-semibold mb-4">
                    Detail Barang yang Dikredit
                </h6>
                <div class="grid grid-cols-12 grid-flow-row gap-4 mb-8">
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <p class="mb-1 font-semibold">
                            Invoice Awal
                        </p>
                        <p class="text-sm mb-2 italic">
                            Klik untuk memperbesar
                        </p>
                        <a href="{{ $checkout->payment_receipt }}" target="_blank">
                            <img src="{{ $checkout->payment_receipt }}" class="w-32 h-32 rounded border object-cover">
                        </a>
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <p class="mb-1 font-semibold">
                            Foto
                        </p>
                        <p class="text-sm mb-2 italic">
                            Klik untuk melihat detail
                        </p>
                        <a href="{{ route('show', $checkout->product->slug) }}" target="_blank">
                            <img src="{{ $checkout->product->picture_1 }}" class="w-32 h-32 rounded border object-cover">
                        </a>
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <p class="mb-1 font-semibold">
                            Nama Barang
                        </p>
                        <p class="text-sm">
                            {{ $checkout->product->name }}
                        </p>
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <p class="mb-1 font-semibold">
                            Jumlah Barang
                        </p>
                        <p class="text-sm">
                            {{ $checkout->quantity }}
                        </p>
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <p class="mb-1 font-semibold">
                            Durasi Cicilan
                        </p>
                        <p class="text-sm">
                            {{ $checkout->duration }} bulan
                        </p>
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <p class="mb-1 font-semibold">
                            Cicilan yang harus dibayar per-bulan
                        </p>
                        <p class="text-sm">
                            Rp {{ number_format($checkout->installment, 2, ',', '.') }}
                        </p>
                    </div>
                </div>

                <h6 class="text-lg font-semibold mb-1">
                    Detail Cicilan
                </h6>
                <p class="text-blue-500 text-sm italic mb-4">
                    * Pembayaran pertama adalah pembayaran pertama
                </p>
                <table class="w-full border text-sm">
                    <thead>
                        <tr class="border-y font-bold">
                            <th class="border-x text-center p-1">Cicilan ke-</th>
                            <th class="border-x text-center p-1">Bukti pembayaran</th>
                            <th class="border-x text-center p-1">Status</th>
                            <th class="border-x text-center p-1">Tanggal pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-y">
                            <td class="border-x text-center p-2">1</td>
                            <td class="border-x text-center p-2">
                                <a href="{{ $checkout->payment_receipt }}" class="text-blue-500 italic hover:underline" target="_blank">
                                    Klik untuk melihat Bukti Pembayaran
                                </a>
                            </td>
                            <td class="border-x text-center p-2">
                                <span class="bg-green-500 text-white px-2 py-1 text-xs rounded flex justify-center">
                                    Lunas
                                </span>
                            </td>
                            <td class="border-x text-center p-2">
                                {{ $checkout->created_at->isoFormat('LL') }}
                            </td>
                        </tr>
                        @for ($i = 2; $i <= ($checkout->duration != 0 ? $checkout->duration : 1); $i++)
                            <tr class="border-y">
                                <td class="border-x text-center p-2">{{ $i }}</td>
                                <td class="border-x text-center p-2">
                                        @if ($checkout->payments->where('payment_order', $i)->count() != 0)
                                        <a href="{{ $checkout->payments->where('payment_order', $i)->first()->invoice }}" class="text-blue-500 italic hover:underline" target="_blank">
                                            Klik untuk melihat Bukti Pembayaran
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border-x text-center p-2">
                                    @if ($checkout->payments->where('payment_order', $i)->count() != 0)
                                        @if ($checkout->payments->where('payment_order', $i)->first()->status == "Pending")
                                            <span class="bg-yellow-500 text-white text-xs px-2 py-1 rounded flex justify-center">
                                                Menunggu Verifikasi
                                            </span>
                                        @endif
                                        @if ($checkout->payments->where('payment_order', $i)->first()->status == "Lunas")
                                            <span class="bg-green-500 text-white text-xs px-2 py-1 rounded flex justify-center">
                                                Lunas
                                            </span>
                                        @endif
                                    @else
                                        <span class="bg-red-500 text-white px-2 py-1 text-xs rounded flex justify-center">
                                            Belum Dibayar
                                        </span>
                                    @endif
                                </td>
                                <td class="border-x text-center p-2">
                                    @if ($checkout->payments->where('payment_order', $i)->count() != 0)
                                        {{ $checkout->payments->where('payment_order', $i)->first()->created_at->isoFormat('LL') }}
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>

        @if ($checkout->payments->count() + 1 < $checkout->duration)
            <div class="col-span-12 sm:col-span-6">
                <form action="{{ route('dashboard.my-order.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="checkout_id" value="{{ $checkout->id }}">
                    <input type="hidden" name="product_id" value="{{ $checkout->product_id }}">
                    <div class="bg-white p-6 rounded border border-gray-300">
                        <h6 class="text-lg font-semibold mb-4">
                            Form Cicilan
                        </h6>
                        <div class="grid grid-cols-12 grid-flow-row gap-4">
                            <div class="col-span-12 sm:col-span-6 md:col-span-4">
                                <div class="flex flex-col">
                                    <label for="payment_order" class="mb-2 font-semibold">
                                        Pembayaran ke-
                                    </label>
                                    <select name="payment_order" id="payment_order" class="border border-gray-300 text-xs rounded">
                                        <option value="1" disabled>1</option>
                                        @for ($i = 2; $i <= ($checkout->duration != 0 ? $checkout->duration : 1); $i++)
                                            <option {{ $checkout->payments->where('payment_order', $i)->count() == 1 ? "disabled" : "" }} value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 md:col-span-4">
                                <div class="flex flex-col">
                                    <label for="created_at" class="mb-2 font-semibold">
                                        Tanggal Pembayaran
                                    </label>
                                    <input type="date" name="created_at" id="created_at" value="{{ date('Y-m-d') }}" class="border border-gray-300 rounded text-xs" />
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 md:col-span-4">
                                <div class="flex flex-col">
                                    <label for="invoice" class="mb-2 font-semibold">
                                        Bukti Pembayaran
                                    </label>
                                    <input type="file" name="invoice" id="invoice" class="border border-gray-300 rounded text-xs p-1.5" />
                                </div>
                            </div>
                            <div class="col-span-12">
                                <div class="flex justify-end">
                                    <button type="submit" class="transition duration-300 ease-in-out bg-green-500 hover:bg-green-600 text-white rounded px-3 py-2">
                                        Kirim
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endif
    </div>
</x-app-layout>