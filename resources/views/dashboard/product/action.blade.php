<div class="flex items-center">
    <a href="{{ route('dashboard.product.edit', $model) }}" class="font-semibold transition duration-300 ease-in-out bg-green-500 text-white rounded hover:bg-green-600 px-3 py-1">
        Edit
    </a>
    <form action="{{ route('dashboard.product.destroy', $model) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="font-semibold ml-2 transition duration-300 ease-in-out bg-red-500 text-white rounded hover:bg-red-600 px-3 py-1">
            Hapus
        </button>
    </form>
</div>