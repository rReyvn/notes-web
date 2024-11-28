<div class="relative">
    <!-- TODO: Change border color when search active -->
    <input type="search"
        {{ $attributes->merge(['class' => 'w-full rounded-md border-neutral-200 py-2.5 pe-10 shadow-sm sm:text-sm dark:border-neutral-700 dark:bg-neutral-800 dark:text-white']) }}
        class="w-full rounded-md border-neutral-200 py-2.5 pe-10 shadow-sm sm:text-sm dark:border-neutral-700 dark:bg-neutral-800 dark:text-white focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600" />

    <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
        <button type="button"
            class="text-neutral-600 hover:text-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300">
            <x-svg.search class="size-4" />
        </button>
    </span>
</div>
