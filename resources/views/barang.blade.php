@extends('template')

@section('konten')
@livewire('table-barang',['datanya' => $data])
@endsection