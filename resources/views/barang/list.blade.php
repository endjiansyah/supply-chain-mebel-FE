@extends('template')
@section('title','List Barang')
@section('page','barang')
@section('konten')
<div class="container px-5 py-24">
    <div x-data="{listnya : 'barang'}">
        <div  x-bind:class="listnya == 'barang' ? 'flex justify-between items-center' : 'flex justify-end items-center'">
            @if (session('id_user') == 1 || session('id_user') == 2)
                <template x-if="listnya == 'barang'">
                    <a href="{{ route('barang.create') }}" class="px-4 py-2 text-sm font-medium text-white bg-gray-600 border border-transparent rounded-md hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring-indigo active:bg-gray-700 float-left">+ Tambah Barang</a>
                </template>
            @endif
            <div>
                <button x-on:click="listnya = 'barang'" x-bind:class="listnya == 'barang' ? 'font-bold text-green-800 mx-3' : 'mx-3'" x-bind:disabled="listnya == 'barang'">Barang</button>
                <button x-on:click="listnya = 'kategori'" x-bind:class="listnya == 'kategori' ? 'font-bold text-green-800 mx-3' : 'mx-3'" x-bind:disabled="listnya == 'kategori'">Kategori</button>
                <button x-on:click="listnya = 'material'" x-bind:class="listnya == 'material' ? 'font-bold text-green-800 mx-3' : 'mx-3'" x-bind:disabled="listnya == 'material'">Material</button>
            </div>
        </div>
        {{-- ------- --}}
        <template x-if="listnya == 'barang'">
            <div class="mt-2">
                @livewire('table-barang',['datanya' => $data])
            </div>
        </template>
        {{-- ------- --}}
        <template x-if="listnya == 'kategori'">
            <div class="mt-2 flex flex-col-reverse lg:flex-row gap-3">
                <div class="w-full lg:w-1/2">
                    @livewire('table.kategori',['datanya' => $kategori])
                </div>
                <div class="w-full lg:w-1/2">
                    @livewire('form.input-kategori')
                </div>
            </div>
        </template>
        {{-- ------- --}}
        <template x-if="listnya == 'material'">
            <div class="mt-2 flex flex-col-reverse lg:flex-row gap-3">
                <div class="w-full lg:w-1/2">
                    @livewire('table.material',['datanya' => $material])
                </div>
                <div class="w-full lg:w-1/2">
                    @livewire('form.input-material')
                </div>
            </div>
        </template>

    </div>
</div>
@endsection