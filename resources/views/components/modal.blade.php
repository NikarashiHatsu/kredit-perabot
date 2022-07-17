<div
    x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    x-show="{!! $attributes->get('x-show') !!}"
    x-data="{!! $attributes->get('x-data') !!}"
    x-on:keyup.escape="{{!! $attributes->get('x-show') !!}} = false"
    x-cloak
    class="fixed w-full h-screen flex items-center justify-center top-0 left-0 z-40"
>
    <div
        class="w-full h-full fixed top-0 left-0 bg-black/50 z-40"
        x-on:click="{{!! $attributes->get('x-show') !!}} = false"
    ></div>

    <div
        class="max-w-xl w-full z-50"
        x-on:keyup.escape="{{!! $attributes->get('x-show') !!}} = false"
    >
        <div class="bg-white rounded p-6 w-full relative">
            <div class="top-5 right-5 absolute">
                <a
                    href="javascript:void(0)"
                    x-on:click="{{!! $attributes->get('x-show') !!}} = false"
                >
                    <x-phosphor-x-circle-fill class="w-8 h-8 opacity-50" />
                </a>
            </div>
            <h3 class="text-xl font-bold text-gray-500 text-center mb-6">
                {{ $title }}
            </h3>
            {{ $slot }}
        </div>
    </div>
</div>