<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-neutral-800 dark:bg-neutral-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-neutral-100 uppercase tracking-widest hover:bg-neutral-700 dark:hover:bg-neutral-700 focus:bg-neutral-700 dark:focus:bg-neutral-700 active:bg-neutral-900 dark:active:bg-neutral-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
