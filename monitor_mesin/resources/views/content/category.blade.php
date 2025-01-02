@extends('home')

@section('css')
    <style>
        /* Animasi slide ke kiri */
        @keyframes slideInLeft {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOutLeft {
            from {
                transform: translateX(0);
                opacity: 1;
            }

            to {
                transform: translateX(-100%);
                opacity: 0;
            }
        }

        /* Tambahkan kelas animasi */
        .animate-slide-in {
            animation: slideInLeft 0.5s ease-out forwards;
        }

        .animate-slide-out {
            animation: slideOutLeft 0.5s ease-out forwards;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-10">
            <div class="relative flex items-center">
                <h1 class="font-medium text-lg text-gray-900 dark:text-white mb-4">Form Category</h1>

                @if (session('success'))
                    <div id="toast-success"
                        class="absolute right-0 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 z-10 animate-slide-in"
                        role="alert">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            <span class="sr-only">Check icon</span>
                        </div>
                        <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
                        <button type="button"
                            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                            data-dismiss-target="#toast-success" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif
                @if ($errors->any())
                    <div id="toast-warning"
                        class="absolute right-0 flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 z-10 animate-slide-in"
                        role="alert">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
                            </svg>
                            <span class="sr-only">Warning icon</span>
                        </div>
                        <div class="ms-3 text-sm font-normal">
                            <div>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <button type="button"
                            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                            data-dismiss-target="#toast-warning" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif
            </div>

            @if (Auth()->user()->role == 'admin')
                <form class="w-full md:max-w-2xl" id="categoryForm" action="/category" method="POST"
                    enctype="multipart/form-data">
                    <div class="flex flex-col md:flex-row md:items-center md:gap-6">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="id" id="id">
                        <div class="mb-5 md:mb-0 w-full md:w-1/2">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name
                                Category</label>
                            <input type="text" id="nama" name="nama"
                                class="nama bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Enter Name Category" required>
                        </div>

                        <!-- Input Description -->
                        <div class="mb-5 md:mb-0 w-full md:w-1/2">
                            <label for="deskripsi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea id="deskripsi" name="deskripsi" rows="1"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Enter Description..." required></textarea>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-left gap-4 md:justify-end mt-5 md:gap-4">
                            <button type="submit"
                                class="bg-blue-600 text-white font-medium text-sm px-4 py-2 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                                Submit
                            </button>
                            <button type="reset"
                                class="bg-gray-600 text-white font-medium text-sm px-4 py-2 rounded-lg hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-500 dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                                Reset
                            </button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>

    <table id="search-table">
        <thead>
            <tr>
                <th>
                    <span class="flex items-center">
                        NO
                    </span>
                </th>
                <th>
                    <span class="flex items-center">
                        Nama Category
                    </span>
                </th>
                <th>
                    <span class="flex items-center">
                        Deskripsi
                    </span>
                </th>
                @if (Auth()->user()->role == 'admin')
                    <th>
                        <span class="flex items-center">
                            Action
                        </span>
                    </th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $item)
                <tr>
                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</td>
                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $item->nama }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    @if (Auth()->user()->role == 'admin')
                        <td>
                            <div class="flex" style="align-items:center">
                                <a href="javascript:void(0)" class="edit-btn" data-id="{{ $item->id }}"
                                    data-nama="{{ $item->nama }}" data-deskripsi="{{ $item->deskripsi }}">
                                    <button type="button"
                                        class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-400 rounded-lg text-sm px-2 py-1 text-center inline-flex items-center dark:focus:ring-yellow-500 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-4 me-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                        Edit
                                    </button>
                                </a>

                                <button
                                    class="btn-delete text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-500 rounded-lg text-sm px-2 py-1 text-center inline-flex items-center dark:focus:ring-red-600 me-2"
                                    data-modal-target="popup-modal-{{ $item->id }}"
                                    data-modal-toggle="popup-modal-{{ $item->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4 me-2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                    Delete
                                </button>

                                <!-- modal delete -->
                                <div id="popup-modal-{{ $item->id }}" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="popup-modal-{{ $item->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-4 md:p-5 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                                                    you
                                                    sure you want to delete the category by name <span
                                                        class="font-medium">{{ $item->nama }}</span>?</h3>
                                                <form method="POST" action="{{ route('category.destroy', $item->id) }}"
                                                    class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-modal-hide="popup-modal-{{ $item->id }}"
                                                        data-id="{{ $item->id }}" type="submit"
                                                        class="btn-confirm-delete text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Yes, I'm sure
                                                    </button>
                                                </form>
                                                <button data-modal-hide="popup-modal-{{ $item->id }}" type="button"
                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                                    cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editButtons = document.querySelectorAll('.edit-btn');
            const form = document.getElementById('categoryForm');

            editButtons.forEach(button => {
                button.addEventListener('click', (event) => {
                    event.preventDefault(); // Hindari reload halaman

                    const id = button.dataset.id;

                    // Update action URL dan method untuk edit
                    form.action = `/category/${id}`;
                    form.querySelector('input[name="_method"]').value = 'PUT'; // Laravel PUT method

                    // Isi form dengan data
                    form.id.value = id;
                    form.nama.value = button.dataset.nama || ''; // Hindari "undefined"
                    form.deskripsi.value = button.dataset.deskripsi || '';
                });
            });
        });
    </script>
    <script>
        if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#search-table", {
                searchable: true,
                sortable: false
            });
        }
    </script>
    <script>
        // Fungsi untuk menghilangkan toast setelah 5 detik
        function autoDismissToast() {
            const toasts = document.querySelectorAll('[id^="toast-"]'); // Pilih semua elemen toast
            toasts.forEach(toast => {
                setTimeout(() => {
                    toast.classList.remove('animate-slide-in'); // Hapus animasi masuk
                    toast.classList.add('animate-slide-out'); // Tambahkan animasi keluar
                    toast.addEventListener('animationend', () => {
                        toast.remove(); // Hapus elemen dari DOM
                    });
                }, 5000); // Hilangkan setelah 5 detik
            });
        }

        // Panggil fungsi setelah halaman selesai dimuat
        window.onload = autoDismissToast;
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Event listener untuk tombol "Close"
            document.querySelectorAll('[data-dismiss-target]').forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-dismiss-target');
                    const toast = document.querySelector(targetId);
                    if (toast) {
                        toast.classList.remove('animate-slide-in');
                        toast.classList.add('animate-slide-out');
                        toast.addEventListener('animationend', () => {
                            toast.remove();
                        });
                    }
                });
            });
        });
    </script>
@endsection
