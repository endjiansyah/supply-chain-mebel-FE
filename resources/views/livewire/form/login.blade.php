<div>
    <div class="container px-5 lg:px-40 py-12">

        <div class="bg-slate-400 px-3 lg:px-12 py-3">
            <h3>Input opo iki</h3>
        </div>
        <div class="bg-slate-100 px-3 lg:px-12 py-8">
            {{-- <form action="#" wire:submit.prevent="submit">
                <input type="text" name="name" placeholder="nama" wire:model="name">
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
                <input type="email" name="email" placeholder="email" wire:model="email">
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
                <button type="submit">Anjay</button>
            </form> --}}
            <form action="#" wire:submit.prevent="submit">
                <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label> 
                
                <input type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5dark:border-gray-600 " placeholder="hilih@heleh.com" wire:model="email">
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
                </div>
                <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
                <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5dark:border-gray-600 "  wire:model="password">
                </div>

                <input type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center" value="save">
            </form>
        </div>
    </div>
</div>
