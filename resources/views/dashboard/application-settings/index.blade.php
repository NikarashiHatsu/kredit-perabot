<x-app-layout>
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold">
            Pengaturan
        </h5>
    </div>

    <x-alerts/>

    <div class="bg-white p-6 rounded border border-gray-300">
        <form
            action="{{ route('dashboard.application-setting.update', $setting) }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 grid-flow-row gap-4">
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="interest_rate" class="mb-2">Bunga (%) <span class="text-red-500">*</span></label>
                        <input type="text" name="interest_rate" id="interest_rate" class="border border-gray-300 rounded text-sm" value="{{ $setting->interest_rate }}" required autofocus />
                        @error('interest_rate')
                            <p class="text-xs text-red-500 mt-2 italic">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <label for="service_rate" class="mb-2">Biaya Layanan (%) <span class="text-red-500">*</span></label>
                        <input type="text" name="service_rate" id="service_rate" class="border border-gray-300 rounded text-sm" value="{{ $setting->service_rate }}" required autofocus />
                        @error('service_rate')
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