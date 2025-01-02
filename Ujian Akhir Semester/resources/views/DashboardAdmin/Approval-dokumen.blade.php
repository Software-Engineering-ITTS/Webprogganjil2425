<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Dokumen</title>
    <link rel="icon" href="{{ URL('Image/Logo A putih.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
</head>

<body>
    <header class="bg-cyan-900 text-white p-4">
        <div class="w-full px-6">
            <nav class="flex items-center justify-between h-16">
                <div class="flex items-center space-x-10">
                    <h1 class="text-white text-xl font-bold">Manajemen Dokumen</h1>

                    <div class="hidden md:flex space-x-6">
                        <a href="/dashboardadmin"
                            class="text-white hover:text-gray-300 transition-colors flex items-center px-6">
                            <i class="fa-solid fa-home mr-2"></i>
                            Dashboard
                        </a>
                        <a href="/approval"
                            class="text-white hover:text-gray-300 transition-colors flex items-center px-6">
                            <i class="fa-solid fa-file-circle-check mr-2"></i>
                            Approval Dokumen
                        </a>
                    </div>
                </div>

                <div class="flex items-center">
                    <form action="/logout" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="text-white hover:text-gray-300 transition-colors flex items-center">
                            <i class="fa-solid fa-right-from-bracket mr-2"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto mt-5">
        <div class="bg-white shadow-md rounded-lg p-4">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 text-left text-gray-700">Nama Dokumen</th>
                        <th class="py-2 px-4 text-left text-gray-700">File</th>
                        <th class="py-2 px-4 text-left text-gray-700">Deskripsi</th>
                        <th class="py-2 px-4 text-left text-gray-700">Tanggal Unggah</th>
                        <th class="py-2 px-4 text-left text-gray-700">Status</th>
                        <th class="py-2 px-4 text-left text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody id="approvalTableBody">
                    <!-- Table content will be dynamically populated -->
                </tbody>
            </table>
        </div>
    </main>

    <footer class="bg-gray-800 text-white text-center p-4 mt-5">
        <p>&copy; 2024 Manajemen Dokumen. Semua hak dilindungi.</p>
    </footer>

    <script src="https://kit.fontawesome.com/cfcba85111.js" crossorigin="anonymous"></script>
    <script>
        function loadPendingDocuments() {
            fetch('/api/pending-documents')
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('approvalTableBody');
                    tableBody.innerHTML = '';

                    if (data.success) {
                        data.documents.forEach(doc => {
                            const row = document.createElement('tr');
                            row.className = 'border-t hover:bg-gray-50';
                            row.innerHTML = `
                                <td class="py-2 px-4">${doc.title}</td>
                                <td class="py-2 px-4">${doc.fileName}</td>
                                <td class="py-2 px-4">${doc.description}</td>
                                <td class="py-2 px-4">${doc.uploadDate}</td>
                                <td class="py-2 px-4">
                                    <span class="px-2 py-1 rounded-full text-sm ${getStatusClass(doc.status)}">
                                        ${doc.status}
                                    </span>
                                </td>
                                <td class="py-2 px-4">
                                    <div class="flex space-x-2">
                                        <button onclick="approveDocument(${doc.id})" class="text-green-600 hover:text-green-800">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button onclick="rejectDocument(${doc.id})" class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            `;
                            tableBody.appendChild(row);
                        });
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function approveDocument(id) {
            if (confirm('Apakah Anda yakin ingin menyetujui dokumen ini?')) {
                fetch(`/api/approve-document/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                }).then(() => loadPendingDocuments());
            }
        }

        function rejectDocument(id) {
            if (confirm('Apakah Anda yakin ingin menolak dokumen ini?')) {
                fetch(`/api/reject-document/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                }).then(() => loadPendingDocuments());
            }
        }

        function getStatusClass(status) {
            switch (status) {
                case 'Approved':
                    return 'bg-green-100 text-green-800';
                case 'Rejected':
                    return 'bg-red-100 text-red-800';
                case 'Pending':
                    return 'bg-yellow-100 text-yellow-800';
                default:
                    return 'bg-gray-100 text-gray-800';
            }
        }

        document.addEventListener('DOMContentLoaded', loadPendingDocuments);
    </script>
</body>

</html>
