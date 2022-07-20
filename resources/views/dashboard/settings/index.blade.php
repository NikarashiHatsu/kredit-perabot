<x-app-layout>
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold">
            Pengaturan
        </h5>
    </div>

    <x-alerts/>

    <div class="bg-white p-6 rounded border border-gray-300">
        <form
            action="{{ route('dashboard.setting.update', auth()->user()) }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 grid-flow-row gap-4">
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="name" class="mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" class="border border-gray-300 rounded text-sm" value="{{ auth()->user()->name }}" required autofocus />
                        @error('name')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="email" class="mb-2">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email" class="border border-gray-300 rounded text-sm" value="{{ auth()->user()->email }}" required />
                        @error('email')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="password" class="mb-2">Kata Sandi (Tidak diubah)</label>
                        <input type="password" name="password" id="password" class="border border-gray-300 rounded text-sm" />
                        @error('password')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="password_confirmation" class="mb-2">Konfirmasi Kata Sandi</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="border border-gray-300 rounded text-sm" />
                        @error('password_confirmation')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="picture" class="mb-2">Foto Profil (Tidak Diubah)</label>
                        <input type="file" name="picture" id="picture" class="border border-gray-300 rounded text-sm p-2" />
                        @error('picture')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                        @if (auth()->user()->picture != null)
                            <a href="{{ auth()->user()->picture }}" target="_blank">
                                <img class="w-32 h-32 border border-gray-300 object-cover rounded mt-4" src="{{ auth()->user()->picture }}" />
                            </a>
                        @endif
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

            ["address"].forEach(field => {
                ClassicEditor
                    .create(document.querySelector(`textarea[name='${field}']`), ckeditorOptions)
                    .catch(error => {
                        console.log(error)
                    })
            })
        </script>
    </x-slot>
</x-app-layout>