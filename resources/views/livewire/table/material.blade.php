<div>
    @if ($message = Session::get('successdmtr'))
        <div class="text-red-600" role="alert">{{ $message }}</div>
    @endif
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-white uppercase bg-neutral-500">
            <tr class="flex justify-between">
                <th class="py-3 px-6  text-center">
                    Material
                </th>
                @if (session('id_user') == 1 || session('id_user') == 2) 
                <th class="py-3 px-6  text-center">
                    <span class="sr-only"></span>
                </th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($datanya as $item)
                
            <tr class="bg-white border-b hover:bg-gray-50 flex justify-between">
    
                <th scope="row" class="py-4 px-6 text-center font-medium text-gray-900 whitespace-nowrap">
                    {{$item['keterangan']}}
                </th>
                @if (session('id_user') == 1 || session('id_user') == 2)
                <td class="py-4 px-6 text-right">
                    <button x-on:click="nama = '{{$item['nama_material']}}',keterangan = '{{$item['keterangan']}}',id = '{{$item['id']}}',mode='update'" class="font-medium text-blue-600 hover:underline">Edit</button>
    
                    @if ($item['total'] == 0)
                        <a onclick="return confirm('Hapus data {{ $item['nama_material'] }}?')" href="{{ route('material.destroy', ['id' => $item['id']]) }}" class="font-medium text-red-600 hover:underline">delete</a>
                    @endif
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>