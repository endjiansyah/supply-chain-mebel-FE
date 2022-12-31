@extends('template')
@section('title','Detail Barang')
@section('page','barang')
@section('konten')

<section id="detail_barang">
    <div class="container pt-24">
        <a href="{{ route('barang.index') }}" class="mx-2 px-4 py-2 text-sm font-medium text-white bg-gray-600 border border-transparent rounded-md hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring-indigo active:bg-gray-700 transition duration-150 ease-in-out">List Barang</a>
        <br><br>
        <div class=" flex flex-col lg:flex-row justify-between px-2">
            <div class="lg:w-[540px]">
                <img src="{{$data['gambar']}}" alt="">
            </div>
            @livewire('data.detail',['datanya' => $data])
        </div>
    </div>
</section>
@endsection