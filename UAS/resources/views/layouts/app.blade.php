<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Billing System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       :root {
    --bg-primary: #0a0814;
    --bg-secondary: #110d1c;
    --bg-card: #15101f;
    --bg-card-header: #1b1528;
    --bg-table-row: #1d172b;
    --bg-table-row-alt: #1a1528;
    --text-primary: #f1f5f9;
    --text-secondary: #9ca3af;
    --border-color: #2d2640;

    /* Button */
    --btn-primary: #2c2446;
    --btn-primary-hover: #372b57;
    --btn-edit: #2c2446;
    --btn-edit-hover: #372b57;
    --btn-view: #2c2446;
    --btn-view-hover: #372b57;
    --btn-danger: #111111;
    --btn-danger-hover: #1a1a1a;
    --btn-add: #2c2446;
    --btn-add-hover: #372b57;
}

label {
    color: var(--text-primary);
}

body {
    background-color: var(--bg-primary);
    color: var(--text-primary);
    min-height: 100vh;
}

.navbar {
    background-color: var(--bg-secondary) !important;
    border-bottom: 1px solid var(--border-color);
    padding: 1rem 0;
}

.navbar-brand {
    color: var(--text-primary) !important;
    font-weight: 600;
}

.card {
    background-color: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: 0.75rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.card-header {
    background-color: var(--bg-card-header) !important;
    border-bottom: 1px solid var(--border-color);
    padding: 1.5rem;
}

.card-header h1 {
    color: var(--text-primary);
    font-size: 1.5rem;
    margin: 0;
    font-weight: 600;
}

.card-body {
    padding: 1.5rem;
    background-color: var(--bg-card);
}

.table {
    background-color: var(--bg-card) !important;
    color: var(--text-primary) !important;
    border-color: var(--border-color) !important;
}

.table > :not(caption) > * > * {
    background-color: var(--bg-card) !important;
    color: var(--text-primary) !important;
    border-bottom-color: var(--border-color) !important;
}

.table > thead {
    background-color: var(--bg-card-header) !important;
    border-bottom: 2px solid var(--border-color) !important;
}

.table > thead > tr > th {
    background-color: var(--bg-card-header) !important;
    color: var(--text-secondary) !important;
    font-weight: 600;
    padding: 1rem;
    border-top: none !important;
}

.table-striped > tbody > tr:nth-of-type(odd) {
    background-color: var(--bg-table-row) !important;
}

.table-striped > tbody > tr:nth-of-type(even) {
    background-color: var(--bg-table-row-alt) !important;
}

.table > tbody > tr:hover {
    background-color: rgba(124, 58, 237, 0.1) !important;
}

.table > tbody > tr > td {
    border-color: var(--border-color) !important;
    padding: 1rem;
    vertical-align: middle;
    background-color: inherit !important;
}

/* buttons */
.btn {
    padding: 0.4rem 0.8rem;
    font-size: 0.875rem;
    border-radius: 0.375rem;
    transition: all 0.2s ease;
    border: 1px solid var(--border-color);
    color: var(--text-primary) !important;
}

.btn-primary {
    background-color: var(--btn-primary) !important;
    border-color: var(--border-color) !important;
}

.btn-primary:hover {
    background-color: var(--btn-primary-hover) !important;
}

.btn-edit {
    background-color: var(--btn-edit) !important;
    border-color: var(--border-color) !important;
}

.btn-edit:hover {
    background-color: var(--btn-edit-hover) !important;
}

.btn-view {
    background-color: var(--btn-view) !important;
    border-color: var(--border-color) !important;
}

.btn-view:hover {
    background-color: var(--btn-view-hover) !important;
}

.btn-success, .btn-add {
    background-color: var(--btn-add) !important;
    border-color: var(--border-color) !important;
    margin-bottom: 1.5rem;
}

.btn-success:hover, .btn-add:hover {
    background-color: var(--btn-add-hover) !important;
}

.btn-danger {
    background-color: var(--btn-danger) !important;
    border-color: var(--border-color) !important;
}

.btn-danger:hover {
    background-color: var(--btn-danger-hover) !important;
}

form {
    display: inline-block;
}

/* dropdown */
select.form-select,
.form-select,
select,
select option,
.form-select option {
    background: var(--bg-card-header) !important;
    background-color: var(--bg-card-header) !important;
    color: var(--text-primary) !important;
    -webkit-appearance: none !important;
    -moz-appearance: none !important;
    appearance: none !important;
   background: var(--bg-card-header) !important;
}

    </style>
</head>
<body class="@yield('body-class', '')">
    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Pinjol Uhuy</a>
            <div class="container ms-1 d-flex justify-content-end align-items-end">
                <a class="btn btn-primary ms-1" href="{{ route('customers.index') }}">Customers</a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger ms-1">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>