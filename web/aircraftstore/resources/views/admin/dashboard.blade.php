<x-app-layout>
    <x-slot name="header">
        <div class="container mx-auto bg-gray-900 text-white p-9 rounded-xl">
            {{-- header --}}
            <div class="text-white">
                <h1 class="text-3xl text-center my-3">Welcome to</h1>
                <h1 class="text-5xl text-center my-3"> <strong>Airforce</strong> Store</h1>
            </div>
        </div>
    </x-slot>
    .
    <div class="container mx-auto w-[799px] bg-gray-900 text-white p-9 rounded-xl mb-11 mt-0">
        <h1 class="text-white">Dashboard Admin</h1>
            </a> --}}
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf

            <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                                    this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
    </div>
    </div>

</x-app-layout>
