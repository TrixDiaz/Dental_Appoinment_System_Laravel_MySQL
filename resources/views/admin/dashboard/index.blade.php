<x-admin-layout>

    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="p-3 bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="grid grid-cols-3 gap-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden drop-shadow-xl rounded-lg py-5 px-5 my-5">Total
                        Users
                        <div class="flex items-center justify-center">
                            <div class="w-16 h-16 border-2 border-gray-300 rounded-full">
                                <div class="w-full h-full flex items-center justify-center">
                                    <div
                                        class="w-12 h-12 border-2 border-gray-300 rounded-full flex items-center justify-center">
                                        <span class="text-lg font-semibold text-gray-500">{{ $users }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden drop-shadow-xl rounded-lg py-5 px-5 my-5">
                        Total
                        Doctors
                        <div class="flex items-center justify-center">
                            <div class="w-16 h-16 border-2 border-gray-300 rounded-full">
                                <div class="w-full h-full flex items-center justify-center">
                                    <div
                                        class="w-12 h-12 border-2 border-gray-300 rounded-full flex items-center justify-center">
                                        <span class="text-lg font-semibold text-gray-500">{{ $doctors }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden drop-shadow-xl rounded-lg py-5 px-5 my-5">
                        Pendint Appointments
                        <div class="flex items-center justify-center">
                            <div class="w-16 h-16 border-2 border-gray-300 rounded-full">
                                <div class="w-full h-full flex items-center justify-center">
                                    <div
                                        class="w-12 h-12 border-2 border-gray-300 rounded-full flex items-center justify-center">
                                        <span class="text-lg font-semibold text-gray-500">{{ $appointments }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="drop-shadow-xl rounded-lg bg-white dark:bg-gray-800 overflow-hidden shadow">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!-- component -->
                        <div class="shadow-lg rounded-lg overflow-hidden">
                            <div class="py-3 px-5 bg-gray-50">Pie chart</div>
                            <canvas class="p-1 ml-40 mr-40" id="chartPie"></canvas>
                        </div>

                        <!-- Required chart.js -->
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <!-- Chart pie -->
                        <script>
                            const dataPie = {
                                labels: ["Users", "Doctors", "Pending Appointments"],
                                datasets: [{
                                    label: "Total dataset",
                                    data: [{{ $users }}, {{ $doctors }}, {{  $appointments  }}],
                                    backgroundColor: [
                                        "rgb(133, 105, 241)",
                                        "rgb(164, 101, 241)",
                                        "rgb(101, 143, 241)",
                                    ],
                                    hoverOffset: 4,
                                }, ],
                            };

                            const configPie = {
                                type: "pie",
                                data: dataPie,
                                options: {},
                            };

                            var chartBar = new Chart(document.getElementById("chartPie"), configPie);
                        </script>
                    </div>
                </div>

                {{-- <div class="grid grid-rows-3 grid-flow-col gap-4">
                    <div
                        class="row-span-3 bg-white dark:bg-gray-800 overflow-hidden drop-shadow-xl rounded-lg py-5 px-5 my-5">
                        01
                    </div>
                    <div
                        class="col-span-2 bg-white dark:bg-gray-800 overflow-hidden drop-shadow-xl rounded-lg py-5 px-5 my-5">
                        02</div>
                    <div
                        class="row-span-2 col-span-2 bg-white dark:bg-gray-800 overflow-hidden drop-shadow-xl rounded-lg py-5 px-5 my-5">
                        03</div>
                </div> --}}

            </div>
        </div>
    </div>

</x-admin-layout>
