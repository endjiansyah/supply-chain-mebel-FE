<div class="gap-2">
        <label for="nama_barang" class="text-sm font-medium text-gray-700 leading-5">
            Order Barang
        </label>

    <div class="flex gap-2 items-center">
        <div class="mt-1 rounded-md shadow-sm" x-data="{datanya : []}" x-init="
        fetch('http://localhost:8000/api/barang/',{method: 'GET'})
        .then(async (response) => {
            datanya = await response.json()
            datanya = datanya.data
        })">
            <select id="barang" name="barang" required class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">

                <option disabled selected>-- Pilih Barang --</option>
                <template x-for="datane in datanya">
                        <option x-bind:value="datane.id" x-text="datane.nama_barang"></option>
                </template>

            </select>
        </div>
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
</div>
