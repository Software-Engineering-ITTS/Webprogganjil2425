<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengembalian buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
body {
    background-color: #f8f9fa; 
}

.container {
    background-color: #ffffff; 
    border: 2px solid #ffc107; 
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
}

h1 {
    color: #ffc107; 
    font-weight: bold;
}

.form-label {
    color: #343a40; 
    font-weight: bold;
}

.form-control {
    border: 1px solid #343a40; 
    border-radius: 5px;
}

.form-control:focus {
    border-color: #ffc107; 
    box-shadow: 0 0 5px rgba(255, 193, 7, 0.5); 
}

.btn-primary {
    background-color: #343a40; 
    border-color: #343a40; 
    color: #ffffff; 
    font-weight: bold;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #ffc107; 
    border-color: #ffc107; 
    color: #343a40; 
}
    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">Pengembalian</h1>
        <form action="{{ route('returns.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="loan_id" class="form-label">Nama buku</label>
                <input type="text" id="loan_id" name="loan_id" class="form-control">
            </div>
            <div class="mb-3">
                <label for="return_date" class="form-label">Tanggal Pengembalian</label>
                <input type="date" id="return_date" name="return_date" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Done</button>
        </form>
    </div>
</body>
</html>
