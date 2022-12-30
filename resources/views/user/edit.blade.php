@extends('template')
{{-- @livewire('table-barang',['datanya' => $data]) --}}
@section('title','Edit Barang')
@section('konten')
<div class="pt-24 container">
    <div class="w-full">
        <a href="{{ route('barang.index') }}" class=" px-4 py-2 text-sm font-medium text-white bg-gray-600 border border-transparent rounded-md hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring-indigo active:bg-gray-700 transition duration-150 ease-in-out">List Barang</a>
        <div class="px-4 py-8 shadow sm:rounded-lg sm:px-10">
            <h2 class="mb-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
                Edit Barang
            </h2>
            <form action="{{ route('barang.update', ['id' => $data['id']]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @livewire('form.input-barang', ['datanya' => $data])
            </form>
        </div>
    </div>
</div>
@endsection