@extends('template')
@section('title','List Barang')
@section('konten')
<div class="container px-5 py-24">
    <div class="sm:rounded-lg">

        <a href="{{ route('barang.create') }}" class="px-4 py-2 text-sm font-medium text-white bg-gray-600 border border-transparent rounded-md hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring-indigo active:bg-gray-700">+ Tambah Barang</a>
        {{-- ------- --}}
        <div class="mt-2">
            @livewire('table-barang',['datanya' => $data])
        </div>

    </div>
</div>
@endsection