<!-- Video Section -->
<div class="relative mt-[20px] md:mt-[70px] lg:mt-[120px]" x-data="{ open: false, videoSrc: '' }">
    <!-- Thumbnail -->
    <div class="relative">
        <video autoplay muted loop playsinline 
       class="rounded-xl w-full object-cover h-[40vh] md:h-[60vh] lg:h-[80vh]">
    <source src="/images/bg-vedio.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>

        <!-- Play Button -->
        <button @click="open = true; videoSrc='https://www.youtube.com/embed/6ke8LghXias?autoplay=1&mute=0'"
            class="absolute inset-0 flex items-center justify-center">
            <span class="flex items-center justify-center w-16 h-16 rounded-full bg-white shadow-lg">
                <i class="fa-solid fa-play text-black text-xl ml-1"></i>
            </span>
        </button>
    </div>

    <!-- Modal -->
    <template x-if="open">
        <div class="fixed inset-0 flex items-center justify-center bg-black/80 z-50 p-4">
            <div class="relative w-full max-w-5xl bg-black rounded-xl overflow-hidden">
                <!-- Close Button -->
                <button @click="open = false; videoSrc=''"
                    class="absolute top-2 right-2 text-white text-2xl">
                    &times;
                </button>

                <!-- Responsive Video -->
                <div class="w-full aspect-[16/9]">
                    <iframe class="w-full h-full"
                        :src="videoSrc"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </template>
</div>
