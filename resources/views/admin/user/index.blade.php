<x-admin-layout>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
   
    <div class="py-10">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-welcome /> --}}

                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-slate-900 uppercase tracking-wider">
                                                Name</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-slate-900 uppercase tracking-wider">
                                                Email</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-slate-900 uppercase tracking-wider">
                                                Role</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-slate-900 uppercase tracking-wider">
                                                Type</th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                            <th class="flex justify-end mx-2">
                                                <span type="button" data-modal-target="authentication-modal"
                                                    data-modal-toggle="authentication-modal">
                                                    <svg viewBox="0 -0.5 21 21" class="w-10 h-10 py-1 mx-2"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                            stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <title>plus_circle [#1425]</title>
                                                            <desc>Created with Sketch.</desc>
                                                            <defs> </defs>
                                                            <g id="Page-1" stroke="none" stroke-width="1"
                                                                fill="none" fill-rule="evenodd">
                                                                <g id="Dribbble-Light-Preview"
                                                                    transform="translate(-259.000000, -600.000000)"
                                                                    fill="#000000">
                                                                    <g id="icons"
                                                                        transform="translate(56.000000, 160.000000)">
                                                                        <path
                                                                            d="M214.55,449 L217.7,449 L217.7,451 L214.55,451 L214.55,454 L212.45,454 L212.45,451 L209.3,451 L209.3,449 L212.45,449 L212.45,446 L214.55,446 L214.55,449 Z M213.5,458 C208.86845,458 205.1,454.411 205.1,450 C205.1,445.589 208.86845,442 213.5,442 C218.13155,442 221.9,445.589 221.9,450 C221.9,454.411 218.13155,458 213.5,458 L213.5,458 Z M213.5,440 C207.70085,440 203,444.477 203,450 C203,455.523 207.70085,460 213.5,460 C219.29915,460 224,455.523 224,450 C224,444.477 219.29915,440 213.5,440 L213.5,440 Z"
                                                                            id="plus_circle-[#1425]"> </path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </span>

                                                {{-- Modal for Add --}}
                                                <!-- Main modal -->
                                                <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-md max-h-full">
                                                        <!-- Modal content -->
                                                        <div
                                                            class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button"
                                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                                data-modal-hide="authentication-modal">
                                                                <svg aria-hidden="true" class="w-5 h-5"
                                                                    fill="currentColor" viewBox="0 0 20 20"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd"
                                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <div class="px-6 py-6 lg:px-8">
                                                                <h3
                                                                    class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                                                    Register Users</h3>
                                                                <form action="/createUser" method="POST"
                                                                    class="space-y-6">
                                                                    @csrf
                                                                    <div>
                                                                        <label for="username"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                                                            Username</label>
                                                                        <input type="text" name="username"
                                                                            id="username"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                            placeholder="xxx123" required>
                                                                    </div>

                                                                    <div>
                                                                        <label for="name"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                                                            Full Name</label>
                                                                        <input type="text" name="name"
                                                                            id="name"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                            placeholder="Last First M.I" required>
                                                                    </div>

                                                                    <div>
                                                                        <label for="email"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                                                            email</label>
                                                                        <input type="email" name="email"
                                                                            id="email"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                            placeholder="name@company.com" required>
                                                                    </div>
                                                                    <div>
                                                                        <label for="password"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                                                            password</label>
                                                                        <input type="password" name="password"
                                                                            id="password"
                                                                            placeholder="Default Password set"
                                                                            value="admin123"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                            required readonly>
                                                                    </div>

                                                                    <div class="sm:col-span-6">
                                                                        <label for="role"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                                                        <select id="role" name="role"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                            <option selected>Choose a Role
                                                                            </option>
                                                                            <option value="users">users</option>
                                                                            <option value="admin">admin</option>
                                                                        </select>

                                                                        @error('role')
                                                                            <span class="text-red-400 text-sm"></span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="sm:col-span-6">
                                                                        <label for="type"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                                                        <select id="type" name="type"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                            <option selected>Choose a Type
                                                                            </option>
                                                                            <option value="patient">patient</option>
                                                                            <option value="doctor">doctor</option>
                                                                        </select>

                                                                        @error('type')
                                                                            <span class="text-red-400 text-sm"></span>
                                                                        @enderror
                                                                    </div>

                                                                    <button type="submit"
                                                                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                        Add New Users</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- End of Modal --}}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        {{ $user->name }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        {{ $user->email }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        {{ $user->role }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        {{ $user->type }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex justify-end">
                                                        <div class="block mx-2">
                                                            <a href="{{ route('admin.user.edit', $user->id) }}"
                                                                class="text-yellow-400 mx-3 flex">
                                                                <svg fill="#FACC15" class="w-5 h-5 mx-1"
                                                                    viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M20.7,5.2a1.024,1.024,0,0,1,0,1.448L18.074,9.276l-3.35-3.35L17.35,3.3a1.024,1.024,0,0,1,1.448,0Zm-4.166,5.614-3.35-3.35L4.675,15.975,3,21l5.025-1.675Z">
                                                                    </path>
                                                                </svg>
                                                                Edit
                                                            </a>
                                                        </div>

                                                        <form class="text-red-500 flex mx-3" method="POST"
                                                            action=""
                                                            onsubmit="return confirm('Are you sure?');">
                                                            @csrf
                                                            @method('DELETE')

                                                            <svg fill="#EF5E5C" class="w-5 h-5 mx-2"
                                                                viewBox="-6.7 0 122.88 122.88" version="1.1"
                                                                id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                enable-background="new 0 0 109.484 122.88"
                                                                xml:space="preserve">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M2.347,9.633h38.297V3.76c0-2.068,1.689-3.76,3.76-3.76h21.144 c2.07,0,3.76,1.691,3.76,3.76v5.874h37.83c1.293,0,2.347,1.057,2.347,2.349v11.514H0V11.982C0,10.69,1.055,9.633,2.347,9.633 L2.347,9.633z M8.69,29.605h92.921c1.937,0,3.696,1.599,3.521,3.524l-7.864,86.229c-0.174,1.926-1.59,3.521-3.523,3.521h-77.3 c-1.934,0-3.352-1.592-3.524-3.521L5.166,33.129C4.994,31.197,6.751,29.605,8.69,29.605L8.69,29.605z M69.077,42.998h9.866v65.314 h-9.866V42.998L69.077,42.998z M30.072,42.998h9.867v65.314h-9.867V42.998L30.072,42.998z M49.572,42.998h9.869v65.314h-9.869 V42.998L49.572,42.998z">
                                                                </path>
                                                            </svg>

                                                            <button type="submit">Delete</button>
                                                        </form>
                                                    </div>
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
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
   

   
</x-admin-layout>
