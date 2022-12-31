<div>
    @if ($status == 1 || $status == 2 || $status == 3 || $status == 4)
        <h1 class="font-semibold">Edit Status Order</h1>
        <hr>
        Status order : 
        @switch($status)

            @case(1)
                <input type="radio" name="status" id="2" value="2" checked>
                <label for="2">Diproses</label>
                @break

            @case(2)
                @foreach ($datane as $item)
                    @if ($item['id'] == 1 || $item['id'] == 3)
                    <div class="flex gap-3">
                        <div>
                            <input type="radio" name="status" id="{{$item['id']}}" value="{{$item['id']}}">
                            <label for="{{$item['id']}}">{{$item['nama_status']}}</label>
                        </div>
                    </div>
                    @endif
                @endforeach
                @break

            @case(3)
                <input type="radio" name="status" id="2" value="2" checked>
                <label for="2">Diproses</label>
                @break

            @case(4)
                @foreach ($datane as $item)
                @if ($item['id'] == 2 || $item['id'] == 3)
                <div class="flex gap-3">
                    <div>
                        <input type="radio" name="status" id="{{$item['id']}}" value="{{$item['id']}}">
                        <label for="{{$item['id']}}">{{$item['nama_status']}}</label>
                    </div>
                </div>
                @endif
            @endforeach
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
