<div class="mt-8 lg:mt-16 mb-12">
    <!-- Responsive grid with two columns -->
    <div class="grid grid-cols-1 lg:grid-cols-2  gap-6 lg:gap-10">

        <!-- Left Image Section -->
        <div class="relative flex flex-col sm:flex-row lg:flex-col items-center lg:items-start gap-6">
            <img src="/images/app-1.jpg" alt="Nurse and patient"
                class="w-full sm:w-1/2 lg:w-auto rounded-3xl max-w-sm" />
            <img src="/images/app-2.jpg" alt="Nurse and patient"
                class="w-full sm:w-1/2 lg:w-auto rounded-3xl max-w-sm lg:absolute lg:top-[345px] lg:left-[170px] lg:z-30 hidden sm:block" />
        </div>

        <!-- Right Form Section -->
        <div class="bg-white  sm:p-8 rounded-2xl ">
            <!-- Heading -->
            <div class="flex flex-col gap-4 sm:gap-6 justify-center items-start mb-8">
                <span class="inline-block px-3 lg:px-4 md:px-3 py-1 text-[10px] md:text-[8px] lg:text-[13px] font-medium text-gray-500 bg-[#f5f4f0] rounded-full w-fit">
                    Appointment
                </span>
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl text-gray-900 leading-tight">
                    Embracing Elegance in Healthcare
                </h1>
            </div>

            <form action="{{ route('appointments.store') }}" method="POST" class="space-y-4">
                @csrf
                <!-- Name -->
                <div class="flex flex-col gap-2">
                    <label for="name" class="text-[10px] md:text-xs lg:text-sm font-medium text-gray-700">Your Name *</label>
                    <input type="text" id="name" name="name" required
                        class="w-full py-1 px-2 text-[10px] md:text-xs lg:text-sm lg:p-3 border bg-[#fcf9f8] border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="John Doe">
                </div>

                <!-- Phone + Email -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-2">
                        <label for="phone" class="text-[10px] md:text-xs lg:text-sm  font-medium text-gray-700">Phone *</label>
                        <input type="tel" id="phone" name="phone" required
                            class="w-full py-1 px-2 text-[10px] md:text-xs lg:text-sm lg:p-3 border bg-[#fcf9f8] border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="+1 (234) 567 890">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="email" class="text-[10px] md:text-xs lg:text-sm font-medium text-gray-700">Email *</label>
                        <input type="email" id="email" name="email" required
                            class="w-full py-1 px-2 text-[10px] md:text-xs lg:text-sm lg:p-3 border bg-[#fcf9f8] border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="example@mail.com">
                    </div>
                </div>

                <!-- Date + Service -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-2">
                        <label for="date" class="text-[10px] md:text-xs lg:text-sm font-medium text-gray-700">Date *</label>
                        <input type="date" id="date" name="date" required
                            pattern="\d{4}-\d{2}-\d{2}"
                            class="w-full py-1 px-2 text-[10px] md:text-xs lg:text-sm lg:p-3 border bg-[#fcf9f8] border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">

                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="service" class="text-[10px] md:text-xs lg:text-sm font-medium text-gray-700">Service *</label>
                        <select id="service" name="service" required
                            class="w-full py-1 px-2 text-[10px] md:text-xs lg:text-sm lg:p-3 border bg-[#fcf9f8] border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="" disabled selected>Select Service</option>
                            <option value="service1">Service 1</option>
                            <option value="service2">Service 2</option>
                        </select>
                    </div>
                </div>

                <!-- Message -->
                <div class="flex flex-col gap-2">
                    <label for="message" class="text-[10px] md:text-xs lg:text-sm font-medium text-gray-700">Message</label>
                    <textarea id="message" name="message" rows="4"
                        class="w-full py-1 px-2 text-[10px] md:text-xs lg:text-sm lg:p-3 border bg-[#fcf9f8] border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Hello there!"></textarea>
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="px-4 py-2 md:px-6 md:py-3 rounded-full bg-indigo-200 font-medium hover:bg-[#f5f4f0] text-[10px] lg:text-sm transition-colors duration-700 ease-in-out w-fit">
                    Make Appointment
                </button>
            </form>
        </div>
    </div>
</div>