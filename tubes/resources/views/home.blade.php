<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="px-28 py-12 fixed top-0 left-0 w-full">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <svg class="w-[36px] h-[36px] text-purple-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M14.5 3 12 7.156 9.857 3H2l10 18L22 3h-7.5ZM4.486 4.5h2.4L12 13.8l5.107-9.3h2.4L12 18.021 4.486 4.5Z" />
                </svg>
                <h1><span
                        class="font-semibold text-2xl text-transparent bg-clip-text bg-gradient-to-r to-purple-600 from-blue-400">AkamSkuy</span>
                </h1>
            </div>
            <form action="{{ route('search.home') }}" method="GET">
                <div class="flex relative w-fit">
                    <input type="text" name="search" id="search"
                        class="rounded-full text-sm w-96 hover:ring-blue-500 hover:ring-1" placeholder="Search...">
                    <div class="absolute left-[340px]">
                        <button class="p-2" type="submit"><img class="w-5"
                                src="https://img.icons8.com/?size=100&id=132&format=png&color=000000"
                                alt=""></button>
                    </div>
                </div>
            </form>
            <div>
                @guest
                    <a href="{{ url('/login') }}"
                        class="px-6 py-3 bg-blue-500 rounded-lg text-white font-semibold hover:bg-blue-700">Login</a>
                @endguest

                @auth
                    <a href="{{ url('/dashboard-anggota/profile') }}" class=""><svg
                            class="w-[42px] h-[42px] text-purple-600 hover:text-blue-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="m20.7011 10.1255-.0253-.0672-2.4501-6.63953c-.0498-.13013-.1381-.24053-.2521-.31534-.1141-.07354-.2472-.10896-.3812-.10147-.1341.00748-.2628.05751-.3686.14332-.1047.08828-.1806.2079-.2175.34259l-1.6543 5.2556H8.65334l-1.65429-5.2556c-.03588-.13542-.11197-.25564-.21745-.34356-.10584-.08582-.23449-.13584-.36857-.14333-.13409-.00748-.26716.02794-.38125.10148-.11376.07511-.20195.18541-.25213.31534l-2.45472 6.6367-.02437.0671c-.35269.9569-.39623 2.007-.12404 2.9918.27219.9849.84535 1.8511 1.63305 2.4682l.00844.0068.02249.0166 3.73223 2.9022 1.84647 1.4512 1.1247.8817c.1316.1037.2922.1599.4574.1599.1652 0 .3258-.0562.4574-.1599l1.1247-.8817 1.8464-1.4512 3.7548-2.9198.0093-.0077c.786-.6172 1.3578-1.4826 1.6296-2.4661.2717-.9835.2288-2.0321-.1224-2.9881Z" />
                        </svg>
                    </a>
                @endauth
            </div>
        </div>
    </nav>
    <div class="mt-36 flex justify-center items-center">
        <div class="w-3/5">
            <table class="table-auto w-full">
                <thead class="uppercase text-sm border-b-2">
                    <tr>
                        <th class="p-3 ">nama kegiatan</th>
                        <th class="p-3 ">tanggal</th>
                        <th class="p-3 ">lokasi</th>
                        <th class="p-3 ">waktu</th>
                        <th class="p-3 ">deskripsi</th>
                        @auth
                            <th class="p-3 "></th>
                        @endauth
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($kegiatans as $items)
                        <tr class="border-b odd:bg-white even:bg-gray-100">
                            <td class="p-5 w-48 text-center">{{ $items->nama_kegiatan }}</td>
                            <td class="p-5 w-48 text-center">{{ $items->tanggal_kegiatan }}</td>
                            <td class="p-5 w-56 text-center">{{ $items->lokasi_kegiatan }}</td>
                            <td class="p-5 w-56 text-center">{{ $items->waktu_kegiatan }}</td>
                            <td class="p-5 text-justify">{{ $items->deskripsi }}</td>

                            @auth
                                <td class="p-3 text-center">
                                    {{-- <button type="button" data-modal-target="iuran-form" data-modal-toggle="iuran-form"
                                        class="py-1 px-2 bg-lime-400 rounded-lg font-semibold flex items-center hover:bg-lime-500 hover:text-white group"><svg
                                            class="w-[24px] h-[24px] text-gray-800 group-hover:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 12h14m-7 7V5" />
                                        </svg>
                                    </button> --}}
                                    <a href="/dashboard-anggota/{{ $items->id }}"
                                        class="px-3 py-2 border rounded-lg bg-lime-300 font-medium">Ikuti</a>

                                    {{-- @include('anggota.iuran') --}}

                                </td>
                            @endauth
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="">
                <div class="mt-4 text-center">
                    <p>{{ $kegiatans->firstItem() }} of {{ $kegiatans->total() }}</p>
                </div>
                <div class="relative bottom-8">
                    {!! $kegiatans->links() !!}
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</body>

</html>
