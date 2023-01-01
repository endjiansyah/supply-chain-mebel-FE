<div class="flex flex-col gap-3 p-3 bg-orange-50 border-slate-100 shadow rounded-md">
    <h1 class="text-lg font-bold">Log Status</h1>
    @foreach ($datanya as $item)
        <div class="p-3 {{$item['attachment'] != null ? 'bg-cyan-50' : 'bg-white'}} shadow rounded-md">
            <p class="font-medium text-gray-700">{{ \Carbon\Carbon::parse($item['created_at'])->translatedFormat('d F Y H:i:s') }}</p>
            <div class="flex justify-between flex-wrap">
                <h1>Status berubah ke <b class="font-bold">{{$item['nama_status']}}</b></h1>
                <h1>Oleh: <b class="font-bold">{{$item['nama']}}</b></h1>
            </div>
            @if ($item['attachment'] != null)
                <a href="{{$item['attachment']}}" target="_blank" class="text-purple-800 font-semibold">Attachment</a>
            @endif
            @if ($item['deskripsi'] != null)
            <hr>
                <p class="mt-3">{{$item['deskripsi']}}</p>
            @endif
        </div>
    @endforeach
</div>
