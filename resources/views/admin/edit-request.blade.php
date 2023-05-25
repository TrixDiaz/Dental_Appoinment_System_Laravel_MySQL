<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.index') }}"
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
                        <form method="POST" action="/event-edit/{{ $appointments->id }}">
                            @csrf
                            @method('PUT')
                             <input type="text" id="email" name="email" value="{{ $appointments->email }}" hidden>
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700">Patient Name
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="name" value="{{ $appointments->name }}" readonly
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                @error('name')
                                    <span class="text-red-400 text-sm"></span>
                                @enderror
                            </div>
                            <div class="sm:col-span-6">
                                <label for="reason" class="block text-sm font-medium text-gray-700">Title
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="reason" name="title" value="{{ $appointments->title }}"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('reason')
                                    <span class="text-red-400 text-sm"></span>
                                @enderror
                            </div>

                            <div class="sm:col-span-6">
                                <label for="reason" class="block text-sm font-medium text-gray-700">description
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="reason" name="description" value="{{ $appointments->description }}"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('reason')
                                    <span class="text-red-400 text-sm"></span>
                                @enderror
                            </div>


                            <div class="sm:col-span-6">
                                <label for="request-date" class="block text-sm font-medium text-gray-700">Request Date
                                </label>
                                <div class="mt-1">
                                    <input type="dateTime-local" id="start" name="start"
                                        value="{{ $appointments->start }}"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('request-date')
                                    <span class="text-red-400 text-sm"></span>
                                @enderror
                            </div>


                            <div class="sm:col-span-6">
                                <label for="request-date" class="block text-sm font-medium text-gray-700">Request Date
                                </label>
                                <div class="mt-1">
                                    <input type="dateTime-local" id="end" name="end"
                                        value="{{ $appointments->end }}"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('request-date')
                                    <span class="text-red-400 text-sm"></span>
                                @enderror
                            </div>

                            {{-- <div class="my-3">
                            <label for="time"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an Time
                                Frame</label>
                            <select name="time" id="time" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option value="{{ $appointments->time }}" readonly selected>{{ $appointments->time }}</option>
                                <option value="8:00am - 9:00am">8:00am - 9:00am</option>
                                <option value="9:30am - 10:30am">9:30am - 10:30am</option>
                                <option value="11:00am - 12:00pm">11:00am - 12:00pm</option>
                                <option value="12:30pm - 1:30pm">12:30pm - 1:30pm</option>
                            </select>
                        </div> --}}

                        <div class="my-3">
                            <label for="doctor"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an Doctor</label>
                            <select name="doctor" id="doctor" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                @foreach ($doctors as $doctor)
                                 <option value="{{ $doctor->name }}" readonly selected>{{ $doctor->name }}</option>
                                    <option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>


                            <div class="sm:col-span-6">
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                                <select id="status" name="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>{{ $appointments->status }}</option>
                                    <option value="Approved">Approve</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Rejected">Rejected</option>
                                </select>

                                @error('status')
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
