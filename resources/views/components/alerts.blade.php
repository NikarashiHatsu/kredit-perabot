@if (session()->has('success'))
    <div class="bg-green-100 border-1 border-green-500 text-green-700 px-4 py-2 rounded mb-4">
        {{ session()->get('success') }}
    </div>
@endif
@if (session()->has('error'))
    <div class="bg-red-100 border-1 border-red-500 text-red-700 px-4 py-2 rounded mb-4">
        {{ session()->get('error') }}
    </div>
@endif