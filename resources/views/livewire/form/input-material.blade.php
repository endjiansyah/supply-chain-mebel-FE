
<form action="{{route('material.store')}}" method="POST">
    @csrf
    <div class="flex flex-col gap-2 shadow-sm p-3">
        <h2>Tambah Material</h2>
        <hr>

        <label for="nama_material" class="block text-sm font-medium text-gray-700 leading-5">
            Nama
        </label>
        <div class="mt-1 rounded-md shadow-sm">
            <input id="nama_material" name="nama_material" type="text" required autofocus class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="ex: jati" />
        </div>

        <label for="keterangan" class="block text-sm font-medium text-gray-700 leading-5">
            Keterangan
        </label>
        <div class="mt-1 rounded-md shadow-sm">
            <input id="keterangan" name="keterangan" type="text" required autofocus class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="ex: kayu jati" />
        </div>

        <hr class="my-3">
        <div class="">
            <span class="flex w-full gap-3 items-center">
                <button type="submit" class="flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-500 focus:outline-none focus:border-green-700 focus:ring-indigo active:bg-green-700 transition duration-150 ease-in-out">
                    Simpan
                </button>
                @if ($message = Session::get('success'))
                    <div class="text-green-600" role="alert">{{ $message }}</div>
                @endif
            </span>
        </div>
    </div>
</form>