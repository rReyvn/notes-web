@if (session()->has('success'))
    <!-- BUG: Alert doesn't show up anymore after close automatically -->
    <div role="alert" x-data="{ showAlert: true }" x-show="showAlert" x-init="setTimeout(() => showAlert = false, 3000)" x-transition
        class="fixed z-50 bottom-4 right-4 rounded-xl border border-neutral-100 bg-white p-4 dark:border-neutral-800 dark:bg-neutral-900">
        <div class="flex items-start gap-4">
            <span class="text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </span>

            <div class="flex-1">
                <strong class="block font-medium text-neutral-900 dark:text-white">
                    {{ session('success.title') }}
                </strong>

                <p class="mt-1 text-sm text-neutral-700 dark:text-neutral-200">
                    {{ session('success.message') }}
                </p>
            </div>

            <button x-on:click="showAlert = false"
                class="text-neutral-500 transition hover:text-neutral-600 dark:text-neutral-400 dark:hover:text-neutral-500">

                <x-svg.x-mark class="size-6" />
            </button>
        </div>
    </div>
@endif
