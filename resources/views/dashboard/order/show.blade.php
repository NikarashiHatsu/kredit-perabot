<x-app-layout>
    <div class="flex items-center justify-between mb-4">
        <a href="{{ route('dashboard.order.index') }}" class="transition duration-300 ease-in-out bg-blue-500 text-white rounded px-4 py-2">
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
                    Detail Kreditor
                </h6>
                <div class="grid grid-cols-12 grid-flow-row gap-4">
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <p class="mb-1 font-semibold">
                            Nama Lengkap
                        </p>
                        <p class="text-sm">
                            {{ $checkout->user->name }}
                        </p>
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <p class="mb-1 font-semibold">
                            Email
                        </p>
                        <p class="text-sm">
                            {{ $checkout->user->email }}
                        </p>
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <p class="mb-1 font-semibold">
                            No. HP
                        </p>
                        <p class="text-sm">
                            {{ $checkout->user->phone }}
                        </p>
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <p class="mb-1 font-semibold">
                            Tempat Lahir
                        </p>
                        <p class="text-sm">
                            {{ $checkout->user->place_of_birth }}
                        </p>
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <p class="mb-1 font-semibold">
                            Tempat Lahir
                        </p>
                        <p class="text-sm">
                            {{ \Carbon\Carbon::parse($checkout->user->date_of_birth)->isoFormat('LL') }}
                        </p>
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <p class="mb-1 font-semibold">
                            Status Pernikahan
                        </p>
                        <p class="text-sm">
                            {{ $checkout->user->marriage_status }}
                        </p>
                    </div>
                    <div class="col-span-12">
                        <p class="mb-1 font-semibold">
                            Alamat
                        </p>
                        <div class="prose-sm prose-p:m-0">
                            {!! $checkout->user->address !!}
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <p class="mb-1 font-semibold">
                            Foto Profil
                        </p>
                        <img src="{{ $checkout->user->picture }}" class="w-40 h-40 rounded object-cover">
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <p class="mb-1 font-semibold">
                            KTP
                        </p>
                        <img src="{{ $checkout->user->identity_card_picture }}" class="w-40 h-40 rounded object-cover">
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <p class="mb-1 font-semibold">
                            KK
                        </p>
                        <img src="{{ $checkout->user->family_identity_card_picture }}" class="w-40 h-40 rounded object-cover">
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <p class="mb-1 font-semibold">
                            NPWP
                        </p>
                        <img src="{{ $checkout->user->tax_identity_picture }}" class="w-40 h-40 rounded object-cover">
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <p class="mb-1 font-semibold">
                            Slip Gaji
                        </p>
                        <img src="{{ $checkout->user->salary_slip_picture }}" class="w-40 h-40 rounded object-cover">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-12 md:col-span-6">
            <div class="bg-white p-6 rounded border border-gray-300">
                <h6 class="text-lg font-semibold mb-4">
                    Detail Barang yang Dikredit
                </h6>
                <div class="grid grid-cols-12 grid-flow-row gap-4 mb-8">
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <p class="mb-1 font-semibold">
                            Invoice
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
                            <th class="border-x text-center p-1">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-y">
                            <td class="border-x text-center p-1">1</td>
                            <td class="border-x text-center p-1">
                                <a href="{{ $checkout->payment_receipt }}" class="text-blue-500 italic hover:underline" target="_blank">
                                    Klik untuk melihat Bukti Pembayaran
                                </a>
                            </td>
                            <td class="border-x text-center p-2">
                                <span class="bg-green-500 text-xs text-white px-2 py-1 rounded flex items-center justify-center">
                                    Lunas
                                </span>
                            </td>
                            <td class="border-x text-center p-1"></td>
                        </tr>
                        @for ($i = 2; $i <= ($checkout->duration != 0 ? $checkout->duration : 1); $i++)
                            <tr @class(['border-y', '!bg-yellow-100' => $checkout->payments->where('payment_order', $i)->count() > 0 ? $checkout->payments->where('payment_order', $i)->first()->is_read == false : false])>
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
                                    @if ($checkout->payments->where('payment_order', $i)->count() != 0 && $checkout->payments->where('payment_order', $i)->first()->status == "Pending")
                                        <form action="{{ route('dashboard.order.update', $checkout) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="payment_order" value="{{ $checkout->payments->where('payment_order', $i)->first()->payment_order }}">
                                            <button class="transition duration-300 ease-in-out bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded text-xs flex items-center">
                                                <x-phosphor-check class="w-4 h-4" />
                                                Tandai Sebagai Lunas
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>