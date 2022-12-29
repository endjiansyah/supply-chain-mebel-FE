@extends('template')
@section('title','List Barang')
@section('konten')
@livewire('table-barang',['datanya' => $data])
@endsection