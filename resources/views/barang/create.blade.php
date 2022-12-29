@extends('template')
{{-- @livewire('table-barang',['datanya' => $data]) --}}
@section('title','Tambah Barang')
@section('konten')
<div class="pt-24 container">
    <div class="w-full">
        <div class="px-4 py-8 shadow sm:rounded-lg sm:px-10">
            <h2 class="mb-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
                Input Barang
            </h2>
            @livewire('form.input-barang')
        </div>
    </div>
</div>
@endsection