<x-guest-layout>
    {{-- Everything inside this tag becomes the $slot in the guest-layout --}}

    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold mb-6">Welcome to the Storefront!</h1>

            {{-- This is where your product grid, hero image, and main store content go --}}
            <p>This content is injected below the header defined in header-tienda.</p>
        </div>
    </main>

</x-guest-layout>
