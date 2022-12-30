@extends('template')

@section('title','Tambah User')
@section('konten')
<div class="pt-24 container flex justify-center">
    <div class="w-full md:w-3/4 lg:w-1/2">
        <a href="{{ route('user.index') }}" class=" px-4 py-2 text-sm font-medium text-white bg-gray-600 border border-transparent rounded-md hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring-indigo active:bg-gray-700 transition duration-150 ease-in-out">List User</a>
        <div class="px-4 py-8 shadow sm:rounded-lg sm:px-10">
            <h2 class="mb-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
                Input User
            </h2>
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                @livewire('form.input-user')
            </form>
        </div>
    </div>
</div>
@endsection