<div class="flex flex-col lg:flex-row py-5">
    @if ($status == 6 || $status == 5) 
        <div class="mx-2 mt-2 lg:w-1/3 p-2 bg-slate-100 shadow rounded-md">
            <h1 class="font-semibold">Edit Status Order</h1>
            <hr>
            <form action="{{ route('order.update', ['id' => $id_order]) }}" method="POST">
                @csrf

                <label for="deskripsi">Pesan :</label><br>
                <textarea autofocus name="deskripsi" id="deskripsi" cols="30" rows="10" class="w-full rounded shadow p-2"></textarea><br>
                <label for="attachment">Attachment: </label>
                    <input type="file" name="attachment" id="attachment" class="bg-white rounded mb-2">
                Status order* :  
                @switch($status)

                    @case(5)
                        <input type="radio" name="status" id="6" value="6" checked>
                        <label for="6">selesai</label>
                        @break
            
                    @case(6)
                        <input type="radio" name="status" id="5" value="5" checked>
                        <label for="5">terkonfirmasi</label>
                        @break
                        
                @endswitch
                <div class="flex items-center gap-4">
                    <button type="submit" class="flex justify-center px-4 py-2 mt-3 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-500 focus:outline-none focus:border-green-700 focus:ring-indigo active:bg-green-700 transition duration-150 ease-in-out">
                        Simpan
                    </button>
                    @if ($message = Session::get('success'))
                        <div class="text-green-600" role="alert">{{ $message }}</div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="text-red-600" role="alert">{{ $message }}</div>
                    @endif
                </div>
            </form>
        </div>
        {{-- {{$status}} --}}
        <div class="mx-2 mt-2 w-full lg:w-2/3">
            @livewire('data.log', ['id_order' => $id_order])
        </div>
    @else
        <div class="mt-2 w-full">
            @livewire('data.log', ['id_order' => $id_order])
        </div>
    @endif
</div>
