<x-app-layout>
    <div class="flex items-center justify-between mb-4">
        <a href="{{ route('dashboard.category.index') }}" class="transition duration-300 ease-in-out bg-blue-500 text-white rounded px-4 py-2">
            Kembali
        </a>
        <h5 class="text-xl font-bold">
            Tambah Kategori
        </h5>
    </div>

    <x-alerts/>

    <div class="bg-white p-6 rounded border border-gray-300">
        <form action="{{ route('dashboard.category.store') }}" method="post">
            @csrf
            <div class="grid grid-cols-12 grid-flow-row gap-4">
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="name" class="mb-2">Nama Kategori</label>
                        <input type="text" name="name" id="name" class="border border-gray-300 rounded text-sm" value="{{ old('name') }}" required autofocus />
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