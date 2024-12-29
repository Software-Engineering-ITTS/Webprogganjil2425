<x-app-layout>
    <x-slot name="header">
        <div class="container mx-auto bg-gray-900 text-white p-9 rounded-xl">
            {{-- header --}}
            <div class="text-white my-5">
                <h1 class="text-3xl text-center">Our Location</h1>
            </div>
        </div>
    </x-slot>

    <div class="container mx-auto bg-gray-900 text-white p-9 rounded-xl mb-11">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d99598.88336595675!2d-93.64394535535277!3d38.73008798011572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87c3f05b0abeb0a3%3A0xd38015c25b32833!2sWhiteman%20AFB%2C%20Missouri%2C%20Amerika%20Serikat!5e0!3m2!1sid!2sjp!4v1735504445580!5m2!1sid!2sjp"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade" class="w-full"></iframe>
    </div>
    <footer>
        <div class="flex justify-center mb-9">
            <p class="text-white">© iamjustzero</p>
        </div>
    </footer>
</x-app-layout>
