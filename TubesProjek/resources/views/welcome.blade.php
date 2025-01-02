@extends('layouts.app')
@section('title', 'GuardianX')

@section('content')
    <main class="py-6 px-4 sm:p-6 md:py-10 md:px-8 mt-48">
        <div class="max-w-4xl mx-auto grid lg:max-w-5xl lg:gap-x-20 lg:grid-cols-2">

            <div class="relative p-3 col-start-1 row-start-1 flex flex-col-reverse rounded-lg bg-gradient-to-t sm:bg-none sm:row-start-2 sm:p-0 lg:row-start-1">
                <h1 class="mt-1 text-lg font-semibold md:text-2xl bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-violet-500">Monitoring and Security Application</h1>
                <p class="text-sm font-bold text-white sm:text-slate-500 dark:sm:text-slate-400">GuardianX</p>
            </div>

            <div class="grid gap-4 col-start-1 col-end-3 row-start-1 sm:mb-6 sm:grid-cols-4 lg:gap-6 lg:col-start-2 lg:row-end-6 lg:row-span-6 lg:mb-0">
                <img src="{{ asset('images/homepage.png') }}" alt="" class="w-full h-60 object-cover rounded-lg sm:h-52 sm:col-span-2 lg:col-span-full">
            </div>

            <div class="mt-4 text-xs font-medium row-start-2 sm:mt-1 sm:row-start-3 md:mt-2.5 lg:row-start-2 ">
                <span class="flex items-center text-slate-500">Jawa, Indonesia</span>
            </div>

            <div class="mt-4 col-start-1 row-start-3 self-center sm:mt-0 sm:col-start-2 sm:row-start-2 sm:row-span-2 lg:mt-6 lg:col-start-1 lg:row-start-3 lg:row-end-4">
                <a href="{{route('login')}}" class="bg-pink-500 text-white px-7 py-3 rounded-xl d-inline hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">Get Started</a>
            </div>

            <p class="mt-4 text-sm leading-6 col-start-1 sm:col-span-2 lg:mt-6 lg:row-start-4 lg:col-span-1 dark:text-slate-400">
                GuardianX adalah sistem keamanan berbasis web yang membantu Anda memantau akses ke area terbatas, mengelola ijin masuk ruangan, dan mendeteksi aktivitas mencurigakan secara efektif.
            </p>

        </div>
    </main>
@endsection