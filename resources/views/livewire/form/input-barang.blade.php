<form>
    <div class="flex lg:flex-row flex-col gap-2">
        <div class="lg:w-1/2">
            <div>
                <label for="nama_barang" class="block text-sm font-medium text-gray-700 leading-5">
                    Nama Barang
                </label>

                <div class="mt-1 rounded-md shadow-sm">
                    <input id="nama_barang" name="nama_barang" type="text" required autofocus class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="ex: bwabwa chair" />
                </div>

            </div>

            <div class="mt-4 flex flex-col md:flex-row gap-1">
                <div class="md:w-1/2">
                    <label for="kategori" class="block text-sm font-medium text-gray-700 leading-5">
                        Kategori
                    </label>

                    <div class="mt-1 rounded-md shadow-sm" x-data="{datanya : []}" x-init="fetch('http://localhost:8000/api/kategori',{method: 'GET'})
                    .then(async (response) => {
                        datanya = await response.json()
                        datanya = datanya.data
                    })">
                        <select id="kategori" name="kategori" required class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            <option disabled selected>-- Pilih Kategori --</option>
                            <template x-for="datane in datanya">
                                <option value="datane.id">
                                    <p x-text="datane.nama_kategori"></p>
                                </option>
                            </template>

                        </select>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <label for="material" class="block text-sm font-medium text-gray-700 leading-5">
                        Material
                    </label>

                    <div class="mt-1 rounded-md shadow-sm" x-data="{datanya : []}" x-init="fetch('http://localhost:8000/api/material',{method: 'GET'})
                    .then(async (response) => {
                        datanya = await response.json()
                        datanya = datanya.data
                    })">
                        <select id="material" name="material" required class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            <option disabled selected>-- Pilih Material --</option>
                            <template x-for="datane in datanya">
                                <option value="datane.id">
                                    <p x-text="datane.nama_material"></p>
                                </option>
                            </template>

                        </select>
                    </div>
                </div>
                
            </div>
            {{-- ------------- --}}
            <div class="mt-4 flex flex-col md:flex-row gap-1">
                <div class="md:w-1/3">
                    <label for="panjang" class="block text-sm font-medium text-gray-700 leading-5">
                        Panjang
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="panjang" name="panjang" type="number" required autofocus class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="*cm" />
                    </div>

                </div>
                {{-- ----- --}}
                <div class="md:w-1/3">
                    <label for="lebar" class="block text-sm font-medium text-gray-700 leading-5">
                        Lebar
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="lebar" name="lebar" type="number" required autofocus class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="*cm" />
                    </div>
                </div>
                {{-- ----- --}}
                <div class="md:w-1/3">
                    <label for="tinggi" class="block text-sm font-medium text-gray-700 leading-5">
                        Tinggi
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="tinggi" name="tinggi" type="number" required autofocus class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="*cm" />
                    </div>
                </div>
            </div>
            <label for="gambar" class="mt-4 block text-sm font-medium text-gray-700 leading-5">
                Gambar
            </label>
            <input type="file" id="gambar" name="gambar" required class="w-full px-3 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 bg-white"/>
        </div>
        <div class="lg:w-1/2">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700 leading-5">
                deskripsi
            </label>
            <textarea name="deskripsi" id="" cols="30" rows="10"  class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>
        </div>
    </div>
<hr class="my-3">
    <div class="">
        <span class="block w-full rounded-md">
            <button type="submit" class="flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-500 focus:outline-none focus:border-green-700 focus:ring-indigo active:bg-green-700 transition duration-150 ease-in-out">
                Simpan
            </button>
        </span>
    </div>
</form>