<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-welcome /> --}}
                
                 <div class="grid grid-rows-3 grid-flow-col gap-4">
                {{-- <div
                    class="flex justify-center row-span-3 drop-shadow-xl rounded-lg bg-white dark:bg-gray-800 overflow-hidden shadow py-5 px-5 my-5">
                    <center>
                        <x-nav-link :href="route('profile.show')" class="hover:bg-slate-300 rounded-full w-32 h-15"><img
                                src='{{ Auth::user()->profile_photo_path }} ' alt="profile" class="rounded-full w-32 h-15">
                        </x-nav-link>
                        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                        <p class="text-base font-bold text-gray-900 dark:text-white">{{ Auth::user()->email }}</h3>
                    </center>
                </div> --}}
                <div
                    class="row-span-3 col-span-8 drop-shadow-xl rounded-lg bg-white dark:bg-gray-800 overflow-hidden shadow py-5 px-5 my-5">
                    <!-- component -->
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="bg-white border-b">
                                            <tr>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Reason
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Date
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Time Start
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Time End
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Status
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Created Date and Time
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($events as $event)
                                                <tr class="bg-gray-100 border-b">
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $event->reason }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $event->date }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $event->time_start }}
                                                    </td>
                                                    <td 
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $event->time_end }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $event->status }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $event->created_at }}
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 drop-shadow-xl rounded-lg bg-white dark:bg-gray-800 overflow-hidden shadow">
                <div class=" text-gray-900 dark:text-gray-100 font-bold text-2xl">
                    {{ __('Create Events') }}
                    <hr>
                </div>

                <form action="/store" method="POST"
                    onsubmit="return confirm('Are you sure? There is No Cancellation.');">
                    @csrf
                    <input type="text" name="name" value="{{ $user = Auth::user()->name; }}" hidden>
                    {{-- Appointment Reason --}}
                    <label class="block mt-5">
                        <span class="block text-md text-slate-700 font-semibold">Appointment Reason</span>
                        <!-- Using form state modifiers, the classes can be identical for every input -->
                        <input type="text" name="reason"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                            focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                            disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                            invalid:border-pink-500 invalid:text-pink-600
                            focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                            " />
                    </label>

                    {{-- Request Date --}}
                    <div class="block my-3">
                        <label class="block mt-5">
                            <span class="block text-md text-slate-700 font-semibold">Request Date</span>
                            <!-- Using form state modifiers, the classes can be identical for every input -->
                            <input type="date" id="start" name="date"
                                value="{{ now()->format('Y-m-d') }}" min="2021-01-01" max="2023-12-31"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                            focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                            disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                            invalid:border-pink-500 invalid:text-pink-600
                            focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                            " />
                        </label>
                    </div>

                    {{-- Request Date --}}
                    <div class="block my-3">
                        <label class="block mt-5">
                            <span class="block text-md text-slate-700 font-semibold">Start Time</span>
                            <!-- Using form state modifiers, the classes can be identical for every input -->
                            <input type="time" id="start" name="time_start" value="{{ now()->format('H:i') }}"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                            focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                            disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                            invalid:border-pink-500 invalid:text-pink-600
                            focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                            " />
                        </label>
                    </div>


                    <!-- Submit Button  -->
                    <div class="pt-5">
                        <input type="submit" value="Book Now" 
                        class="py-2 px-4 bg-transparent text-red-600 font-semibold border border-red-600 rounded hover:bg-red-600 hover:text-white hover:border-transparent transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
                    </div>
                </form>
            </div>


            </div>
        </div>
    </div>
</x-app-layout>
