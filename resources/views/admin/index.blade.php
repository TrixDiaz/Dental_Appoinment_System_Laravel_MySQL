<x-admin-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboards') }}
        </h2>
    </x-slot> --}}

    <div class="py-10">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-welcome /> --}}

                <div class="grid grid-cols-3 gap-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden drop-shadow-xl rounded-lg py-5 px-5 my-5">01
                    </div>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden drop-shadow-xl rounded-lg py-5 px-5 my-5">02
                    </div>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden drop-shadow-xl rounded-lg py-5 px-5 my-5">03
                    </div>
                </div>

                <div class="drop-shadow-xl rounded-lg bg-white dark:bg-gray-800 overflow-hidden shadow">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("You're logged in!") }}
                    </div>
                </div>

                <div class="grid grid-rows-3 grid-flow-col gap-4">
                    <div
                        class="row-span-3 bg-white dark:bg-gray-800 overflow-hidden drop-shadow-xl rounded-lg py-5 px-5 my-5">
                        01</div>
                    <div
                        class="col-span-2 bg-white dark:bg-gray-800 overflow-hidden drop-shadow-xl rounded-lg py-5 px-5 my-5">
                        02</div>
                    <div
                        class="row-span-2 col-span-2 bg-white dark:bg-gray-800 overflow-hidden drop-shadow-xl rounded-lg py-5 px-5 my-5">
                        03</div>
                </div>


            </div>
        </div>
    </div>
</x-admin-layout>
