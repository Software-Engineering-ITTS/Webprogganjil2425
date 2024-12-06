<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <aside class="fixed top-0 left-0 z-40 w-64 h-screen bg-[#424242]">
        <div class="h-full px-3 py-4 overflow-y-auto">
            <div class="py-4 flex items-center">
                <img class="w-16 h-16"
                    src="https://png.pngtree.com/png-clipart/20220909/original/pngtree-books-vectro-illustration-png-image_8522264.png"
                    alt="">
                <h1 class="text-center font-bold text-white">Toko Buku BokoBoy</h1>
            </div>
            <ul class="space-y-7 font-medium">
                <li>
                    <div class="m-3 flex items-center p-2 rounded-lg hover:bg-teal-500 hover:text-white group ">
                        <svg class="h-8 w-8 text-teal-400 group-hover:text-white" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <circle cx="12" cy="13" r="2" />
                            <line x1="13.45" y1="11.55" x2="15.5" y2="9.5" />
                            <path d="M6.4 20a9 9 0 1 1 11.2 0Z" />
                        </svg>
                        <span class="ms-2 text-teal-400 group-hover:text-white">Dashboard</span>
                    </div>
                </li>
                <li>
                    <a href="{{ url('kategori') }}"
                        class="m-3 flex items-center p-2 rounded-lg hover:bg-teal-500 hover:text-white group">
                        <svg class="h-8 w-8 text-teal-400 group-hover:text-white" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <polyline points="12 4 4 8 12 12 20 8 12 4" />
                            <polyline points="4 12 12 16 20 12" />
                            <polyline points="4 16 12 20 20 16" />
                        </svg>
                        <span class="ms-2 text-teal-400 group-hover:text-white">Kategori</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('databuku') }}"
                        class="m-3 flex items-center p-2 rounded-lg hover:bg-teal-500 hover:text-white group">
                        <svg class="h-8 w-8 text-teal-400 group-hover:text-white" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                        </svg>
                        <span class="ms-2 text-teal-400 group-hover:text-white">Data Buku</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('transaksi') }}"
                        class="m-3 flex items-center p-2 rounded-lg hover:bg-teal-500 hover:text-white group">
                        <svg class="h-8 w-8 text-teal-400 group-hover:text-white" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <polyline points="12 8 12 12 14 14" />
                            <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" />
                        </svg>
                        <span class="ms-2 text-teal-400 group-hover:text-white">History Transaksi</span>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-3 py-1 w-full text-sm bg-white flex border rounded-lg items-center justify-center">
                            <svg class="h-8 w-8 text-teal-400" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                <path d="M7 12h14l-3 -3m0 6l3 -3" />
                            </svg>
                            <span class="ms-2 text-teal-400">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </aside>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
