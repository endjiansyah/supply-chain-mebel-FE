@extends('template')
@section('title','Detail Order')
@section('page','order')
@section('konten')

<section id="detail">
    <div class="container pt-20">
        <a href="{{ route('order.index') }}" class="px-4 py-2 text-sm font-medium text-white bg-gray-600 border border-transparent rounded-md hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring-indigo active:bg-gray-700 mx-2">List Order</a>
        <div class="shadow mx-2">        
            <div class="flex justify-between p-2 bg-slate-500 text-white rounded-sm font-semibold">
                <p>Kode Order : {{$data['kode']}}</p> 
                <p>Status Order : {{$data['nama_status']}}</p> 
            </div>
            <div class=" flex flex-col lg:flex-row justify-between">
                <div class="lg:w-[540px]">
                    <img src="{{$barang['gambar']}}" alt="">
                </div>
                @livewire('data.detail',['datanya' => $barang])
            </div>
        </div>
        <div class="mt-3 flex flex-col lg:flex-row">
            <div class="mx-2 p-2 shadow rounded-md w-full lg:w-1/3 bg-slate-100">
                <form action="{{ route('order.update', ['id' => $data['id']]) }}" method="POST">
                    @csrf
    
                    @switch(session('role'))
                        @case(2)
                            @livewire('form.order.gudang',['status' => $data['status']])
                            @break
                        @case(3)
                            @livewire('form.order.supplier',['status' => $data['status']])
                            @break
                        @case(4)
                            @livewire('form.order.qc',['status' => $data['status']])
                            @break
                    @endswitch
            
                </form>
            </div>
        </div>
    </div>
    
</section>
@endsection