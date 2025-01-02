<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Documents</title>
    <link rel="icon" href="{{ URL('Image/Logo A putih.png') }}">
    @vite('resources/css/app.css')
</head>

<body>
    <header class="bg-cyan-900 text-white p-4">
        <div class="w-full px-6">
            <!-- Main Navigation Bar -->
            <nav class="flex items-center justify-between h-16">
                <!-- Logo and Navigation Links Container -->
                <div class="flex items-center space-x-10">
                    <!-- Logo/Title -->
                    <h1 class="text-white text-xl font-bold">Manajemen Dokumen</h1>

                    <!-- Navigation Links with less spacing -->
                    <div class="hidden md:flex space-x-6">
                        <a href="/dashboardstaff"
                            class="text-white hover:text-gray-300 transition-colors flex items-center px-6">
                            <i class="fa-solid fa-home mr-2"></i>
                            Dashboard
                        </a>
                    </div>
                </div>

                <div class="flex items-center">
                    <form action="/logout" method="POST" class="m-0">
                        @csrf
                        <button type="submit"
                            class="text-white hover:text-gray-300 transition-colors flex items-center">
                            <i class="fa-solid fa-right-from-bracket mr-2"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </nav>
    </header>

    <main class="container mx-auto mt-5">
        <div class="flex justify-normal mb-4">
            <form id="uploadForm" action="/dashboardstaff/store" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" id="fileInput" name="File_path" class="hidden">
                <input type="text" id="titleInput" name="title" class="hidden">
                <input type="text" id="descriptionInput" name="description" class="hidden">
            </form>

            <!-- Dropdown Button -->
            <div class="relative inline-block text-left">
                <button id="dropdownButton"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-green border border-green-500 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Unggah Dokumen
                </button>

                <!-- Dropdown Menu -->
                <div id="dropdownMenu"
                    class="hidden absolute left-0 mt-2 w-72 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
                    <div class="py-1">
                        <a href="#" onclick="openUploadDialog()"
                            class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i data-feather="upload" class="mr-3 h-5 w-5"></i>
                            <span class="flex-grow">Upload file</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upload Dialog -->
        <div id="uploadDialog" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-6 rounded-lg shadow-xl">
                <h2 class="text-xl font-bold mb-4">Unggah Dokumen</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Judul Dokumen</label>
                        <input type="text" id="dialogTitle"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea id="dialogDescription" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">File</label>
                        <input type="file" id="dialogFile" class="mt-1 block w-full">
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button onclick="closeUploadDialog()" class="px-4 py-2 bg-gray-300 rounded-md">Batal</button>
                        <button onclick="submitDocument()"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md">Unggah</button>
                    </div>
                </div>
            </div>
        </div>

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
                <tbody id="documentTableBody">

                </tbody>
            </table>
        </div>
    </main>

    <footer class="bg-gray-800 text-white text-center p-4 mt-5">
        <p>&copy; 2024 Manajemen Dokumen. Semua hak dilindungi.</p>
    </footer>

    <script src="https://kit.fontawesome.com/cfcba85111.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>

    <script>
        feather.replace();
        let documents = [];

        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');
        const uploadDialog = document.getElementById('uploadDialog');

        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', (event) => {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });

        function openUploadDialog() {
            uploadDialog.classList.remove('hidden');
            dropdownMenu.classList.add('hidden');
        }

        function closeUploadDialog() {
            uploadDialog.classList.add('hidden');
            document.getElementById('dialogTitle').value = '';
            document.getElementById('dialogDescription').value = '';
            document.getElementById('dialogFile').value = '';
        }

        function submitDocument() {
            const title = document.getElementById('dialogTitle').value;
            const description = document.getElementById('dialogDescription').value;
            const fileInput = document.getElementById('dialogFile');
            const file = fileInput.files[0];
            const form = document.getElementById('uploadForm');
            const fileField = document.getElementById('fileInput');
            fileField.files = fileInput.files;

            if (!title || !description || !file) {
                alert('Mohon lengkapi semua field');
                return;
            }

            const newDocument = {
                id: Date.now(),
                title: title,
                fileName: file.name,
                description: description,
                uploadDate: new Date().toLocaleDateString('id-ID'),
                status: 'Pending'
            };

            documents.push(newDocument);
            updateDocumentTable();
            closeUploadDialog();

            const formData = new FormData(form);
            formData.append('title', title);
            formData.append('description', description);
            formData.append('file', file);
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

            fetch('/dashboardadmin/store', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const newDocument = {
                            id: data.documentId,
                            title: title,
                            fileName: file.name,
                            description: description,
                            uploadDate: new Date().toLocaleDateString('id-ID'),
                            status: 'Pending'
                        };

                        documents.push(newDocument);
                        updateDocumentTable();

                        // Dispatch custom event for approval page
                        const documentUploadedEvent = new CustomEvent('documentUploaded', {
                            detail: newDocument
                        });
                        window.dispatchEvent(documentUploadedEvent);

                        // Show success message
                        alert('Dokumen berhasil diunggah dan menunggu persetujuan');
                        closeUploadDialog();
                    } else {
                        alert('Gagal mengunggah dokumen: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan');
                });

        }

        function updateDocumentTable() {
            const tableBody = document.getElementById('documentTableBody');
            tableBody.innerHTML = '';

            documents.forEach(doc => {
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
                    ${doc.status !== 'Pending' ? `
                            <button onclick="downloadDocument(${doc.id})" 
                                    class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-download"></i>
                            </button>
                            <button onclick="deleteDocument(${doc.id})" 
                                    class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i>
                            </button>
                        ` : '<span class="text-yellow-600">Menunggu persetujuan</span>'}
                </div>
                </td>
            `;

                tableBody.appendChild(row);
            });
        }

        function getStatusClass(status) {
            switch (status.toLowerCase()) {
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

        function deleteDocument(docId) {
            if (confirm('Apakah Anda yakin ingin menghapus dokumen ini?')) {
                documents = documents.filter(doc => doc.id !== docId);
                updateDocumentTable();
            }
        }

        function downloadDocument(docId) {
            const document = documents.find(doc => doc.id === docId);
            if (document) {
                alert(`Downloading ${document.fileName}...`);
            }
        }
    </script>
</body>

</html>
