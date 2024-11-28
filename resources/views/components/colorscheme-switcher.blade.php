<!--
    TODO: - Blinking on dark mode when refresh page using Firefox
          - No transition when toggling colorscheme
 -->
<div x-on:click="toggleDarkMode()" {{ $attributes }}>
    <button>
        <!-- Light mode svg icon  -->
        <x-svg.sun x-bind:class="{ 'block': darkMode === 'light', 'hidden': darkMode !== 'light' }"
            class="size-5 opacity-75" />

        <!-- Dark mode svg icon  -->
        <x-svg.moon x-bind:class="{ 'block': darkMode === 'dark', 'hidden': darkMode !== 'dark' }"
            class="size-5 opacity-75" />

        <!-- System mode light preference svg icon  -->
        <x-svg.adaptive x-cloak x-show="! window.matchMedia('(prefers-color-scheme: dark)').matches"
            x-bind:class="{ 'block': darkMode === 'system', 'hidden': darkMode !== 'system' }"
            class="size-5 opacity-75" />

        <!-- System mode dark preference svg icon  -->
        <x-svg.adaptive x-cloak x-show="window.matchMedia('(prefers-color-scheme: dark)').matches"
            x-bind:class="{ 'block': darkMode === 'system', 'hidden': darkMode !== 'system' }"
            class="size-5 opacity-75" />
    </button>

    {{ $slot }}
</div>
