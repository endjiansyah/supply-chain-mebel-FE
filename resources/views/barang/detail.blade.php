@extends('template')
@section('title','Detail Barang')
@section('page','barang')
@section('konten')

<section id="detail_barang">
    <div class="container pt-24">
        <div class=" flex flex-col lg:flex-row justify-between px-2">
            <div class="lg:w-[540px]">
                <img src="{{$data['gambar']}}" alt="">
            </div>
            @livewire('data.detail',['datanya' => $data])
        </div>
    </div>
</section>
@endsection