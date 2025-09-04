<header class="shadow-sm bg-white border-b border-gray-200">
    <div class="w-[85%] mx-auto flex justify-between items-center py-3 lg:py-6 ">

        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <a href="/"><img src="/images/logo.png" alt="Logo" class="h-8 lg:h-12"></a>
        </div>



        <!-- Desktop Menu -->
        <nav class="hidden lg:flex space-x-8 items-center">
            <a href="/" class="text-[#0C0C0C85] text-sm hover:text-gray-700 font-medium">Home</a>
            <a href="about" class="text-[#0C0C0C85] text-sm hover:text-gray-700 font-medium">About</a>

            <!-- Services Dropdown -->
            <div class="relative group" id="servicesDropdown">
                <a href="services" class="text-[#0C0C0C85] text-sm hover:text-gray-700 font-medium">
                    Services
                </a>
            </div>
            <a href="appointment" class="text-[#0C0C0C85] text-sm hover:text-gray-700 font-medium">Appointment</a>
            <a href="faqs" class="text-[#0C0C0C85] text-sm hover:text-gray-700 font-medium">Faqs</a>
            <a href="pricing" class="text-[#0C0C0C85] text-sm hover:text-gray-700 font-medium">Pricing</a>
            <!-- Pages Dropdown -->
            <!-- <div class="relative group" id="pagesDropdown">
                <button class="text-[#0C0C0C85] hover:text-gray-700 text-sm flex items-center group">
                    Pages
                    <svg class="w-4 h-4 ml-1 text-[#c4cffa] group-hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="pagesMenu"
                    class="dropdown absolute left-0 mt-2 w-40 bg-[#f5f4f0] rounded-lg shadow-lg p-4 z-10">
                    <a href="appointment" class="block px-4 py-2 text-[#0C0C0C85] hover:text-gray-700  rounded text-xs">Appointment</a>

                    <a href="faqs" class="block px-4 py-2 text-[#0C0C0C85] hover:text-gray-700 rounded text-sm">FAQs</a>
                    <a href="pricing" class="block px-4 py-2 text-[#0C0C0C85] hover:text-gray-700 rounded text-sm">Pricing</a>
                </div>
            </div> -->

            <a href="contact" class="text-[#0C0C0C85] hover:text-black text-sm font-medium">Contact</a>
        </nav>

        <!-- Right Buttons -->
        <div class="hidden lg:flex items-center space-x-4">
            <a href="#" class="flex items-center gap-2 text-sm group">
                <i class="fa-solid fa-phone text-[#c4cffa] group-hover:text-black"></i>
                <span class="text-[#0C0C0C85] group-hover:text-gray-700">Call Us</span>
            </a>

            <a href="register"
                class="bg-black hover:bg-[#f5f4f0] text-white hover:text-black px-4 py-2 rounded-full text-sm transition-colors duration-700 ease-in-out">
                Register
            </a>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobileMenuBtn" class="lg:hidden text-2xl">
            ☰
        </button>
    </div>

    <!-- Mobile Sidebar Menu -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden"></div>
    <!-- Mobile Menu -->
    <div id="mobileMenu"
        class="fixed top-0 left-0 h-full w-72 bg-white shadow-2xl transform -translate-x-full transition-transform duration-300 ease-in-out md:hidden z-50 overflow-y-auto">

        <!-- Header -->
        <!-- Close Button -->
        <div class="flex justify-end px-6 py-4 border-b border-gray-200">
            <button id="closeMenu" class="text-gray-500 hover:text-gray-800 text-2xl transition duration-200">✕</button>
        </div>

        <!-- Links -->
        <div class="space-y-2 flex flex-col items-center text-center  min-h-screen py-6">
            <a href="/" class="block py-2 text-gray-500 hover:text-gray-900 hover:font-medium transition">Home</a>
            <a href="about" class="block py-2 text-gray-500 hover:text-gray-900 hover:font-medium transition">About</a>
            <a href="services" class="block py-2 text-gray-500 hover:text-gray-900 hover:font-medium transition">Services</a>
            <a href="appointment" class="block py-2 text-gray-500 hover:text-gray-900 hover:font-medium transition">Appointment</a>
            <a href="faqs" class="block py-2 text-gray-500 hover:text-gray-900 hover:font-medium transition">FAQs</a>
            <a href="pricing" class="block py-2 text-gray-500 hover:text-gray-900 hover:font-medium transition">Pricing</a>
            <a href="contact" class="block py-2 text-gray-500 hover:text-gray-900 hover:font-medium transition">Contact</a>

            <!-- CTA Button -->
            <a href="register" class="mt-6 bg-black hover:bg-indigo-700 border rounded-full text-white px-8 py-2 text-sm transition-colors duration-500 ease-in-out">
                Register
            </a>
            <a href="appointment" class="mt-6 bg-black hover:bg-indigo-700 border rounded-full text-white px-8 py-2 text-sm transition-colors duration-500 ease-in-out">
                Book Appointment
            </a>

        </div>



    </div>

</header>

<!-- Styles -->
<style>
    .dropdown {
        transition: opacity 0.3s ease, transform 0.3s ease;
        opacity: 0;
        transform: translateY(10px);
        pointer-events: none;
    }

    .dropdown.show {
        opacity: 1;
        transform: translateY(0px);
        pointer-events: auto;
    }
</style>

<script>
    // Mobile Sidebar Toggle
    const mobileBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const closeMenu = document.getElementById('closeMenu');
    const overlay = document.getElementById('overlay');

    mobileBtn.addEventListener('click', () => {
        mobileMenu.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
    });

    closeMenu.addEventListener('click', () => {
        mobileMenu.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    });

    overlay.addEventListener('click', () => {
        mobileMenu.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    });

    // Dropdown hover for desktop
    function setupDropdown(dropdownId, menuId) {
        const dropdownParent = document.getElementById(dropdownId);
        const dropdownMenu = document.getElementById(menuId);
        let showTimer, hideTimer;

        dropdownParent.addEventListener('mouseenter', () => {
            clearTimeout(hideTimer);
            showTimer = setTimeout(() => {
                dropdownMenu.classList.add('show');
            }, 0); // no delay
        });

        dropdownParent.addEventListener('mouseleave', () => {
            clearTimeout(showTimer);
            hideTimer = setTimeout(() => {
                dropdownMenu.classList.remove('show');
            }, 100);
        });
    }

    setupDropdown('servicesDropdown', 'servicesMenu');
    setupDropdown('pagesDropdown', 'pagesMenu');
</script>