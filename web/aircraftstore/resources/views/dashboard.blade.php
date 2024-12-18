<x-app-layout>
    <x-slot name="header">
        <div class="container mx-auto bg-gray-900 text-white p-9 rounded-xl">
            {{-- header --}}
            <div class="text-white my-5">
                <h1 class="text-3xl text-center my-3">Welcome to</h1>
                <h1 class="text-5xl text-center my-3">Airforce Store</h1>
            </div>
        </div>
    </x-slot>
    .
    <div class="container mx-auto w-[799px] bg-gray-900 text-white p-9 rounded-xl">
        <h1 class="text-xl text-center my-3">Why buy Aircraft in Our Store? </h1>
        <p>

        <ul class="list-decimal text-justify">
            <li> <strong>Guaranteed Security and Legality</strong>
                <p>We ensure that all jets sold meet international standards, with complete documentation, guaranteed
                    legality,
                    and compliance with aviation and international trade regulations.</p>
            </li>
            <li> <strong>Expert and Experienced Team</strong>
                <p> Our team of professionals, experienced in the military aviation industry, is ready to provide
                    consultations
                    and help you select the best aircraft for your requirements.</p>
            </li>
            <li><strong>Extensive Selection</strong>
                <p> Our store offers a wide variety of fighter jets, from legacy models to the latest technology,
                    catering to
                    operational, training, or collector needs.</p>
            </li>
            <li><strong>Customization and Upgrade Services </strong>
                <p> We offer options for modifications and technological upgrades tailored to your needs, such as adding
                    weapon
                    systems, avionics, or other custom configurations.</p>
            </li>
            <li><strong>After-Sales Support </strong>
                <p>We offer after-sales services, including training, regular maintenance, and technical support,
                    ensuring you
                    can operate the aircraft optimally.</p>
            </li>
            <li> <strong>Reputation and Trust</strong>
                <p> We are trusted by clients from various countries, including governments,
                    security agencies, and private
                    collectors. Our reputation is a testament to the quality of our services</p>
            </li>
            <li><strong>Global Network </strong>
                <p> With a global network of partners, we have access to manufacturers, spare parts
                    suppliers, and trusted
                    technicians to ensure customer satisfaction.</p>
            </li>
        </ul>
        </p>
        <div class="flex justify-center my-9">
            <button class="bg-black p-2 rounded-md font-bold hover:bg-gray-500">Get Started</button>
        </div>
    </div>

</x-app-layout>
