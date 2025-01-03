<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <Title>Dashboard-Anggota</Title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
    <aside class="fixed top-0 left-0 z-40 w-64 h-screen bg-teal-900">
        <div class="h-full px-3 py-4 overflow-y-auto">
            <div class="py-4 items-center">
                <h1 class="text-center font-bold text-white text-3xl">Welcome</h1>
                <h1 class="text-center font-bold text-white text-3xl">{{ $users->username }}</h1>
            </div>
            <ul class="space-y-7 font-medium">
                <li>
                    <a href="{{ url('/dashboard-anggota/profile') }}">
                        <div class="m-3 flex items-center p-2 rounded-lg hover:bg-teal-500 hover:text-white group ">
                            <svg class="w-[32px] h-[32px]  text-teal-400 group-hover:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ms-2 text-teal-400 group-hover:text-white">Profile</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/dashboard-anggota/kegiatan') }}"
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
                        <svg class="w-[32px] h-[32px] text-teal-400 group-hover:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 14a3 3 0 0 1 3-3h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-4a3 3 0 0 1-3-3Zm3-1a1 1 0 1 0 0 2h4v-2h-4Z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M12.293 3.293a1 1 0 0 1 1.414 0L16.414 6h-2.828l-1.293-1.293a1 1 0 0 1 0-1.414ZM12.414 6 9.707 3.293a1 1 0 0 0-1.414 0L5.586 6h6.828ZM4.586 7l-.056.055A2 2 0 0 0 3 9v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2h-4a5 5 0 0 1 0-10h4a2 2 0 0 0-1.53-1.945L17.414 7H4.586Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ms-2 text-teal-400 group-hover:text-white">Iuran</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ url('/') }}"
                        class="m-3 flex items-center p-2 rounded-lg hover:bg-teal-500 hover:text-white group">
                        <svg class="w-[32px] h-[32px] text-teal-400 group-hover:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ms-2 text-teal-400 group-hover:text-white">Home</span>
                    </a>
                </li>
                <li class="">
                    <div class="p-2 ms-10 text-center border rounded-lg w-3/5 hover:bg-white">
                        <a href="{{ url('logout') }}"
                            class="text-white font-bold hover:text-teal-700 px-9 py-3">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
    @include('sweetalert::alert')
</body>

</html>
