@extends('template')
@section('title','List Order')
@section('konten')
<div class="container px-5 py-24">
    <div class="sm:rounded-lg">
<div class="flex flex-col lg:flex-row justify-between">
    <div>
        <a href="{{ route('order.create') }}" class="px-4 py-2 text-sm font-medium text-white bg-gray-600 border border-transparent rounded-md hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring-indigo active:bg-gray-700">+ Tambah Order</a>
    </div>
    <div class="mt-2 lg:mt-0">
        
    </div>
</div>
        {{-- ------- --}}
        <div class="mt-2">
            @livewire('table.order',['datanya' => $data])
        </div>

    </div>
</div>
@endsection