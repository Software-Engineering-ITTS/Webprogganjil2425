<nav class="sticky top-0 z-30">
    <ul class="bg-black  flex gap-10 items-center text-center justify-center h-20 text-white font-bold">
        <li class="group hover:scale-110 duration-300">
            <a href="/Home">Home</a>
            <div class="group-hover:w-full group-hover:border duration-300 w-0 border-yellow-400"></div>
        </li>
        <li class="group hover:scale-110 duration-300">
            <a href="{{ route ('Buku') }}">Tambah Buku</a>
            <div class="group-hover:w-full group-hover:border duration-300 w-0 border-yellow-400"></div>
        </li>
        <li class="group hover:scale-110 duration-300">
            <a href=" {{ route ('ViewBuku') }}">View Buku</a>
            <div class="group-hover:w-full group-hover:border duration-300 w-0 border-yellow-400"></div>
        </li>
        <li class="group hover:scale-110 duration-300">
            <a href="{{ route ('ViewTransaction') }}">View Transaction</a>
            <div class="group-hover:w-full group-hover:border duration-300 w-0 border-yellow-400"></div>
        </li>
    </ul>
</nav>