@extends('layouts.app')

@section('content')

<body>
  <div class="flex flex-col justify-center items-center mt-10">
    <h1 class="font-bold text-2xl">
      View Data Presensi Karyawan
    </h1>
    <div class="flex flex-col justify-center items-start mt-10 gap-5">
      <table class="min-w-full text-sm text-left text-gray-800">
        <thead class="text-xs text-white uppercase bg-blue-500">
          <tr>
            <th class="px-6 py-4">No</th>
            <th class="px-6 py-4">User</th>
            <th class="px-6 py-4">Tanggal</th>
            <th class="px-6 py-4">Jam Masuk</th>
            <th class="px-6 py-4">Jam Keluar</th>
            <th class="px-6 py-4">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($presensi as $index => $data)
          <tr class="bg-white border-b hover:bg-gray-50">
            <td class="px-6 py-4">{{ $index + 1 }}</td>
            <td class="px-6 py-4">{{ $data->user->name }}</td>
            <td class="px-6 py-4">{{ $data->tanggal }}</td>
            <td class="px-6 py-4">{{ $data->jam_masuk }}</td>
            <td class="px-6 py-4">{{ $data->jam_keluar }}</td>
            <td class="px-6 py-4 flex gap-2">
              <!-- Edit Button -->
              <a href="{{ route('admin.presensi.edit', $data->id) }}" 
                 class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-white duration-300 hover:text-yellow-500 
                 hover:border-2 hover:border-yellow-500 border-2 border-white">
                Edit
              </a>

              <!-- Delete Form -->
              <form action="{{ route('presensi.destroy', $data->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" id="delete"
                  class="px-4 py-2 bg-red-500 text-white rounded hover:bg-white duration-300 hover:text-red-500 
                  hover:border-2 hover:border-red-500 border-2 border-white">
                  Delete
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <script>
    document.querySelectorAll('button#delete').forEach((button) => {
      button.addEventListener('click', (e) => {
        if (!window.confirm("Are you sure you want to delete this?")) {
          e.preventDefault();
        }
      });
    });
  </script>
</body>
@endsection
