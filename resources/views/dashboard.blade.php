@extends('template')
@section('title','Dashboard')
@section('page','home')
@section('konten')
<div class="pt-20 container">
    <div class="w-full">
        <div class="px-4 py-8 shadow-lg sm:rounded-lg sm:px-10">
            <div x-data="{datanya : []}" x-init="
            fetch('https://api-supplychainmeuble.fly.dev/api/user/{{session('id_user')}}',{method: 'GET'})
            .then(async (response) => {
                datanya = await response.json()
                datanya = datanya.data
            })">
                <h2 class="mb-6 text-2xl text-gray-900 leading-9" x-text="'Selamat datang '+datanya.nama+' ('+datanya.keterangan_role+')'">
                </h2>
            </div>
            <form action="{{ route('user.update', ['id' => $data['id']]) }}" method="post">
                @csrf
                <input type="hidden" name="id_role" value="{{$data['id_role']}}">
                <div class="flex gap-3 flex-col md:flex-row">

                    <div class="flex flex-col mt-3 md:mt-0">
                       
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" value="{{$data['nama']}}">
                       
                        <label for="email" class="mt-3">Email</label>
                        <input type="email" id="email" name="email" value="{{$data['email']}}">
                    
                    </div>

                    <div class="flex flex-col mt-3 md:mt-0">

                        <label for="pw">Password @error('password') <span class="text-red-700 font-bold">minimal 5 karakter</span> @enderror</label>
                        <input type="password" id="pw" class="@error('password') border-red-700 border border-2 @enderror" name="password" placeholder="password">

                        <label for="kpw" class="mt-3">Konfirmasi Password</label>
                        <input type="password" id="kpw" class="@error('password') border-red-700 border border-2 @enderror" name="kpassword" placeholder="konfirmasi password">
                    
                    </div>

                </div>
                <div class="flex items-center gap-2">
                    <button type="submit" class="flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-500 focus:outline-none focus:border-green-700 focus:ring-indigo active:bg-green-700 transition duration-150 ease-in-out mt-4">
                        Simpan
                    </button>
                    @if ($message = Session::get('success'))
                        <div class="text-green-600" role="alert">{{ $message }}</div>
                    @endif
                    @if ($message = Session::get('error'))
                        <span class="text-red-600">{{$message}}</span>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection