        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-white uppercase bg-neutral-500">
                <tr class="flex justify-between">
                    <th class="py-3 px-6">
                        Kode
                    </th>
                    <th class="py-3 px-6">
                        Nama Barang
                    </th>
                    <th class="py-3 px-6 invisible w-0 lg:w-auto lg:visible">
                        Kategori
                    </th>
                    <th class="py-3 px-6 invisible w-0 lg:w-auto lg:visible">
                        Material
                    </th>
                    @if (session('id_user') == 1 || session('id_user') == 2) 
                    <th class="py-3 px-6">
                        <span class="sr-only"></span>
                    </th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($datanya as $item)
                    
                <tr class="bg-white border-b hover:bg-gray-50 flex justify-between">
                    <td class="py-4 px-6">
                        {{$item['kode']}}
                    </td>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                        {{$item['nama_barang']}}
                    </th>
                    <td class="py-4 px-6 invisible w-0 lg:w-auto lg:visible">
                        {{$item['nama_kategori']}}
                    </td>
                    <td class="py-4 px-6 invisible w-0 lg:w-auto lg:visible">
                        {{$item['nama_material']}}
                    </td>
                    @if (session('id_user') == 1 || session('id_user') == 2)
                    <td class="py-4 px-6 text-right">
                        <a href="{{route('barang.detail',["id" => $item['id']])}}" class="font-medium text-blue-600 hover:underline mr-2">Detail</a>
                        <a href="{{route('barang.edit',["id" => $item['id']])}}" class="font-medium text-blue-600 hover:underline mr-2">Edit</a>
                        <a onclick="return confirm('Hapus data {{ $item['nama_barang'] }}?')" href="{{ route('barang.destroy', ['id' => $item['id']]) }}" class="font-medium text-red-600 hover:underline">delete</a>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>