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
                        <form method="POST" action="/event-edit/{{ $event->id }}">
                            @csrf
                            @method('PUT')
                            <div class="sm:col-span-6">
                                <label for="reason" class="block text-sm font-medium text-gray-700">Reason
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="reason" name="reason" value="{{ $event->reason }}"
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
                                    <input type="date" id="request-date" name="request-date"
                                        value="{{ $event->date }}"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('request-date')
                                    <span class="text-red-400 text-sm"></span>
                                @enderror
                            </div>


                            <div class="sm:col-span-6">
                                <label for="time-start" class="block text-sm font-medium text-gray-700">Time Start
                                </label>
                                <div class="mt-1">
                                    <input type="time" id="time-start" name="time-start"
                                        value="{{ $event->time_start }}"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('time-start')
                                    <span class="text-red-400 text-sm"></span>
                                @enderror
                            </div>


                            <div class="sm:col-span-6">
                                <label for="time-end" class="block text-sm font-medium text-gray-700">Time end
                                </label>
                                <div class="mt-1">
                                    <input type="time" id="time-end" name="time-end" value="{{ $event->time_end }}"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('time-end')
                                    <span class="text-red-400 text-sm"></span>
                                @enderror
                            </div>


                            <div class="sm:col-span-6">
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                                <select id="status" name="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>{{ $event->status }}</option>
                                    <option value="approve">approve</option>
                                    <option value="pending">pending</option>
                                    <option value="rejected">rejected</option>
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
