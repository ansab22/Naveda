<div class="w-full my-10">
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">

        @for ($i = 1; $i <= 35; $i++)
            <div class="overflow-hidden rounded-xl shadow hover:shadow-xl transition">
                <img src="{{ asset('images/g' . $i . '.jpg') }}"
                     alt="Gallery Image g{{ $i }}"
                     class="w-full h-40 sm:h-48 object-cover hover:scale-110 transition duration-500">
            </div>
        @endfor

    </div>
</div>
