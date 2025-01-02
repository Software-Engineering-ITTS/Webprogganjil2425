@extends("layouts.layout")

@section('content')

<head>
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
</head>

<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
        @if(session()->has("success"))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{session()->get("success")}}
            </div>
        @endif
          @if(session()->has("error"))
          <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{session()->get("error")}}
            </div>
          @endif
        <H1>
            Register
        </H1>
        <br>
       <form method="POST"action="{{route('register.post')}}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                <input type="text" name="name" id="name" placeholder="Ketik nama"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg"
                     autofocus>
                    
                
            </div>
          
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="text" name="email" id="email" placeholder="Ketik Email"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror"
                    required autofocus>
                    
                
            </div>

            

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan Password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror"
                    required autofocus>
                    
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
            </div>
            <div>
                <a href="{{route('login')}}">Sudah punya akun? login disini</a>
            </div>
        </form>
    </div>
</div>

@endsection

