<x-auth-layout>
    <div class="w-full h-screen grid grid-cols-12 grid-flow-row">
        <div class="col-span-12 sm:col-span-7 lg:col-span-5 xl:col-span-4">
            <div class="flex flex-col h-screen bg-white justify-center py-8 px-20">
                <h1 class="text-3xl font-bold tracking-wide mb-1">
                    Masuk ke akun Anda
                </h1>
                <p class="text-xl mb-6">
                    atau <a href="{{ route('register') }}" class="text-blue-500">daftar sekarang</a>.
                </p>

                <form action="{{ route('login') }}" method="post">
                    @csrf
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
                            autofocus
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

                    <div class="flex justify-between mb-6">
                        <div class="flex items-center">
                            <input type="checkbox" name="remember_me" id="remember_me" class="border border-gray-300 rounded" />
                            <label for="remember_me" class="ml-2 text-sm">Ingat saya</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-blue-500 text-sm">Lupa kata sandi?</a>
                        @endif
                    </div>

                    <button type="submit" class="transition duration-300 ease-in-out bg-blue-500 text-white font-semibold hover:bg-blue-600 w-full rounded py-2">
                        Masuk
                    </button>
                </form>
            </div>
        </div>

        <div class="hidden sm:block col-span-12 sm:col-span-5 lg:col-span-7 xl:col-span-8">
            <div class="h-screen">
                <img src="{{ asset('images/background/mathias-reding-wUI9YcM1VLY-unsplash.jpg') }}" class="w-full h-full object-cover" />
            </div>
        </div>
    </div>
</x-auth-layout>
