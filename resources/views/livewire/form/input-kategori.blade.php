
<div class="flex flex-col gap-2 shadow p-3" x-bind:class="mode == 'create' ? 'bg-slate-100' : 'bg-yellow-100'">
    <div class="flex justify-between">
        <h2 x-text="mode == 'create' ? 'Tambah Kategori' : 'Edit Kategori'"></h2>
        <button x-on:click="mode = 'create',kategori = '', id = '', kode = ''" x-bind:class="mode == 'create' ? 'hidden' : 'px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-500'">Batal Edit</button>
    </div>
    <hr>

    <form x-bind:action="mode == 'create' ? 'kategori/store' : 'kategori/update/'+id" method="POST">
        @csrf
        <label for="nama_kategori" class="block text-sm font-medium text-gray-700 leading-5">
            Nama
        </label>
        <div class="mt-1 rounded-md shadow-sm">
            <input x-bind:value="kategori" id="nama_kategori" name="nama_kategori" type="text" required autofocus class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="ex: Meja" />
        </div>

        <label for="kode" class="mt-3 block text-sm font-medium text-gray-700 leading-5">
            Kode Kategori
        </label>
        <div class="mt-1 rounded-md shadow-sm">
            <input x-bind:value="kode" id="kode" name="kode" type="text" required autofocus class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="ex: TB" />
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
    </form>
</div>