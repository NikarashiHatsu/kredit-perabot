<x-guest-layout>
    <x-alerts/>
    <div class="grid grid-cols-12 grid-flow-row gap-6">
        <div class="col-span-12 sm:col-span-6">
            @foreach ($carts as $cart)
                <div
                    class="flex mb-4 py-4 border-b last-of-type:border-b-0"
                    x-data="{
                        price: {{ $cart->product->price }},
                        quantity: {{ $cart->quantity }},
                        totalPrice: {{ $product_total_price = $cart->quantity * $cart->product->price }},
                        servicePrice: {{ $service_price = ($cart->product->price * $cart->quantity) * ($service_rate / 100) }},
                        interestRate: {{ $interest_rate }},
                        duration: {{ $cart->duration }},
                        formatter: new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }),
                    }"
                >
                    <img src="{{ $cart->product->picture_1 }}" class="w-32 h-32 rounded border">
                    <div class="flex flex-col ml-6 w-full">
                        <a href="{{ route('show', $cart->product->slug) }}" class="text-lg font-semibold mb-1">{{ $cart->product->name }}</a>
                        <p class="text-gray-500 text-sm mb-1">
                            Stok: {{ $cart->product->stock }}
                        </p>
                        <div class="flex flex-col mb-4">
                            <p class="text-gray-500 text-sm italic mb-1 flex justify-between items-baseline">
                                <span>
                                    * Subtotal Produk * Kuantitas:
                                </span>
                                <span class="border-b-2 border-gray-300 border-dotted mx-2 -top-1 flex-1"></span>
                                <span>
                                    Rp {{ number_format($product_total_price, 2, '.', '.') }}
                                </span>
                            </p>
                            <p class="text-gray-500 text-sm italic mb-1 flex justify-between items-baseline">
                                <span>
                                    * Biaya Layanan ({{ $service_rate }}%):
                                </span>
                                <span class="border-b-2 border-gray-300 border-dotted mx-2 -top-1 flex-1"></span>
                                <span>
                                    Rp {{ number_format($service_price, 2, '.', '.') }}
                                </span>
                            </p>
                            <p class="text-gray-500 text-sm italic mb-4 pb-4 border-b border-gray-50 flex justify-between items-baseline">
                                <span>
                                    * Subtotal:
                                </span>
                                <span class="border-b-2 border-gray-300 border-dotted mx-2 -top-1 flex-1"></span>
                                <span class="font-bold">
                                    Rp {{ number_format($product_total_price + $service_price, 2, '.', '.') }}
                                </span>
                            </p>
                            <p class="text-gray-500 text-sm italic flex justify-between items-baseline">
                                <span>
                                    * Cicilan per-bulan (<span x-html="duration"></span> bulan + bunga {{ $interest_rate }}%):
                                </span>
                                <span class="border-b-2 border-gray-300 border-dotted mx-2 -top-1 flex-1"></span>
                                <span x-html="formatter.format(((totalPrice + servicePrice) / (duration != 0 ? duration : 1)) + ((totalPrice + servicePrice) / (duration != 0 ? duration : 1)) * (interestRate / 100))"></span>
                            </p>
                        </div>
                        <div class="flex">
                            <form action="{{ route('dashboard.cart.update', $cart) }}" method="post" x-ref="formUpdate">
                                @csrf
                                @method('PUT')
                                <select x-model="duration" name="duration" id="duration" class="border border-gray-300 rounded text-xs" x-on:change="$el.value != {{ $cart->duration }} ? $refs.formUpdate.submit() : null">
                                    <option value="0">Bayar Nanti</option>
                                    <option value="3" x-bind:disabled="totalPrice < 1000000">3 Bulan</option>
                                    <option value="6" x-bind:disabled="totalPrice < 3000000">6 Bulan</option>
                                    <option value="9" x-bind:disabled="totalPrice < 5000000">9 Bulan</option>
                                    <option value="12" x-bind:disabled="totalPrice < 10000000">12 Bulan</option>
                                </select>
                                <input type="number" class="border border-gray-300 rounded text-xs w-16" name="quantity" value="{{ $cart->quantity }}" x-on:blur="$el.value != {{ $cart->quantity }} ? $refs.formUpdate.submit() : null" />
                            </form>
                            <form action="{{ route('dashboard.cart.destroy', $cart) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="transition duration-300 ease-in-out bg-orange-500 text-white p-2 rounded ml-2">
                                    <x-phosphor-trash class="w-4 h-4" />
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-span-12 sm:col-span-6">
            <form action="{{ route('checkout.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="bg-white p-4 border rounded">
                    <h5 class="text-xl font-bold mb-2">
                        Invoice
                    </h5>
                    <table class="border text-sm w-full">
                        <thead>
                            <tr>
                                <th class="border-x p-1">No</th>
                                <th class="border-x p-1">Produk</th>
                                <th class="border-x p-1">Durasi Cicilan</th>
                                <th class="border-x p-1">Bayaran Awal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $subtotal = 0;
                            @endphp
                            @foreach ($carts as $cart)
                                @php
                                    $total_price = $cart->product->price * $cart->quantity;
                                    $service_price = $total_price * ($service_rate / 100);
                                    $calculated = (($total_price + $service_price) / ($cart->duration != 0 ? $cart->duration : 1))
                                                + (($total_price + $service_price) / ($cart->duration != 0 ? $cart->duration : 1))
                                                * ($interest_rate / 100);
                                    $subtotal += $calculated;
                                @endphp
                                <tr class="border-y">
                                    <td class="border-x p-1 text-center">{{ $loop->iteration }}</td>
                                    <td class="border-x p-1">{{ mb_strimwidth($cart->product->name, 0, 30, '...') }}</td>
                                    <td class="border-x p-1 text-right">{{ $cart->duration }} bulan</td>
                                    <td class="border-x p-1 text-right">
                                        Rp {{ number_format($calculated, 2, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="border-y">
                                <td colspan="3" class="border-x p-1 text-right font-bold">
                                    Subtotal
                                </td>
                                <td class="text-right font-bold">
                                    Rp {{ number_format($subtotal, 2, ',', '.') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="flex items-end justify-between mt-4">
                        <div class="flex flex-col">
                            <label for="payment_receipt" class="mb-2 text-gray-500 text-xs">
                                Bukti Pembayaran
                            </label>
                            <input type="file" name="payment_receipt" id="payment_receipt" class="px-2 py-1 border border-gray-300 rounded text-xs" required />
                        </div>
                        <button type="submit" class="bg-orange-500 text-white rounded px-3 py-2 text-xs flex items-center">
                            <x-phosphor-credit-card class="w-4 h-4" />
                            <span class="ml-2">
                                Bayar
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>