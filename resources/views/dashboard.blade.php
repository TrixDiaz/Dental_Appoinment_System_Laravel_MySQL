<x-app-layout>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">

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
                                        <table class="min-w-full" id="myTable">
                                            <thead class="bg-white border-b">
                                                <tr>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        #
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        Title
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        Description
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        Date
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        Time
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        Status
                                                    </th>
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        Doctor
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        Created Date and Time
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($appointments as $appointment)
                                                    <tr class="bg-gray-100 border-b">
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $appointment->id }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $appointment->title }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $appointment->description }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $appointment->date }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $appointment->time }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $appointment->status }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $appointment->doctor }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $appointment->created_at }}
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
                        onsubmit="return confirm('There is no Cancellation for Booking and it takes maximum an Hour. Are you Sure?');">
                        @csrf
                        <input type="text" name="name" value="{{ $user = Auth::user()->name }}" hidden>
                        <input type="text" name="email" value="{{ $user = Auth::user()->email }}" hidden>
                        {{-- Appointment Title --}}
                        <label class="block mt-5">
                            <span class="block text-md text-slate-700 font-semibold">Title</span>
                            <!-- Using form state modifiers, the classes can be identical for every input -->
                            <input type="text" name="title"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                            focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                            disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                            invalid:border-pink-500 invalid:text-pink-600
                            focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                            "
                                required />
                        </label>

                        {{-- Appointment Reason --}}
                        <label class="block mt-5">
                            <span class="block text-md text-slate-700 font-semibold">Appointment Reason</span>
                            <!-- Using form state modifiers, the classes can be identical for every input -->
                            <input type="text" name="description"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                            focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                            disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                            invalid:border-pink-500 invalid:text-pink-600
                            focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                            "
                                required />
                        </label>


                        {{-- Request Date  --}}
                        <div class="relative max-w my-5">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input datepicker type="text" name="date" id="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date" required>
                        </div>


                        <div class="my-3">
                            <label for="time"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an Time
                                Frame</label>
                            <select name="time" id="time" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option disabled selected>Choose a Time</option>
                                <option value="8:00am - 9:00am">8:00am - 9:00am</option>
                                <option value="9:30am - 10:30am">9:30am - 10:30am</option>
                                <option value="11:00am - 12:00pm">11:00am - 12:00pm</option>
                                <option value="12:30pm - 1:30pm">12:30pm - 1:30pm</option>
                            </select>
                        </div>


                        <div class="my-3">
                            <label for="doctor"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an Doctor</label>
                            <select name="doctor" id="doctor" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option disabled selected>Choose a Doctor</option>
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    {{-- <script>
        document.addEventListerner('DOMContentLoaded',function() {
            const dateInput = document.getElementByID('date');
            const dateInput = document.getElementByID('time');

            dateInput.addEventListerner('change',function() {
                const selectedDate = this.value;
                const selectedTime = timeSelect.value;

                $.post(" {{route ('check-availability')}}", {date: selectedDate, time: selectedTime})
                 .done(function(response) {
                    if(response.status === 'not available') {
                        timeSelect.querySelector('option[value="' + selectedTime + '"]').disabled = true;
                    }
                })
                .fail(function() {
                    console.log('Error occured while cheking availalbility');
                });
            });
        });
    </script> --}}


</x-app-layout>
