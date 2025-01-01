<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Kegiatan</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($pendaftaran) && $pendaftaran->isNotEmpty())
            @foreach ($pendaftaran as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->activity->name ?? 'Tidak ada kegiatan' }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3">Data tidak ditemukan</td>
            </tr>
        @endif
    </tbody>
</table>
