<div class="swiper relative">
    <div class="swiper-wrapper">
        {{ $slot }}
    </div>

    <div class="swiper-button-prev absolute top-0 bottom-0 left-4 z-10 flex items-center">
        <a href="javascript:void(0)" class="transition duration-300 ease-in-out bg-black/50 hover:bg-black/50 p-2 rounded">
            <x-phosphor-arrow-left class="w-6 h-6 text-white" />
        </a>
    </div>
    <div class="swiper-button-next absolute top-0 bottom-0 right-4 z-10 flex items-center">
        <a href="javascript:void(0)" class="transition duration-300 ease-in-out bg-black/50 hover:bg-black/75 p-2 rounded">
            <x-phosphor-arrow-right class="w-6 h-6 text-white" />
        </a>
    </div>

    <div class="swiper-pagination"></div>

    <script defer type="module">
        const swiper = new Swiper('.swiper', {
            loop: true,
            grabCursor: true,
            modules: [ Swiper.Navigation, Swiper.Pagination ],
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
        });
    </script>
</div>
