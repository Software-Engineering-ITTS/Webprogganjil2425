<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
body {
    background-color: #f8f9fa; 
    color: #343a40; 
    font-family: Arial, sans-serif;
}

.container {
    background-color: #e9ecef; 
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #ffc107; 
    font-weight: bold;
}

.form-label {
    font-weight: bold;
    color: #495057; 
}

.form-control {
    border: 2px solid #ced4da; 
    border-radius: 5px;
    transition: border-color 0.3s, box-shadow 0.3s;
}

.form-control:focus {
    border-color: #ffc107; 
    box-shadow: 0px 0px 5px rgba(255, 193, 7, 0.5);
}

.btn-primary {
    background-color: #ffc107; 
    border: none;
    color: #343a40; 
    font-weight: bold;
    transition: background-color 0.3s, transform 0.2s;
}

.btn-primary:hover {
    background-color: #e0a800; 
    transform: scale(1.05);
}

.mb-3 {
    margin-bottom: 20px;
}

button:active {
    transform: scale(0.95);
}

    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">Peminjaman</h1>
        <form action="{{ route('loans.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="borrower_name" class="form-label">Nama buku</label>
                <input type="text" id="borrower_name" name="borrower_name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="borrow_date" class="form-label">Tanggal Pinjam</label>
                <input type="date" id="borrow_date" name="borrow_date" class="form-control">
            </div>
            <div class="mb-3">
                <label for="due_date" class="form-label">Tanggal Jatuh Tempo</label>
                <input type="date" id="due_date" name="due_date" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Done</button>
        </form>
    </div>
</body>
</html>
