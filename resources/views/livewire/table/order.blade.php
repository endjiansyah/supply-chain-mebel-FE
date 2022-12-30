<div  x-data="{datanya : [], listnya : 'semua'}" x-init="
fetch('http://localhost:8000/api/status/',{method: 'GET'})
.then(async (response) => {
    datanya = await response.json()
    datanya = datanya.data
})">
<hr>
<div class="flex  gap-4 mb-3">
        Filter :
        <button x-on:click="listnya = 'semua'" x-bind:class="listnya == 'semua'? 'text-green-600 font-bold' : 'text-gray-600'">Semua</button>
        <template x-for="datane in datanya">
            <button x-on:click="listnya = datane.id" x-bind:class="listnya == datane.id? 'text-green-600 font-bold' : 'text-gray-600'" x-text="datane.nama_status"></button>
        </template>
        
    </div>

    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-white uppercase bg-neutral-500">
            <tr>
                <th class="py-3 px-1 md:px-6">
                    Kode
                </th>
                <th class="py-3 px-1 md:px-6">
                    Barang
                </th>
                <th class="py-3 px-1 md:px-6">
                    Status
                </th>
                <th class="py-3 px-1 md:px-6">
                    Pemberi Status
                </th>
                <th class="py-3 px-1 md:px-6">
                    <span class="sr-only"></span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datanya as $item)
                <template x-if="listnya == 'semua' || listnya == {{$item['status']}}">
            <tr class="bg-white border-b hover:bg-gray-50">
                <td class="py-4 md:px-6">
                    {{$item['kode']}}
                </td>
                <th scope="row" class="py-4 px-1 md:px-6 font-medium text-gray-900 whitespace-nowrap">
                    {{$item['nama_barang']}}
                </th>
                <td class="py-4 px-1 md:px-6">
                    {{$item['nama_status']}}
                </td>
                <td class="py-4 px-1 md:px-6">
                    {{$item['nama_user']}}
                </td>
                <td class="py-4 px-1 md:px-6 text-right">
                    <a href="{{route('order.detail',["id" => $item['id']])}}" class="font-medium text-blue-600 hover:underline mr-2">Detail</a>
                </td>
            </tr>
        </template>
            @endforeach
        </tbody>
    </table>
</div>