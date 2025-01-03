<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard-Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
    <aside class="fixed top-0 left-0 z-40 w-64 h-screen bg-teal-900">
        <div class="h-full px-3 py-4 overflow-y-auto">
            <div class="py-4 items-center">
                <h1 class="text-center font-bold text-white text-3xl">Dashboard Admin</h1>
            </div>
            <ul class="space-y-7 font-medium">
                <li>
                    <a href="{{url('/dashboard/admin')}}">
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
                    </a>
                </li>
                <li>
                    <a href="{{url('/dashboard/data-anggota')}}"
                        class="m-3 flex items-center p-2 rounded-lg hover:bg-teal-500 hover:text-white group">
                        <svg class="h-8 w-8 text-teal-400 group-hover:text-white" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <polyline points="12 4 4 8 12 12 20 8 12 4" />
                            <polyline points="4 12 12 16 20 12" />
                            <polyline points="4 16 12 20 20 16" />
                        </svg>
                        <span class="ms-2 text-teal-400 group-hover:text-white">Data Anggota</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/dashboard/data-kegiatan')}}"
                        class="m-3 flex items-center p-2 rounded-lg hover:bg-teal-500 hover:text-white group">
                        <svg class="h-8 w-8 text-teal-400 group-hover:text-white" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                        </svg>
                        <span class="ms-2 text-teal-400 group-hover:text-white">Kegiatan</span>
                    </a>
                </li>
                {{-- <li>
                    <a href=""
                        class="m-3 flex items-center p-2 rounded-lg hover:bg-teal-500 hover:text-white group">
                        <svg class="h-8 w-8 text-teal-400 group-hover:text-white" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <polyline points="12 8 12 12 14 14" />
                            <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" />
                        </svg>
                        <span class="ms-2 text-teal-400 group-hover:text-white">Iuran</span>
                    </a>
                </li> --}}
                <li class="">
                    <div class="p-2 ms-10 text-center border rounded-lg w-3/5 hover:bg-white">
                        <a href="{{url('logout')}}" class="text-white font-bold hover:text-teal-700 px-9 py-3">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
    @include('sweetalert::alert')
</body>

</html>
