<table class="w-full text-sm text-left text-gray-500">
    <thead class="text-xs text-white uppercase bg-neutral-500">
        <tr class="flex justify-between">
            <th class="py-3 px-6">
                Role
            </th>
            <th class="py-3 px-6">
                Nama
            </th>
            <th class="py-3 px-6 hidden lg:inline-block">
                Email
            </th>
            <th class="py-3 px-6">
                <span class="sr-only"></span>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datanya as $item)
            
        <tr class="bg-white border-b hover:bg-gray-50 flex justify-between">
            <td class="py-4 px-6">
                {{$item['nama_role']}}
            </td>
            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                {{$item['nama']}}
            </th>
            <td class="py-4 px-6 hidden lg:inline-block">
                {{$item['email']}}
            </td>
            <td class="py-4 px-6 text-right">
                {{-- <a href="{{route('user.edit',["id" => $item['id']])}}" class="font-medium text-blue-600 hover:underline mr-2">Edit</a> --}}
                @if ($item['id_role'] != 1)
                <a onclick="return confirm('Reset Password {{ $item['nama'] }}?')" href="{{ route('user.resetpass', ['id' => $item['id']]) }}" class="font-medium text-blue-600 hover:underline mr-2">Reset</a>

                    <a onclick="return confirm('Hapus data {{ $item['nama'] }}?')" href="{{ route('user.destroy', ['id' => $item['id']]) }}" class="font-medium text-red-600 hover:underline">delete</a>
                @endif

            </td>
        </tr>
        @endforeach
    </tbody>
</table>