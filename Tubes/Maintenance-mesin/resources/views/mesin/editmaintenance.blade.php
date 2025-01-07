<form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="mesin_id">Mesin:</label>
        <select name="mesin_id" id="mesin_id">
            @foreach($mesins as $mesin)
                <option value="{{ $mesin->id }}" {{ $jadwal->mesin_id == $mesin->id ? 'selected' : '' }}>
                    {{ $mesin->nama_mesin }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="maintenance_date">Tanggal Maintenance:</label>
        <input type="date" name="maintenance_date" value="{{ $jadwal->maintenance_date }}">
    </div>

    <div>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="Pending" {{ $jadwal->status == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="In Progress" {{ $jadwal->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
            <option value="Completed" {{ $jadwal->status == 'Completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>

    <div>
        <label for="user_id">Teknisi:</label>
        <select name="user_id" id="user_id">
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $jadwal->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="deskripsi_perawatan">Deskripsi Perawatan:</label>
        <textarea name="deskripsi_perawatan">{{ $jadwal->deskripsi_perawatan }}</textarea>
    </div>

    <button type="submit">Update Jadwal</button>
</form>
