<nav class="hidden md:flex h-screen flex-col justify-between">
    <div class="my-auto px-2">
        <ul class="space-y-8">
            <li>
                <x-colorscheme-switcher
                    class="group relative flex justify-center rounded-full p-2 hover:bg-neutral-400/50">
                    <span
                        class="invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded bg-neutral-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                        Colorscheme
                    </span>
                </x-colorscheme-switcher>
            </li>

            <li>
                <a href="#" class="group relative flex justify-center rounded-full p-2 hover:bg-neutral-400/50">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-5 opacity-75">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                    </svg>

                    <span
                        class="z-50 invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded bg-neutral-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                        Placeholder
                    </span>
                </a>
            </li>
        </ul>
    </div>
</nav>
