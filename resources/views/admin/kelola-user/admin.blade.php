@extends('admin.layouts.main')

@section('title', 'Kelola Admin')

@section('content')

    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Pilih User <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
        <li>
            <a href="{{route('admin.kelola-user')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Admin</a>
        </li>
        <li>
            <a href="{{route('admin.estimator.kelola-user')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Estimator</a>
        </li>
        <li>
            <a href="{{route('admin.staf.kelola-user')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Staf Gudang</a>
        </li>
        </ul>
    </div>

    <div id="form_admin" style="display:grid">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
            <div class="flex items-center  pb-4 bg-white dark:bg-gray-900 m-5">
                <form action="{{ route('admin.kelola-user')}}" method="GET">
                    @csrf
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="search" name="search"
                            class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for users">
                    </div>
                </form>
                <!-- Modal toggle -->
                <div class="flex justify-center m-5 ">
                    <button id="defaultModalButton" data-modal-toggle="defaultModal"
                        class="block text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                        type="button">

                        <div class="flex justify-center ">
                            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Add Data
                        </div>
                    </button>
                </div>

                <!-- Main modal -->
                <div id="defaultModal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                        <!-- Modal content -->
                        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                            <!-- Modal header -->
                            <div
                                class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-grey">
                                    Add User
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="defaultModal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form action="{{ route('admin.create') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                    <div>
                                        <label for="nama"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                        <input type="text" name="nama" id="nama"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Nama" required="">
                                    </div>
                                    <div>
                                        <label for="username"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                        <input type="text" name="username" id="username"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Username" required="">
                                    </div>
                                    <div>
                                        <label for="email"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                        <input type="text" name="email" id="email"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="name@xxx.com" required="">
                                    </div>
                                    <div>
                                        <label for="password"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                        <input type="password" name="password" id="password" placeholder="••••••••"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required="">
                                    </div>
                                    <div>
                                        <label for="no_telp"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                                            Telepon</label>
                                        <input type="text" name="no_telp" id="no_telp"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="08xxxxxxxxxx" required="">
                                    </div>
                                </div>
                                <div class="flex items-center p-5">
                                    <div class="mr-4">
                                        <label for="file_input" class="cursor-pointer">
                                            <div class="relative w-20 h-20 rounded-full overflow-hidden">
                                                <img id="profile-preview" src="{{ asset('storage/avatars/default.png') }}" alt="Foto Profil" class="w-full h-full object-cover">
                                            </div>
                                        </label>
                                    </div>
                                    <div class="mx-3 top-3">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Avatar</label>
                                        <input class="block w-100 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" type="file" name="avatar" id="file_input" onchange="previewImage(event)">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG (MAX. 800x400px).</p>
                                    </div>
                                </div>
                                <div class="space-x-2 border-t border-gray-200 rounded-b">
                                    <div class="mt-5">
                                        <button type="submit"
                                            class="text-white inline-flex items-center bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Add User
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-5">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">
                                Id Admin
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Username
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                No Telepon
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 item-center text-center">
                                    {{ $admin->id }}
                                </td>
                                <th scope="row" class="flex px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex justify-content-center">
                                        <img class="w-10 h-10 rounded-full" src="{{asset('storage/'.$admin->avatar)}}"
                                            alt="Jese image">
                                        <div class="pl-3">
                                            <div class="text-base font-semibold"> {{ $admin->nama }} </div>
                                            <div class="font-normal text-gray-500"> {{ $admin->email }} </div>
                                        </div>
                                    </div>
                                </th>
                                <td class="px-6 py-4 item-center text-center">
                                    {{ $admin->username }}
                                </td>
                                <td class="px-6 py-4 item-center text-center">
                                    {{ $admin->no_telp }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-around ">
                                        <div>
                                            <!-- Modal toggle -->
                                            <button id="updateUserButton-{{ $admin->id }}" data-modal-toggle="updateUserModal-{{ $admin->id }}"
                                                class="block text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                                type="button">
                                                Edit User
                                            </button>
                                        </div>

                                        <!-- Main modal -->
                                        <div id="updateUserModal-{{ $admin->id }}" tabindex="-1" aria-hidden="true"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                                <!-- Modal content -->
                                                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                            Edit User
                                                        </h3>
                                                        <button type="button"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-toggle="updateUserModal-{{ $admin->id }}">
                                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                                            <div>
                                                                <label for="nama"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                                                <input type="text" name="nama" id="nama"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                    placeholder="Name8" required="" value="{{ $admin->nama }}">
                                                            </div>
                                                            <div>
                                                                <label for="username"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                                                <input type="text" name="username" id="username"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                    placeholder="Username" required="" value="{{ $admin->username }}">
                                                            </div>
                                                            <div>
                                                                <label for="email"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                                                <input type="text" name="email" id="email"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                    placeholder="name@xxx.com" required="" value="{{ $admin->email }}">
                                                            </div>
                                                            <div>
                                                                <label for="password"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                                                <input type="text" name="password" id="password"
                                                                    placeholder="••••••••"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            </div>
                                                            <div>
                                                                <label for="no_telp"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telepon</label>
                                                                <input type="text" name="no_telp" id="no_telp"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                    placeholder="08xxxxxxxxxx" value="{{ $admin->no_telp }}">
                                                            </div>
                                                        </div>
                                                        <div class="flex items-center p-5">
                                                            <div class="mr-4">
                                                                <label for="file_input" class="cursor-pointer">
                                                                    <div class="relative w-20 h-20 rounded-full overflow-hidden">
                                                                        <img id="profile-preview" src="{{asset('storage/'.$admin->avatar)}}" alt="Foto Profil" class="w-full h-full object-cover">
                                                                    </div>
                                                                </label>
                                                            </div>
                                                            <div class="mx-3 top-3">
                                                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Avatar</label>
                                                                <input class="block w-100 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" type="file" name="avatar" id="file_input" onchange="previewImage(event)">
                                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG (MAX. 800x400px).</p>
                                                            </div>
                                                        </div>
                                                        <div class="flex items-center space-x-4 border-t border-gray-200 rounded-b">
                                                            <div class="mt-4">
                                                                <button type="submit"
                                                                    class="text-white inline-flex items-center bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                                    <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor"
                                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd"
                                                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                                            clip-rule="evenodd"></path>
                                                                    </svg>
                                                                    Update User
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ route('admin.delete', $admin->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div>
                                                <button type="submit"
                                                    class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                    <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Delete Admin
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $admins->links() }}
            </div>
        </div>

    </div>

@endsection

@section('script')
    <script>
        //script untuk modal create data
        document.addEventListener("DOMContentLoaded", function(event) {
            document.getElementById('defaultModalButton').click();
        });

        // script untuk preview avatar saat create sebelum di upload
        function previewImage(event) {
            const profilePreview = document.getElementById('profile-preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function() {
                    profilePreview.src = reader.result;
                }

                reader.readAsDataURL(file);
            }
        }





    </script>
@endsection