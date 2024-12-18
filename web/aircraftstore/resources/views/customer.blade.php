<x-app-layout>
    <x-slot name="header">
        <div class="container mx-auto bg-gray-900 text-white p-9 rounded-xl">
            {{-- header --}}
            <div class="text-white my-5">
                <h1 class="text-3xl text-center">Customer Register</h1>
            </div>
        </div>
    </x-slot>

    <div class="container mx-auto bg-gray-900 text-white p-9 rounded-xl">
        <form action="">
            <div class="my-5">
                <label for="fullname" class="block">Full Name</label>
                <input type="text" name="fullname" id="fullname" class="rounded-md w-full text-black">
            </div>
            <div class="my-5">
                <label for="phone_number" class="block">Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" class="rounded-md w-full text-black">
            </div>
            <div class="my-5">
                <label for="address" class="block">Address</label>
                <input type="text" name="address" id="address" class="rounded-md w-full text-black">
            </div>
            <div class="my-5">
                <label for="  city" class="block">City</label>
                <input type="text" name="  city" id="  city" class="rounded-md w-full text-black">
            </div>
            <div class="my-5">
                <label for="  province" class="block"> Province</label>
                <input type="text" name="  province" id="  province" class="rounded-md w-full text-black">
            </div>
            <div class="my-5">
                <label for="  country" class="block"> Country</label>
                <input type="text" name="  country" id="  country" class="rounded-md w-full text-black">
            </div>
            <div class="my-5">
                <label for="  postal_code" class="block">Postal Code</label>
                <input type="text" name="  postal_code" id="  postal_code" class="rounded-md w-full text-black">
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-black p-2 rounded-md font-bold hover:bg-gray-500">Submit</button>
            </div>
        </form>
    </div>


</x-app-layout>
