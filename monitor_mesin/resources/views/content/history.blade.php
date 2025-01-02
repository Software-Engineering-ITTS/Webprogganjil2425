@extends('home')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-10">
            <div class="relative flex items-center">
                <h1 class="font-medium text-lg text-gray-900 dark:text-white mb-4">Table History</h1>
            </div>
        </div>
    </div>
    <div class="relative overflow-x-auto">
        <table id="search-table">
            <thead>
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Table</th>
                    <th class="px-6 py-3">Action</th>
                    <th class="px-6 py-3">Attribute</th>
                    <th class="px-6 py-3">Old Value</th>
                    <th class="px-6 py-3">New Value</th>
                    <th class="px-6 py-3">Changed By</th>
                    <th class="px-6 py-3">Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($history as $item)
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $item->table }}
                        </td>
                        <td class="px-6 py-4">{{ $item->action }}</td>
                        <td class="px-6 py-4">{{ $item->attribute ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $item->old_value ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $item->new_value ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $item->user->name ?? 'System' }}</td>
                        <td class="px-6 py-4">{{ $item->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script>
        if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#search-table", {
                searchable: true,
                sortable: false
            });
        }
    </script>
@endsection
