<x-app-layout>
    <div class="flex items-center justify-between mb-4">
        <a href="{{ route('dashboard.product.index') }}" class="transition duration-300 ease-in-out bg-blue-500 text-white rounded px-4 py-2">
            Kembali
        </a>
        <h5 class="text-xl font-bold">
            Edit Produk
        </h5>
    </div>

    <x-alerts/>

    <div class="bg-white p-6 rounded border border-gray-300">
        <form
            action="{{ route('dashboard.product.update', $product) }}"
            method="post"
            enctype="multipart/form-data"
            x-data="{
                categoryId: {{ $product->category_id }},
                subcategoryId: {{ $product->subcategory_id }},
                color: 'bg-white',
            }"
        >
            @csrf
            @method('PUT')
            <h5 class="text-xl font-bold mb-2">
                Upload Foto
            </h5>
            <div class="grid grid-cols-5 grid-flow-row gap-4 mb-4 pb-4 border-b">
                <div class="col-span-1">
                    <label for="picture_1" class="mb-2">Foto 1 (Tidak Diubah)</label>
                    <input type="file" name="picture_1" id="picture_1" class="border border-gray-300 rounded text-sm px-2 py-2 w-full">
                    @error('picture_1')
                        <p class="text-xs text-red-500 mt-2 italic">
                            {{ $message }}
                        </p>
                    @enderror
                    @if ($product->picture_1 != null)
                        <a href="{{ $product->picture_1 }}" target="_blank">
                            <img class="w-32 h-32 border border-gray-300 object-cover rounded mt-4" src="{{ $product->picture_1 }}" />
                        </a>
                    @endif
                </div>
                <div class="col-span-1">
                    <label for="picture_2" class="mb-2">Foto 2 (Tidak Diubah)</label>
                    <input type="file" name="picture_2" id="picture_2" class="border border-gray-300 rounded text-sm px-2 py-2 w-full">
                    @error('picture_2')
                        <p class="text-xs text-red-500 mt-2 italic">
                            {{ $message }}
                        </p>
                    @enderror
                    @if ($product->picture_2 != null)
                        <a href="{{ $product->picture_2 }}" target="_blank">
                            <img class="w-32 h-32 border border-gray-300 object-cover rounded mt-4" src="{{ $product->picture_2 }}" />
                        </a>
                    @endif
                </div>
                <div class="col-span-1">
                    <label for="picture_3" class="mb-2">Foto 3 (Tidak Diubah)</label>
                    <input type="file" name="picture_3" id="picture_3" class="border border-gray-300 rounded text-sm px-2 py-2 w-full">
                    @error('picture_3')
                        <p class="text-xs text-red-500 mt-2 italic">
                            {{ $message }}
                        </p>
                    @enderror
                    @if ($product->picture_3 != null)
                        <a href="{{ $product->picture_3 }}" target="_blank">
                            <img class="w-32 h-32 border border-gray-300 object-cover rounded mt-4" src="{{ $product->picture_3 }}" />
                        </a>
                    @endif
                </div>
                <div class="col-span-1">
                    <label for="picture_4" class="mb-2">Foto 4 (Tidak Diubah)</label>
                    <input type="file" name="picture_4" id="picture_4" class="border border-gray-300 rounded text-sm px-2 py-2 w-full">
                    @error('picture_4')
                        <p class="text-xs text-red-500 mt-2 italic">
                            {{ $message }}
                        </p>
                    @enderror
                    @if ($product->picture_4 != null)
                        <a href="{{ $product->picture_4 }}" target="_blank">
                            <img class="w-32 h-32 border border-gray-300 object-cover rounded mt-4" src="{{ $product->picture_4 }}" />
                        </a>
                    @endif
                </div>
                <div class="col-span-1">
                    <label for="picture_5" class="mb-2">Foto 5 (Tidak Diubah)</label>
                    <input type="file" name="picture_5" id="picture_5" class="border border-gray-300 rounded text-sm px-2 py-2 w-full">
                    @error('picture_5')
                        <p class="text-xs text-red-500 mt-2 italic">
                            {{ $message }}
                        </p>
                    @enderror
                    @if ($product->picture_5 != null)
                        <a href="{{ $product->picture_5 }}" target="_blank">
                            <img class="w-32 h-32 border border-gray-300 object-cover rounded mt-4" src="{{ $product->picture_5 }}" />
                        </a>
                    @endif
                </div>
            </div>

            <h5 class="text-xl font-bold mb-2">
                Informasi Produk
            </h5>
            <div class="grid grid-cols-12 grid-flow-row gap-4 pb-4 mb-4 border-b">
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="category_id" class="mb-2">Kategori <sup class="text-red-500">*</sup></label>
                        <select x-model.nuber="categoryId" name="category_id" id="category_id" class="border border-gray-300 rounded text-sm" required>
                            @foreach ($categories as $id => $name)
                                <option {{ $product->category_id == $id ? "selected" : "" }} value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="subcategory_id" class="mb-2">Subkategori</label>
                        <select x-model="subcategoryId" name="subcategory_id" id="subcategory_id" class="border border-gray-300 rounded text-sm">
                            <option value="">-</option>
                            @foreach ($subcategories as $subcategory)
                                <option
                                    {{ $product->subcategory_id == $subcategory->id ? "selected" : "" }}
                                    x-bind:hidden="categoryId != '{{ $subcategory->category_id }}'"
                                    value="{{ $subcategory->id }}"
                                >{{ $subcategory->name }}</option>
                            @endforeach
                        </select>
                        @error('subcategory_id')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="name" class="mb-2">Nama Produk</label>
                        <input type="text" name="name" id="name" class="border border-gray-300 rounded text-sm" value="{{ $product->name }}" required autofocus />
                        @error('name')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="condition" class="mb-2">Kondisi Produk <sup class="text-red-500">*</sup></label>
                        <select name="condition" id="condition" class="border border-gray-300 rounded text-sm" required>
                            <option {{ $product->condition == "Baru" ? "selected" : "" }} value="Baru">Baru</option>
                            <option {{ $product->condition == "Bekas" ? "selected" : "" }} value="Bekas">Bekas</option>
                        </select>
                        @error('condition')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12">
                    <div class="flex flex-col">
                        <label for="description" class="mb-2">Deskripsi <sup class="text-red-500">*</sup></label>
                        <textarea name="description" id="description" cols="30" rows="10">{{ $product->description }}</textarea>
                        @error('condition')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="price" class="mb-2">Harga Produk <sup class="text-red-500">*</sup></label>
                        <input type="number" name="price" id="price" class="border border-gray-300 rounded text-sm" value="{{ $product->price }}" required />
                        @error('price')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="stock" class="mb-2">Stok Produk <sup class="text-red-500">*</sup></label>
                        <input type="number" name="stock" id="stock" class="border border-gray-300 rounded text-sm" value="{{ $product->stock }}" required />
                        @error('stock')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>

            <h5 class="text-xl font-bold mb-2">
                Administrasi Produk
            </h5>
            <div class="grid grid-cols-12 grid-flow-row gap-4 pb-4 mb-4 border-b">
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="weight" class="mb-2">Berat Produk (g) <sup class="text-red-500">*</sup></label>
                        <input type="number" name="weight" id="weight" class="border border-gray-300 rounded text-sm" value="{{ $product->weight }}" required />
                        @error('weight')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="length" class="mb-2">Panjang Produk (cm) <sup class="text-red-500">*</sup></label>
                        <input type="number" name="length" id="length" class="border border-gray-300 rounded text-sm" value="{{ $product->length }}" required />
                        @error('length')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="width" class="mb-2">Lebar Produk (cm) <sup class="text-red-500">*</sup></label>
                        <input type="number" name="width" id="width" class="border border-gray-300 rounded text-sm" value="{{ $product->width }}" required />
                        @error('width')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="height" class="mb-2">Tinggi Produk (cm) <sup class="text-red-500">*</sup></label>
                        <input type="number" name="height" id="height" class="border border-gray-300 rounded text-sm" value="{{ $product->height }}" required />
                        @error('height')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="color" class="mb-2">Warna <sup class="text-red-500">*</sup></label>
                        <select x-model="color" name="color" id="color" class="border border-gray-300 rounded text-sm" required>
                            <option {{ $product->color == "bg-white" ? "selected" : "" }} value="bg-white" class="text-white bg-white">White</option>
                            <option {{ $product->color == "bg-black" ? "selected" : "" }} value="bg-black" class="text-black bg-black">Black</option>
                            <option {{ $product->color == "bg-slate-500" ? "selected" : "" }} value="bg-slate-500" class="text-slate-500 bg-slate-500">Slate</option>
                            <option {{ $product->color == "bg-gray-500" ? "selected" : "" }} value="bg-gray-500" class="text-gray-500 bg-gray-500">Gray</option>
                            <option {{ $product->color == "bg-zinc-500" ? "selected" : "" }} value="bg-zinc-500" class="text-zinc-500 bg-zinc-500">Zinc</option>
                            <option {{ $product->color == "bg-neutral-500" ? "selected" : "" }} value="bg-neutral-500" class="text-neutral-500 bg-neutral-500">Neutral</option>
                            <option {{ $product->color == "bg-red-500" ? "selected" : "" }} value="bg-red-500" class="text-red-500 bg-red-500">Red</option>
                            <option {{ $product->color == "bg-orange-500" ? "selected" : "" }} value="bg-orange-500" class="text-orange-500 bg-orange-500">Orange</option>
                            <option {{ $product->color == "bg-amber-500" ? "selected" : "" }} value="bg-amber-500" class="text-amber-500 bg-amber-500">Amber</option>
                            <option {{ $product->color == "bg-yellow-500" ? "selected" : "" }} value="bg-yellow-500" class="text-yellow-500 bg-yellow-500">Yellow</option>
                            <option {{ $product->color == "bg-lime-500" ? "selected" : "" }} value="bg-lime-500" class="text-lime-500 bg-lime-500">Lime</option>
                            <option {{ $product->color == "bg-green-500" ? "selected" : "" }} value="bg-green-500" class="text-green-500 bg-green-500">Green</option>
                            <option {{ $product->color == "bg-emerald-500" ? "selected" : "" }} value="bg-emerald-500" class="text-emerald-500 bg-emerald-500">Emerald</option>
                            <option {{ $product->color == "bg-teal-500" ? "selected" : "" }} value="bg-teal-500" class="text-teal-500 bg-teal-500">Teal</option>
                            <option {{ $product->color == "bg-cyan-500" ? "selected" : "" }} value="bg-cyan-500" class="text-cyan-500 bg-cyan-500">Cyan</option>
                            <option {{ $product->color == "bg-sky-500" ? "selected" : "" }} value="bg-sky-500" class="text-sky-500 bg-sky-500">Sky</option>
                            <option {{ $product->color == "bg-blue-500" ? "selected" : "" }} value="bg-blue-500" class="text-blue-500 bg-blue-500">Blue</option>
                            <option {{ $product->color == "bg-indigo-500" ? "selected" : "" }} value="bg-indigo-500" class="text-indigo-500 bg-indigo-500">Indigo</option>
                            <option {{ $product->color == "bg-violet-500" ? "selected" : "" }} value="bg-violet-500" class="text-violet-500 bg-violet-500">Violet</option>
                            <option {{ $product->color == "bg-purple-500" ? "selected" : "" }} value="bg-purple-500" class="text-purple-500 bg-purple-500">Purple</option>
                            <option {{ $product->color == "bg-fuchsia-500" ? "selected" : "" }} value="bg-fuchsia-500" class="text-fuchsia-500 bg-fuchsia-500">Fuchsia</option>
                            <option {{ $product->color == "bg-pink-500" ? "selected" : "" }} value="bg-pink-500" class="text-pink-500 bg-pink-500">Pink</option>
                            <option {{ $product->color == "bg-rose-500" ? "selected" : "" }} value="bg-rose-500" class="text-rose-500 bg-rose-500">Rose</option>
                        </select>
                        @error('color')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label class="mb-2">Preview Warna</label>
                        <div class="block w-10 h-10 rounded border" x-bind:class="color"></div>
                    </div>
                </div>
            </div>

            <div class="col-span-12 flex justify-end">
                <button type="submit" class="transition duration-300 ease-in-out bg-blue-500 text-white rounded px-4 py-2">
                    Simpan
                </button>
            </div>
        </form>
    </div>

    <x-slot name="scripts">
        <script>
            let ckeditorOptions = {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'insertTable', '|', 'outdent', 'indent', '|', 'undo', 'redo'],
                alignment: {
                    options: [ 'left', 'center', 'right', 'justify' ]
                },
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                }
            };

            ["description"].forEach(field => {
                ClassicEditor
                    .create(document.querySelector(`textarea[name='${field}']`), ckeditorOptions)
                    .catch(error => {
                        console.log(error)
                    })
            })
        </script>
    </x-slot>
</x-app-layout>