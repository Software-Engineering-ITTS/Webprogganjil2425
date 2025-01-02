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
           LOGIN
        </H1>
        <br>
       <form method="POST"action="{{route('login.post')}}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="text" name="email" id="email" placeholder="Type Email"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror"
                    required autofocus>
                    @if($errors->has('email'))
                        <span class="text-danger">
                            {{$errors->first('email')}}
                        </span>
                    @endif
                
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter Password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror"
                    value="">
                @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Login</button>
            </div>
            <div>
                <a href="/register">belum buat akun? buat disini</a>
            </div>
        </form>
    </div>
</div>

@endsection
