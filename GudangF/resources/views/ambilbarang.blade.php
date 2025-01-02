@extends("index")

@section('content')
<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
        <h1 class="text-center text-lg font-bold mb-4">Ambil Barang</h1>

        
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        
        <form method="POST" action="{{ route('ambil.post', $penambahan->id) }}">
            @csrf

           
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">email Pengambil</label>
                <input type="text" name="email" id="email" placeholder="email pengambil" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" 
                    value="{{ old('email') }}" required>
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama </label>
                <input type="text" name="name" id="name" placeholder="nama pengambil"
                    class="bg-gray-200 border-2 w-full p-4 rounded-lg "
                    value=""required>
               
            </div>

           
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Barang</label>
                <input type="text" value="{{ $penambahan->NamaBar }}" 
                    class="bg-gray-200 border-2 w-full p-4 rounded-lg" disabled>
                <input type="hidden" name="AMbarang" value="{{ $penambahan->NamaBar }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Jumlah Barang</label>
                <input type="text" value="{{ $penambahan->JumlahBar }}" 
                    class="bg-gray-200 border-2 w-full p-4 rounded-lg" disabled>
                <input type="hidden" name="JUMbar" value="{{ $penambahan->JumlahBar }}">
            </div>

 
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Berat Barang</label>
                <input type="text" value="{{ $penambahan->BeratBar }}" 
                    class="bg-gray-200 border-2 w-full p-4 rounded-lg" disabled>
                <input type="hidden" name="BERbar" value="{{ $penambahan->BeratBar }}">
            </div>

            
            <div class="mb-4">
                <label for="Dateam" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Ambil</label>
                <input type="date" name="Dateam" id="Dateam" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('Dateam') border-red-500 @enderror" 
                    value="{{ old('Dateam') }}" required>
                @error('Dateam')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

           
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                    Ambil Barang
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
