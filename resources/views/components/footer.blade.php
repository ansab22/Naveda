<!-- resources/views/components/footer.blade.php -->
<div class="bg-[#cbd9f596] text-gray-800 pt-12 pb-6">
    <div class="w-[85%] mx-auto px-4 sm:px-6 lg:px-8 flex flex-col gap-4">
        <!-- Logo and Tagline -->
        <div class="w-full flex flex-col md:flex-row md:justify-between md:items-center pb-8 border-b border-[#bababa] gap-4">
            <img src="/images/logo.png" alt="" class="w-[14%]">
            <h3 class="text-[16px] md:text-[18px] text-center md:text-right">
                Transforming healthcare through <br class="hidden md:block"> timeless elegance!
            </h3>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col lg:flex-row pb-8 border-b border-[#bababa] mt-5 sm:mt-10 gap-10">
            <!-- Left Section: Links + Address -->
            <div class="flex flex-col sm:flex-row flex-wrap lg:w-[70%] gap-10 sm:gap-16">
                <!-- Explore -->
                <div class="text-center sm:text-left">
                    <h3 class="text-lg font-normal mb-2">Explore</h3>
                    <ul class="space-y-1 text-sm">
                        @foreach (['Home', 'About', 'Services', 'Appointment', 'Blog', 'Team', 'FAQs', 'Contact'] as $item)
                        <li><a href="#" class="hover:text-black">{{ $item }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <!-- Socials -->
                <div class="text-center sm:text-left">
                    <h3 class="text-lg font-normal mb-2">Socials</h3>
                    <ul class="space-y-1 text-sm">
                        @foreach (['Instagram', 'Facebook', 'Youtube', 'LinkedIn'] as $social)
                        <li><a href="#" class="hover:text-black">{{ $social }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <!-- Address & Contact -->
                <div class="text-center sm:text-left">
                    <h3 class="text-lg font-normal mb-2">Address</h3>
                    <p class="text-sm mb-4">7674 Stevie Burg, Raleigh, Wisconsin 38787</p>
                    <h3 class="text-lg font-normal mb-2">Contact</h3>
                    <p class="text-sm">+1 (234) 567 890 00</p>
                    <p class="text-sm">eldera.info@mail.com</p>
                </div>
            </div>

            <!-- Right Section: Newsletter -->
            <div class="lg:w-[30%] flex justify-center lg:justify-end">
                <div class="bg-[#f6f6f6] p-6 rounded-lg shadow-md w-full sm:w-[80%] lg:w-full">
                    <h3 class="text-lg font-light mb-4">Join our newsletter</h3>
                    <form>
                        <div class="mb-4">
                            <label class="block text-sm font-normal mb-1" for="name">Your Name *</label>
                            <input type="text" id="name" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                placeholder="John Doe">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-normal mb-1" for="email">Email *</label>
                            <input type="email" id="email" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                placeholder="example@mail.com">
                        </div>
                        <button type="submit"
                            class="bg-gray-700 text-[12px] text-white px-4 py-2 rounded-2xl hover:bg-gray-900 transition duration-300">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="flex flex-col md:flex-row justify-between items-center mt-10 text-sm text-gray-500 gap-2">
            <p class="text-xs text-black text-center md:text-left">Copyright © {{ now()->year }} ASK Project</p>
            <div class="space-x-4">
                <a href="#" class="text-xs text-black">Privacy Policy</a>
                <a href="#" class="text-xs text-black">Terms & Services</a>
            </div>
        </div>
    </div>
</div>