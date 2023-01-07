
    <div class="flex lg:flex-row flex-col gap-2">
        <div class="lg:w-1/2">
            <div>
                <label for="nama_barang" class="block text-sm font-medium text-gray-700 leading-5">
                    Nama Barang
                </label>

                <div class="mt-1 rounded-md shadow-sm">
                    <input id="nama_barang" name="nama_barang" type="text" required autofocus class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('nama_barang') border-yellow-500 border-2 @enderror" placeholder="ex: bwabwa chair" value="{{$nama_barang}}" />
                </div>

            </div>

            <div class="mt-4 flex flex-col md:flex-row gap-1">
                <div class="md:w-1/2">
                    <label for="kategori" class="block text-sm font-medium text-gray-700 leading-5">
                        Kategori
                    </label>

                    <div class="mt-1 rounded-md shadow-sm" x-data="{datanya : [],cek : {{$id_kategori}}}" x-init="fetch('https://api-supplychainmeuble.fly.dev/api/kategori',{method: 'GET'})
                    .then(async (response) => {
                        datanya = await response.json()
                        datanya = datanya.data
                    })">
                        <select id="kategori" name="kategori" required class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">

                            <option disabled {{$id_kategori == 0 ? 'selected' : ''}}>-- Pilih Kategori --</option>
                            <template x-for="datane in datanya">

                                <template x-if="datane.id != cek">
                                    <option x-bind:value="datane.id" x-text="datane.nama_kategori">
                                </template>
                                <template x-if="datane.id == cek">
                                    <option x-bind:value="datane.id" x-text="datane.nama_kategori" selected>
                                </template>

                            </template>

                        </select>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <label for="material" class="block text-sm font-medium text-gray-700 leading-5">
                        Material
                    </label>

                    <div class="mt-1 rounded-md shadow-sm" x-data="{datanya : [],cek : {{$id_material}}}" x-init="fetch('https://api-supplychainmeuble.fly.dev/api/material',{method: 'GET'})
                    .then(async (response) => {
                        datanya = await response.json()
                        datanya = datanya.data
                    })">
                        <select id="material" name="material" required class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            <option disabled {{$id_material == 0 ? 'selected' : ''}}>-- Pilih Kategori --</option>
                            
                            <template x-for="datane in datanya">

                                <template x-if="datane.id != cek">
                                    <option x-bind:value="datane.id" x-text="datane.nama_material">
                                </template>
                                <template x-if="datane.id == cek">
                                    <option x-bind:value="datane.id" x-text="datane.nama_kategori" selected>
                                </template>

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
                        <input id="panjang" name="panjang" type="number" autofocus class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('panjang') border-yellow-500 border-2 @enderror" placeholder="*cm" value="{{$panjang}}" required />
                    </div>

                </div>
                {{-- ----- --}}
                <div class="md:w-1/3">
                    <label for="lebar" class="block text-sm font-medium text-gray-700 leading-5">
                        Lebar
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="lebar" name="lebar" type="number" required autofocus class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('lebar') border-yellow-500 border-2 @enderror" placeholder="*cm" value="{{$lebar}}" />
                    </div>
                </div>
                {{-- ----- --}}
                <div class="md:w-1/3">
                    <label for="tinggi" class="block text-sm font-medium text-gray-700 leading-5">
                        Tinggi
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="tinggi" name="tinggi" type="number" required autofocus class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('tinggi') border-yellow-500 border-2 @enderror" placeholder="*cm" value="{{$tinggi}}" />
                    </div>
                </div>
            </div>
            <label for="gambar" class="mt-4 block text-sm font-medium text-gray-700 leading-5">
                Gambar @error('gambar') <span class="font-bold text-yellow-500">(Hanya boleh jpg, jpeg, png)</span> @enderror
            </label>
            <input type="file" id="gambar" name="gambar" class="w-full px-3 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 bg-white @error('gambar') border-yellow-500 border-2 @enderror" {{$gambar == '' ? 'required' : ''}} />
        </div>
        <div class="lg:w-1/2">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700 leading-5">
                deskripsi
            </label>
            <textarea name="deskripsi_barang" id="" cols="30" rows="10"  class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">{{$deskripsi_barang}}</textarea>
        </div>
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