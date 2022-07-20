<x-app-layout>
    <div class="flex items-center justify-between mb-4">
        <a href="{{ route('dashboard.product.index') }}" class="transition duration-300 ease-in-out bg-blue-500 text-white rounded px-4 py-2">
            Kembali
        </a>
        <h5 class="text-xl font-bold">
            Tambah Produk
        </h5>
    </div>

    <x-alerts/>

    <div class="bg-white p-6 rounded border border-gray-300">
        <form
            action="{{ route('dashboard.product.store') }}"
            method="post"
            enctype="multipart/form-data"
            x-data="{
                categoryId: {{ array_keys($categories->toArray())[0] }},
                subcategoryId: 0,
                color: 'bg-white',
            }"
        >
            @csrf
            <h5 class="text-xl font-bold mb-2">
                Upload Foto
            </h5>
            <div class="grid grid-cols-5 grid-flow-row gap-4 mb-4 pb-4 border-b">
                <div class="col-span-1">
                    <label for="picture_1" class="mb-2">Foto 1 <sup class="text-red-500">*</sup></label>
                    <input type="file" name="picture_1" id="picture_1" class="border border-gray-300 rounded text-sm px-2 py-2 w-full" required>
                    @error('picture_1')
                        <p class="text-xs text-red-500 mt-2 italic">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label for="picture_2" class="mb-2">Foto 2</label>
                    <input type="file" name="picture_2" id="picture_2" class="border border-gray-300 rounded text-sm px-2 py-2 w-full">
                    @error('picture_2')
                        <p class="text-xs text-red-500 mt-2 italic">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label for="picture_3" class="mb-2">Foto 3</label>
                    <input type="file" name="picture_3" id="picture_3" class="border border-gray-300 rounded text-sm px-2 py-2 w-full">
                    @error('picture_3')
                        <p class="text-xs text-red-500 mt-2 italic">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label for="picture_4" class="mb-2">Foto 4</label>
                    <input type="file" name="picture_4" id="picture_4" class="border border-gray-300 rounded text-sm px-2 py-2 w-full">
                    @error('picture_4')
                        <p class="text-xs text-red-500 mt-2 italic">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label for="picture_5" class="mb-2">Foto 5</label>
                    <input type="file" name="picture_5" id="picture_5" class="border border-gray-300 rounded text-sm px-2 py-2 w-full">
                    @error('picture_5')
                        <p class="text-xs text-red-500 mt-2 italic">
                            {{ $message }}
                        </p>
                    @enderror
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
                                <option {{ old('category_id') == $id ? "selected" : "" }} value="{{ $id }}">{{ $name }}</option>
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
                                    {{ old('subcategory_id') == $subcategory->id ? "selected" : "" }}
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
                        <input type="text" name="name" id="name" class="border border-gray-300 rounded text-sm" value="{{ old('name') }}" required autofocus />
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
                            <option {{ old('condition') == "Baru" ? "selected" : "" }} value="Baru">Baru</option>
                            <option {{ old('condition') == "Bekas" ? "selected" : "" }} value="Bekas">Bekas</option>
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
                        <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
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
                        <input type="number" name="price" id="price" class="border border-gray-300 rounded text-sm" value="{{ old('price') }}" required />
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
                        <input type="number" name="stock" id="stock" class="border border-gray-300 rounded text-sm" value="{{ old('stock') }}" required />
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
                        <input type="number" name="weight" id="weight" class="border border-gray-300 rounded text-sm" value="{{ old('weight') }}" required />
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
                        <input type="number" name="length" id="length" class="border border-gray-300 rounded text-sm" value="{{ old('length') }}" required />
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
                        <input type="number" name="width" id="width" class="border border-gray-300 rounded text-sm" value="{{ old('width') }}" required />
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
                        <input type="number" name="height" id="height" class="border border-gray-300 rounded text-sm" value="{{ old('height') }}" required />
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
                            <option value="bg-white" class="text-white bg-white">White</option>
                            <option value="bg-black" class="text-black bg-black">Black</option>
                            <option value="bg-slate-500" class="text-slate-500 bg-slate-500">Slate</option>
                            <option value="bg-gray-500" class="text-gray-500 bg-gray-500">Gray</option>
                            <option value="bg-zinc-500" class="text-zinc-500 bg-zinc-500">Zinc</option>
                            <option value="bg-neutral-500" class="text-neutral-500 bg-neutral-500">Neutral</option>
                            <option value="bg-red-500" class="text-red-500 bg-red-500">Red</option>
                            <option value="bg-orange-500" class="text-orange-500 bg-orange-500">Orange</option>
                            <option value="bg-amber-500" class="text-amber-500 bg-amber-500">Amber</option>
                            <option value="bg-yellow-500" class="text-yellow-500 bg-yellow-500">Yellow</option>
                            <option value="bg-lime-500" class="text-lime-500 bg-lime-500">Lime</option>
                            <option value="bg-green-500" class="text-green-500 bg-green-500">Green</option>
                            <option value="bg-emerald-500" class="text-emerald-500 bg-emerald-500">Emerald</option>
                            <option value="bg-teal-500" class="text-teal-500 bg-teal-500">Teal</option>
                            <option value="bg-cyan-500" class="text-cyan-500 bg-cyan-500">Cyan</option>
                            <option value="bg-sky-500" class="text-sky-500 bg-sky-500">Sky</option>
                            <option value="bg-blue-500" class="text-blue-500 bg-blue-500">Blue</option>
                            <option value="bg-indigo-500" class="text-indigo-500 bg-indigo-500">Indigo</option>
                            <option value="bg-violet-500" class="text-violet-500 bg-violet-500">Violet</option>
                            <option value="bg-purple-500" class="text-purple-500 bg-purple-500">Purple</option>
                            <option value="bg-fuchsia-500" class="text-fuchsia-500 bg-fuchsia-500">Fuchsia</option>
                            <option value="bg-pink-500" class="text-pink-500 bg-pink-500">Pink</option>
                            <option value="bg-rose-500" class="text-rose-500 bg-rose-500">Rose</option>
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