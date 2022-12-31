<div>
    @if ($status == 6 || $status == 5)
        <h1 class="font-semibold">Edit Status Order</h1>
        <hr>
        Status order : 
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
        </div>
    @endif
</div>
