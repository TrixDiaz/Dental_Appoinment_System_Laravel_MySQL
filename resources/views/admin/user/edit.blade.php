<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.user.index') }}"
                        class="px-4 py-2 bg-slate-900 hover:bg-slate-600 text-slate-100 rounded-md">
                        <svg viewBox="0 0 1024 1024" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="#ffffff">
                            <path fill="#ffffff" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"></path>
                            <path fill="#ffffff"
                                d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z">
                            </path>
                        </svg>
                    </a>
                </div>
                <div class="flex flex-col p-2 bg-slate-100">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form method="POST" action="">
                            @csrf
                            @method('PUT')
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="name" value="{{ Auth::user()->name }}"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('name')
                                    <span class="text-red-400 text-sm"></span>
                                @enderror
                            </div>
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700">Email
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="email" name="email" value="{{ Auth::user()->email }}"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('name')
                                    <span class="text-red-400 text-sm"></span>
                                @enderror
                            </div>
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700">Position
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="email" name="email" value="{{ Auth::user()->role }}"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('name')
                                    <span class="text-red-400 text-sm"></span>
                                @enderror
                            </div>
                            <div class="sm:col-span-6 pt-5">
                                <button type="submit"
                                    class="px-4 py-2 bg-slate-900 hover:bg-slate-600 text-white rounded-md">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    </div>
</x-admin-layout>