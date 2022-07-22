<x-app-layout>
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold">
            Data Pesanan
        </h5>
    </div>

    <x-alerts/>

    <div class="bg-white p-6 rounded border border-gray-300">
        {{ $dataTable->table() }}
    </div>

    <x-slot name="scripts">
        {{ $dataTable->scripts() }}
    </x-slot>
</x-app-layout>
