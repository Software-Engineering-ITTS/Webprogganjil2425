@extends('layout.app')
@section('title', 'Home')

@section('content')
<body>
    <div class="px-32">
        <div class="flex flex-col justify-center items-center gap-20 ">
            {{-- Header --}}
            <div class="flex group flex-col justify-center items-center gap-20 mt-20">
                <h1 class="font-bold text-3xl">Welcome To Pustaka <span class="text-yellow-400">2000</span>  !</h1>
                <div class="flex justify-center items-center gap-10">
                    <img src="{{ asset('img/miku.gif') }}" class="border-4" alt="No GIF">   
                    <div class="flex flex-col gap-5"> 
                        <h1 class="text-4xl font-bold">About Pustaka 2000</h1>
                        <p class="w-96"><span class="text-yellow-500 font-bold">Pustaka 2000</span> adalah Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque deleniti asperiores ut debitis quasi saepe sequi explicabo mollitia facilis repellat ipsum eaque cupiditate expedita hic velit iusto dicta, esse quaerat!</p>
                    </div>
                </div>
            </div>

            <div class=" flex flex-col gap-10">
                <h1 class="text-2xl font-bold mt-10">Our Newest <span class="text-yellow-500">Collections</span> !</h1>
                {{-- cards buku --}}
                <div class="flex gap-10">
                    @foreach ($books as $book)
                        <div class=" items-center opacity-30 hover:opacity-100 border-4 bg-gray-900 group hover:bg-gray-800 duration-300 rounded-xl">
                            <div class="w-full group-hover:grayscale-0 grayscale">
                                <img src="{{ asset('storage/' . $book->cover_buku) }}" class="h-44 w-full object-cover" alt="Book Cover">
                            </div>
                            <div class="border-4 w-full"></div>
                            <div class="text-start gap-2 flex flex-col justify-start items-start p-5 text-lg ">
                                <h1 class="text-center mt-2 font-bold"> Title : <span class=" text-gray-800 group-hover:text-yellow-500 duration-300">{{ $book->title }}</span></h1>
                                <h1 class="text-center mt-2 font-bold"> Author : <span class="text-gray-800 group-hover:text-yellow-500 duration-300">{{ $book->author }}</span></h1>
                                <h1 class="text-center mt-2 font-bold"><span class="text-yellow-500">Rp</span> <span class="text-gray-800 group-hover:text-white duration-300">{{ $book->harga }}</span> </h1>
                                <a href="{{ route ('Transaction') }}" class="bg group-hover:opacity-100 opacity-0 hover:bg-green-500 hover:text-white  bg-white text-black  duration-300 mt-5   px-3 rounded-lg">Buy Now</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- section ala ala --}}
            <div class="flex flex-col gap-10 group ">
                <h1 class="font-bold text-2xl text-center mt-4">Developed <span class="text-yellow-500">By </span></h1>
                <div class="group-hover:w-full group-hover:border  w-0 duration-500 "></div>
                <div class="grid grid-cols-4 gap-20 pb-10">
                    <div class="relative w-56 h-64 bg-white shadow-lg rounded-lg    overflow-hidden">
                        <div class="relative w-full h-full">
                            <img 
                                src="{{ asset('img/miku_blue.gif') }}" 
                                class="w-full h-full object-cover border-4  rounded-t-lg" 
                                alt="Profile Image"
                            >
                        </div>
                        <div class="absolute bottom-0 bg-gradient-to-t from-black to-transparent w-full h-1/3    text-white flex items-center justify-center ">
                            <p class="text-lg font-bold">Ahmad </p>
                        </div>
                    </div>

                    <div class=" relative w-56 h-64 bg-white shadow-lg rounded-lg  group overflow-hidden">
                        <div class="relative w-full h-full ">
                            <img 
                                src="{{ asset('img/miku_pink.gif') }}" 
                                class="w-full h-full object-cover border-4  rounded-t-lg" 
                                alt="Profile Image"
                            >
                        </div>
                        <div class="absolute bottom-0 bg-gradient-to-t from-black to-transparent w-full h-1/3    text-white flex items-center justify-center ">
                            <p class="text-lg font-bold">Ivan</p>
                        </div>
                    </div>

                    <div class="relative w-56 h-64 bg-white shadow-lg rounded-lg    overflow-hidden">
                        <div class="relative w-full h-full ">
                            <img 
                                src="{{ asset('img/miku2.gif') }}" 
                                class="w-full h-full object-cover border-4  rounded-t-lg" 
                                alt="Profile Image"
                            >
                        </div>
                        <div class="absolute bottom-0 bg-gradient-to-t from-black to-transparent w-full h-1/3    text-white flex items-center justify-center ">
                            <p class="text-lg font-bold"> Sahmura </p>
                        </div>
                    </div>

                    <div class="relative w-56 h-64 bg-white shadow-lg rounded-lg    overflow-hidden">
                        <div class="relative w-full h-full ">
                            <img 
                                src="{{ asset('img/miku4.gif') }}" 
                                class="w-full h-full object-cover border-4  rounded-t-lg" 
                                alt="Profile Image"
                            >
                        </div>
                        <div class="absolute bottom-0 bg-gradient-to-t from-black to-transparent w-full h-1/3    text-white flex items-center justify-center ">
                            <p class="text-lg font-bold"> Soni </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 


</body>
@endsection
