@include('layouts.sidebaranggota')

<main class="ml-64 p-6 mt-5">
    <h1 class="font-semibold uppercase text-3xl mb-5">Profile {{ $users->username }}</h1>
    <form action="" class="flex flex-col w-2/5">
        <div class="mb-5">
            <img class="w-[50%] h-[50%] border rounded-3xl" src="{{ asset('storage/' . $users->image) }}" alt="">
        </div>
        <div class="space-y-3 grid grid-cols-2">
            <div>
                <label for="" class="font-semibold">Username</label>
                <input type="text"
                    class="w-48 block p-2 mt-1 rounded-lg border disabled:bg-gray-200 disabled:cursor-not-allowed"
                    value="{{ $users->username }}" disabled>
            </div>
            <div>
                <label for="" class="font-semibold">Tanggal Lahir</label>
                <input type="date"
                    class="w-48 block p-2 mt-1 rounded-lg disabled:bg-gray-200 disabled:cursor-not-allowed"
                    value="{{ $users->tanggal_lahir }}" disabled>
            </div>
            <div>
                <label for="" class="font-semibold">Gender</label>
                <div class="p-4">
                    <input type="radio" name="gender" id="gender" value="Laki - Laki"
                        class="p-2 disabled:cursor-not-allowed" disabled
                        {{ $users->gender == 'Laki - Laki' ? 'checked' : '' }}>
                    <label for="" class="me-3">Laki - Laki</label>
                    <input type="radio" name="gender" id="gender" value="Perempuan"
                        class="p-2 disabled:cursor-not-allowed" disabled
                        {{ $users->gender == 'Perempuan' ? 'checked' : '' }}>
                    <label for="">Perempuan</label>
                </div>
            </div>
            <div>
                <label for="" class="font-semibold">Email</label>
                <input type="email"
                    class="w-48 block p-2 mt-1 rounded-lg border disabled:bg-gray-200 disabled:cursor-not-allowed"
                    value="{{ $users->email }}" disabled>
            </div>
            <div>
                <label for="" class="font-semibold">Telepon</label>
                <input type="text"
                    class="w-48 block p-2 mt-1 rounded-lg border disabled:bg-gray-200 disabled:cursor-not-allowed"
                    value="{{ $users->telepon }}" disabled>
            </div>
            <div>
                <label for="" class="font-semibold">Role</label>
                <input type="text"
                    class="w-48 block p-2 mt-1 rounded-lg border uppercase disabled:bg-gray-200 disabled:cursor-not-allowed"
                    value="{{ $users->role }}" disabled>
            </div>
        </div>
    </form>
</main>
