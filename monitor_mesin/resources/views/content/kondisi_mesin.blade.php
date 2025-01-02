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
                <h1 class="font-medium text-lg text-gray-900 dark:text-white mb-4">Form Kondisi Mesin</h1>

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
                <form class="w-full md:max-w-5xl" id="kondisi_mesinForm" action="/kondisi_mesin" method="POST"
                    enctype="multipart/form-data">
                    <div class="flex flex-col md:flex-row md:items-center md:gap-6">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="id" id="id">
                        <div class="mb-5 md:mb-0 w-full md:w-1/2">
                            <label for="mesin_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                                Mesin</label>
                            <select
                                class="mesin_id bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="mesin_id" id="mesin_id" aria-label="Default select example" required>
                                <option value="" @readonly(true)>Enter Select Mesin</option>
                                @foreach ($mesin as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-5 md:mb-0 w-full md:w-1/2">
                            <label for="temperature"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Temperature
                                Mesin</label>
                            <input type="number" id="temperature" name="temperature"
                                class="temperature bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Enter Temperature Mesin" required oninput="updateStatus()">
                        </div>

                        <div class="mb-5 md:mb-0 w-full md:w-1/2">
                            <label for="status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Mesin</label>
                            <input type="text" id="status" name="status"
                                class="status bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Status Mesin" required disabled>
                        </div>

                        <!-- Input Description -->
                        <div class="mb-5 md:mb-0 w-full md:w-1/2">
                            <label for="notes"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notes</label>
                            <textarea id="notes" name="notes" rows="1"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Enter Notes..." required></textarea>
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
                        Nama Mesin
                    </span>
                </th>
                <th>
                    <span class="flex items-center">
                        Temperature
                    </span>
                </th>
                <th>
                    <span class="flex items-center">
                        Status
                    </span>
                </th>
                <th>
                    <span class="flex items-center">
                        Last Checked
                    </span>
                </th>
                <th>
                    <span class="flex items-center">
                        Notes
                    </span>
                </th>
                <th>
                    @if (Auth()->user()->role == 'admin')
                        <span class="flex items-center">
                            Action
                        </span>
                    @endif
                </th>
                {{-- <th>
                    <span class="flex items-center">
                        Action
                    </span>
                </th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($kondisi_mesin as $item)
                <tr>
                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</td>
                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @if ($item->mesin->status == 'Mesin On')
                            <span class="inline-flex w-3 h-3 me-3 bg-green-500 rounded-full"></span>
                        @else
                            <span class="inline-flex w-3 h-3 me-3 bg-red-500 rounded-full"></span>
                        @endif
                        {{ $item->mesin->nama }}
                    </td>
                    <td>{{ $item->temperature }}°Celcius</td>
                    <td>
                        @if ($item->status == 'Normal')
                            <span
                                class="bg-green-100 text-green-800 text-sm font-medium px-2 py-1 rounded dark:bg-green-900 dark:text-green-300">{{ $item->status }}</span>
                        @else
                            <span
                                class="bg-red-100 text-red-800 text-sm font-medium px-2 py-1 rounded dark:bg-red-900 dark:text-red-300">{{ $item->status }}</span>
                        @endif
                    </td>
                    <td>{{ $item->last_checked }}</td>
                    <td>{{ $item->notes }}</td>
                    <td>
                        @if (Auth()->user()->role == 'admin')
                            <div class="flex" style="align-items:center">
                                <button data-modal-target="crud-modal-{{ $item->id }}"
                                    data-modal-toggle="crud-modal-{{ $item->id }}"
                                    class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-400 rounded-lg text-sm px-2 py-1 text-center inline-flex items-center dark:focus:ring-yellow-500 me-2"
                                    type="button">
                                    Edit
                                </button>

                                <!-- Main modal -->
                                <div id="crud-modal-{{ $item->id }}" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    Edit Kondisi {{ $item->mesin->nama }}
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-toggle="crud-modal-{{ $item->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form class="p-4 md:p-5"
                                                action="{{ route('kondisi_mesin.update', $item->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="grid gap-4 mb-4 grid-cols-2">
                                                    <div class="col-span-2 text-lg">
                                                        <label for="status"
                                                            class="relative mb-2 text-lg font-medium text-gray-900 dark:text-white">Status
                                                            : </label>
                                                        <span
                                                            class="bg-red-100 text-red-800 text-sm font-medium px-2 py-1 rounded dark:bg-red-900 dark:text-red-300">{{ $item->status }}</span>
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="temperature"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">temperature</label>
                                                        <input type="number" name="temperature" id="temperature"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            required value="{{ $item->temperature }}">
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="notes"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notes</label>
                                                        <textarea id="notes" rows="4"
                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Write notes here">{{ $item->notes }}</textarea>
                                                    </div>
                                                </div>
                                                <button type="submit"
                                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Update
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script>
        if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#search-table", {
                searchable: true,
                sortable: false
            });
        }
    </script>
    <script>
        function updateStatus() {
            const temperatureInput = document.getElementById('temperature');
            const statusInput = document.getElementById('status');

            const temperature = parseFloat(temperatureInput.value);

            if (temperature >= 30 && temperature <= 50) {
                statusInput.value = "Normal";
            } else if (temperature > 50 && temperature <= 80) {
                statusInput.value = "Overheat"; // Kosongkan jika tidak sesuai
            } else {
                statusInput.value = "";
            }
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
