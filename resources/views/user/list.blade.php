@extends('template')
@section('title','List User')
@section('konten')
<div class="container px-5 py-24">
    <div class="sm:rounded-lg">

        <a href="{{ route('user.create') }}" class="px-4 py-2 text-sm font-medium text-white bg-gray-600 border border-transparent rounded-md hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring-indigo active:bg-gray-700">+ Tambah User</a>
        {{-- ------- --}}
        <div class="mt-2">
            @livewire('table.user',['datanya' => $data])
        </div>

    </div>
</div>
@endsection