<html>

<head>
    <title>Admin Dashboard</title>
</head>

<body>
    <nav>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf

            <x-responsive-nav-link :href="route('admin.logout')"
                onclick="event.preventDefault();
                    this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
    </nav>
    <header>
        {{--  --}}
        <h1>Admin Dashboard</h1>

    </header>
    <main>
        {{--  --}}
    </main>
    <footer>
        {{--  --}}
    </footer>
</body>

</html>
