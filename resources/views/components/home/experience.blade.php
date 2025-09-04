<div class="lg:py-16">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Item 1 -->
        <div class="bg-[#f6f6f6] shadow-sm rounded-2xl p-6 md:p-8 text-center lg:text-left">
            <h2 class="text-[38px] lg:text-6xl font-light text-gray-900"
                x-data="counter(35)" x-init="start()"
                x-text="display + '+'"></h2>
            <h3 class="mt-[30px] text-[18px] lg:mt-[124px] lg:text-[24px] font-light text-gray-800">Years of Experience</h3>
            <p class="mt-1 text-xs md:text-base text-[#696969] ">Lorem ipsum dolor sit amet, consec tetur adipiscing.</p>
        </div>

        <!-- Item 2 -->
        <div class="bg-[#f6f6f6] shadow-sm rounded-2xl p-6 md:p-8 text-center lg:text-left">
            <h2 class="text-[38px] lg:text-6xl font-light text-gray-900"
                x-data="counter(140)" x-init="start()"
                x-text="display"></h2>
            <h3 class="mt-[30px] text-[18px] lg:mt-[124px] lg:text-[24px] font-light text-gray-800">Professional Staffs</h3>
            <p class="mt-1 text-xs md:text-base text-[#696969] ">Lorem ipsum dolor sit amet, consec tetur adipiscing.</p>
        </div>

        <!-- Item 3 -->
        <div class="bg-[#f6f6f6] shadow-sm rounded-2xl p-6 md:p-8 text-center lg:text-left">
            <h2 class="text-[38px] lg:text-6xl font-light text-gray-900"
                x-data="counter(6)" x-init="start()"
                x-text="display + '.2K+'"></h2>
            <h3 class="mt-[30px] text-[18px] lg:mt-[124px] lg:text-[24px] font-light text-gray-800">Happy Patients</h3>
            <p class="mt-1 text-xs md:text-base text-[#696969] ">Lorem ipsum dolor sit amet, consec tetur adipiscing.</p>
        </div>

        <!-- Item 4 -->
        <div class="bg-[#f6f6f6] shadow-sm rounded-2xl p-6 md:p-8 text-center lg:text-left">
            <h2 class="text-[38px] lg:text-6xl font-light text-gray-900"
                x-data="counter(99.9, true)" x-init="start()"
                x-text="display + '%'"></h2>
            <h3 class="mt-[30px] text-[18px] lg:mt-[124px] lg:text-[24px] font-light text-gray-800">Positive Reviews</h3>
            <p class="mt-1 text-xs md:text-base text-[#696969] ">Lorem ipsum dolor sit amet, consec tetur adipiscing.</p>
        </div>

    </div>
</div>
<script src="//unpkg.com/alpinejs" defer></script>
<script>
    function counter(target, decimal = false) {
        return {
            display: 0,
            start() {
                let current = 0;
                let step = target / 100; // speed of counting
                let interval = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        current = target;
                        clearInterval(interval);
                    }
                    this.display = decimal ? current.toFixed(1) : Math.floor(current);
                }, 20);
            }
        }
    }
</script>