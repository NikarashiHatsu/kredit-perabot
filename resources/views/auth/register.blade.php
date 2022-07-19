<x-auth-layout>
    <div class="w-full h-screen grid grid-cols-12 grid-flow-row">
        <div class="col-span-12 sm:col-span-7 lg:col-span-5 xl:col-span-4">
            <div class="flex flex-col h-screen bg-white justify-center py-8 px-20">
                <h1 class="text-3xl font-bold tracking-wide mb-1">
                    Daftar Akun
                </h1>
                <p class="text-xl mb-6">
                    atau <a href="{{ route('login') }}" class="text-blue-500">masuk disini</a>.
                </p>

                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="flex flex-col mb-6">
                        <label for="name" class="font-semibold mb-2">
                            Nama Lengkap
                            <sup class="text-red-500">
                                *
                            </sup>
                        </label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="border border-gray-300 rounded"
                            value="{{ old('name') }}"
                            required
                            autofocus
                        />
                        @error('name')
                            <p class="text-red-500 text-sm italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col mb-6">
                        <label for="email" class="font-semibold mb-2">
                            Email
                            <sup class="text-red-500">
                                *
                            </sup>
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="border border-gray-300 rounded"
                            value="{{ old('email') }}"
                            required
                        />
                        @error('email')
                            <p class="text-red-500 text-sm italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col mb-6">
                        <label for="email" class="font-semibold mb-2">
                            Kata Sandi
                            <sup class="text-red-500">
                                *
                            </sup>
                        </label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="border border-gray-300 rounded"
                            value="{{ old('password') }}"
                            required
                        />
                        @error('password')
                            <p class="text-red-500 text-sm italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col mb-6">
                        <label for="email" class="font-semibold mb-2">
                            Konfirmasi Kata Sandi
                            <sup class="text-red-500">
                                *
                            </sup>
                        </label>
                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            class="border border-gray-300 rounded"
                            required
                        />
                        @error('password_confirmation')
                            <p class="text-red-500 text-sm italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="transition duration-300 ease-in-out bg-blue-500 text-white font-semibold hover:bg-blue-600 w-full rounded py-2">
                        Daftar
                    </button>
                </form>
            </div>
        </div>

        <div class="hidden sm:block col-span-12 sm:col-span-5 lg:col-span-7 xl:col-span-8">
            <div class="h-screen">
                <img src="{{ asset('images/background/samuel-beer-JL-k4vMQHOQ-unsplash.jpg') }}" class="w-full h-full object-cover" />
            </div>
        </div>
    </div>
</x-auth-layout>
