<x-app-layout>
    <div class="flex items-center justify-between mb-4">
        <a href="{{ route('dashboard.creditor.index') }}" class="transition duration-300 ease-in-out bg-blue-500 text-white rounded px-4 py-2">
            Kembali
        </a>
        <h5 class="text-xl font-bold">
            Edit Kreditor
        </h5>
    </div>

    <x-alerts/>

    <div class="bg-white p-6 rounded border border-gray-300">
        <form
            action="{{ route('dashboard.creditor.update', $user) }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 grid-flow-row gap-4">
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="name" class="mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" class="border border-gray-300 rounded text-sm" value="{{ $user->name }}" required autofocus />
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
                        <input type="email" name="email" id="email" class="border border-gray-300 rounded text-sm" value="{{ $user->email }}" required />
                        @error('email')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="phone" class="mb-2">No. HP</label>
                        <input type="number" name="phone" id="phone" class="border border-gray-300 rounded text-sm" value="{{ $user->phone }}" />
                        @error('phone')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="place_of_birth" class="mb-2">Tempat Lahir</label>
                        <input type="text" name="place_of_birth" id="place_of_birth" class="border border-gray-300 rounded text-sm" value="{{ $user->place_of_birth }}" />
                        @error('place_of_birth')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="date_of_birth" class="mb-2">Tanggal Lahir</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="border border-gray-300 rounded text-sm" value="{{ $user->date_of_birth }}" />
                        @error('date_of_birth')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="marriage_status" class="mb-2">Status Pernikahan</label>
                        <select name="marriage_status" id="marriage_status" class="border border-gray-300 rounded text-sm">
                            <option {{ $user->marriage_status == "Belum Menikah" ? "selected" : "" }} value="Belum Menikah">Belum Menikah</option>
                            <option {{ $user->marriage_status == "Sudah Menikah" ? "selected" : "" }} value="Sudah Menikah">Sudah Menikah</option>
                        </select>
                        @error('marriage_status')
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
                        @if ($user->picture != null)
                            <a href="{{ $user->picture }}" target="_blank">
                                <img class="w-32 h-32 border border-gray-300 object-cover rounded mt-4" src="{{ $user->picture }}" />
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="role" class="mb-2">Peran <span class="text-red-500">*</span></label>
                        <select name="role" id="role" class="border border-gray-300 rounded text-sm" required>
                            <option {{ $user->role == "user" ? "selected" : "" }} value="user">Kreditor</option>
                            <option {{ $user->role == "admin" ? "selected" : "" }} value="admin">Admin Web</option>
                            <option {{ $user->role == "super_admin" ? "selected" : "" }} value="super_admin">Super Admin</option>
                        </select>
                        @error('role')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12">
                    <div class="flex flex-col">
                        <label for="address" class="mb-2">Alamat</label>
                        <textarea name="address" id="" cols="30" rows="10" class="border border-gray-300 rounded text-sm">{{ $user->address }}</textarea>
                        @error('address')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="identity_card_picture" class="mb-2">KTP (Tidak Diubah)</label>
                        <input type="file" name="identity_card_picture" id="identity_card_picture" class="border border-gray-300 rounded text-sm p-2" />
                        @error('identity_card_picture')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                        @if ($user->identity_card_picture != null)
                            <a href="{{ $user->identity_card_picture }}" target="_blank">
                                <img class="w-32 h-32 border border-gray-300 object-cover rounded mt-4" src="{{ $user->identity_card_picture }}" />
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="family_identity_card_picture" class="mb-2">KK (Tidak Diubah)</label>
                        <input type="file" name="family_identity_card_picture" id="family_identity_card_picture" class="border border-gray-300 rounded text-sm p-2" />
                        @error('family_identity_card_picture')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                        @if ($user->family_identity_card_picture != null)
                            <a href="{{ $user->family_identity_card_picture }}" target="_blank">
                                <img class="w-32 h-32 border border-gray-300 object-cover rounded mt-4" src="{{ $user->family_identity_card_picture }}" />
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="tax_identity_picture" class="mb-2">NPWP (Tidak Diubah)</label>
                        <input type="file" name="tax_identity_picture" id="tax_identity_picture" class="border border-gray-300 rounded text-sm p-2" />
                        @error('tax_identity_picture')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                        @if ($user->tax_identity_picture != null)
                            <a href="{{ $user->tax_identity_picture }}" target="_blank">
                                <img class="w-32 h-32 border border-gray-300 object-cover rounded mt-4" src="{{ $user->tax_identity_picture }}" />
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="salary_slip_picture" class="mb-2">Slip Gaji (Tidak Diubah)</label>
                        <input type="file" name="salary_slip_picture" id="salary_slip_picture" class="border border-gray-300 rounded text-sm p-2" />
                        @error('salary_slip_picture')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                        @if ($user->salary_slip_picture != null)
                            <a href="{{ $user->salary_slip_picture }}" target="_blank">
                                <img class="w-32 h-32 border border-gray-300 object-cover rounded mt-4" src="{{ $user->salary_slip_picture }}" />
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