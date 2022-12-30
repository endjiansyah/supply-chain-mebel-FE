@extends('template')
@section('title','List Order')
@section('page','order')
@section('konten')
<div class="container px-5 py-24">
    <div class="sm:rounded-lg">
<div class="flex flex-col lg:flex-row justify-between">
    <form action="{{route('order.store')}}" method="POST">
        @csrf
        @livewire('form.input-order')
    </form>
</div>
        {{-- ------- --}}
        <div class="mt-2">
            @livewire('table.order',['datanya' => $data])
        </div>

    </div>
</div>
@endsection