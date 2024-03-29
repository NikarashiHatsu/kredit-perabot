<x-app-layout>
    <div class="flex items-center justify-between mb-4">
        <a href="{{ route('dashboard.subcategory.index') }}" class="transition duration-300 ease-in-out bg-blue-500 text-white rounded px-4 py-2">
            Kembali
        </a>
        <h5 class="text-xl font-bold">
            Edit Subkategori
        </h5>
    </div>

    <x-alerts/>

    <div class="bg-white p-6 rounded border border-gray-300">
        <form action="{{ route('dashboard.subcategory.update', $subcategory) }}" method="post">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 grid-flow-row gap-4">
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="category_id" class="mb-2">Asal Subkategori</label>
                        <select name="category_id" id="category_id" class="border border-gray-300 rounded text-sm">
                            @foreach ($categories as $id => $name)
                                <option {{ $subcategory->category_id == $id ? "selected" : "" }} value="{{ $id }}">{{ $name }}</option>
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
                        <label for="name" class="mb-2">Nama Kategori</label>
                        <input type="text" name="name" id="name" class="border border-gray-300 rounded text-sm" value="{{ $subcategory->name }}" required autofocus />
                        @error('name')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 flex justify-end">
                    <button type="submit" class="transition duration-300 ease-in-out bg-blue-500 text-white rounded px-4 py-2">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>