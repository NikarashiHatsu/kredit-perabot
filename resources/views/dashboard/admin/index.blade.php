<x-app-layout>
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold">
            Data Admin Web
        </h5>
        <a href="{{ route('dashboard.admin.create') }}" class="transition duration-300 ease-in-out bg-blue-500 text-white rounded px-4 py-2">
            Tambah
        </a>
    </div>

    <x-alerts/>

    <div class="bg-white p-6 rounded border border-gray-300">
        {{ $dataTable->table() }}
    </div>

    <x-slot name="scripts">
        {{ $dataTable->scripts() }}
    </x-slot>
</x-app-layout>
