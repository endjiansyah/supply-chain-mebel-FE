<div class="px-4 py-2 lg:max-w-[600px] flex flex-col gap-1">
    <h1 class="text-lg font-bold">{{$nama_barang}}</h1>
    <p>Kategori : {{$nama_kategori}}</p>
    <p>{{$deskripsi_barang}}</p>
    <div>
        <h1 class="font-bold">Dimensi Barang:</h1>
        <ul>
            <li>Panjang : {{$panjang}}cm</li>
            <li>Lebar : {{$lebar}}cm</li>
            <li>Tinggi : {{$tinggi}}cm</li>
        </ul>
    </div>
    <p>Material : {{$nama_material}}</p>
</div>
