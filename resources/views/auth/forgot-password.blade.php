<x-auth-layout>
    <div class="w-full h-screen relative flex justify-center">
        <img src="{{ asset('images/background/mathias-reding-Nj8Bnri99Lo-unsplash.jpg') }}" class="w-full h-screen absolute filter brightness-50" />

        <div class="max-w-lg mx-auto w-full py-16 absolute">
            <div class="bg-white p-6 rounded w-full">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="flex flex-col mb-6">
                        <label for="email" class="mb-2">Email</label>
                        <input type="email" name="email" id="email" class="border border-gray-300 rounded" value="{{ old('email') }}" required autofocus>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <a href="{{ route('login') }}" class="text-blue-500">
                            Kembali
                        </a>
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit"
                        >
                            Kirim Link Reset Kata Sandi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-auth-layout>
