<x-app-layout>
    <div class="bg-white rounded p-3 border border-gray-300">
        <p class="text-sm text-gray-500">
            Selamat datang, {{ auth()->user()->name }}
        </p>
    </div>
</x-app-layout>
