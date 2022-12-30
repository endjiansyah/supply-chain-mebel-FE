@extends('template')
@section('title','Detail Order')
@section('page','order')
@section('konten')

<section id="detail">
    <div class="container pt-24">
        <div class=" flex flex-col lg:flex-row justify-between px-2">
            <div class="lg:w-[540px]">
                <img src="{{$barang['gambar']}}" alt="">
            </div>
            @livewire('data.detail',['datanya' => $barang])
        </div>
    </div>
    <hr>
    <div class="container">
        <h1 class="mt-4">Update Status</h1>
        <form action="{{ route('order.update', ['id' => $data['id']]) }}" method="POST">
            @csrf
            <div class=" flex gap-2 items-center">
                <label for="status">Status: </label>
                <div x-data="{datanya : [], listnya : 'semua'}" x-init="
                fetch('http://localhost:8000/api/status/',{method: 'GET'})
                .then(async (response) => {
                    datanya = await response.json()
                    datanya = datanya.data
                })">
                
                <select name="status" class=" px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" id="status">
                    <template x-for="datane in datanya">

                            <option x-bind:id="datane.id" x-bind:value="datane.id" x-text="datane.nama_status" class="bg-white" x-bind:selected="datane.id == {{$data['status']}}"></option>

                    </template>
                </select>
                </div>
                <span class="flex w-full gap-3 items-center">
                    <button type="submit" class="flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-500 focus:outline-none focus:border-green-700 focus:ring-indigo active:bg-green-700 transition duration-150 ease-in-out">
                        Simpan
                    </button>
                    @if ($message = Session::get('success'))
                        <div class="text-green-600" role="alert">{{ $message }}</div>
                    @endif
                </span>
            </div>
        </form>
    </div>
</section>
@endsection