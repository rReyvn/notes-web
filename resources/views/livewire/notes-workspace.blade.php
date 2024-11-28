<div class="space-y-4">
    <div class="flex justify-between items-center">
        <!-- Search Note -->
        <div wire:model.live="searchNote" class="w-80">
            <x-search placeholder="Search..." />
        </div>

        <!-- User profile -->
        <div>
            <div class="flex items-center gap-x-4">
                <!-- WARNING: Need a authenticated user to display username -->
                {{ __('Note User') }}
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-8">
                    <path fill-rule="evenodd"
                        d="M15 8A7 7 0 1 1 1 8a7 7 0 0 1 14 0Zm-5-2a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM8 9c-1.825 0-3.422.977-4.295 2.437A5.49 5.49 0 0 0 8 13.5a5.49 5.49 0 0 0 4.294-2.063A4.997 4.997 0 0 0 8 9Z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Take Note Input -->
    <div class="max-w-lg mx-auto p-2 bg-white dark:bg-neutral-800 text-neutral-900 dark:text-neutral-100 shadow rounded-lg"
        x-data="{ showTitleInput: false }" x-on:click.outside="showTitleInput = false">
        <form wire:submit.prevent="save">
            <div x-show="showTitleInput" x-transition>
                <input type="text" wire:model.blur="title" wire:blur="save" id="take_note_title" placeholder="Title"
                    class="w-full border-none sm:text-sm dark:bg-neutral-800 dark:text-white focus:ring-transparent" />
            </div>

            <div>
                <input type="text" wire:model.blur="content" wire:blur="save" id="take_note_content"
                    x-on:focus="showTitleInput = true"
                    x-bind:placeholder="showTitleInput ? 'Content' : 'Take a note...'"
                    class="w-full border-none sm:text-sm dark:bg-neutral-800 dark:text-white focus:ring-transparent" />
            </div>

            <div wire:dirty wire:target="content">
                <div class="flex items-center justify-end px-2 text-xs opacity-50 gap-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-3">
                        <path fill-rule="evenodd"
                            d="M15 8A7 7 0 1 1 1 8a7 7 0 0 1 14 0ZM9 5a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6.75 8a.75.75 0 0 0 0 1.5h.75v1.75a.75.75 0 0 0 1.5 0v-2.5A.75.75 0 0 0 8.25 8h-1.5Z"
                            clip-rule="evenodd" />
                    </svg>

                    {{ __('Press enter to save') }}
                </div>
            </div>

            <span wire:loading wire:target="save">
                {{ __('...') }}
            </span>
        </form>
    </div>

    <div class="space-y-4">
        <!-- Note list -->
        <div class="grid sm:grid-cols-3 gap-4">
            @foreach ($notes as $note)
                <x-card x-data="{ showDelete: false }" x-on:mouseenter="showDelete = true"
                    x-on:mouseleave="showDelete = false">
                    @isset($note->title)
                        <div>{{ $note->title }}</div>
                    @endisset
                    <div class="flex justify-between items-center">
                        @isset($note->content)
                            <div>
                                {{ $note->content }}
                            </div>
                        @endisset

                        <div x-show="showDelete" x-transition>
                            <button wire:click="delete({{ $note->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                    class="size-5 text-red-500 hover:text-red-400 active:text-red-600">
                                    <path fill-rule="evenodd"
                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm2.78-4.22a.75.75 0 0 1-1.06 0L8 9.06l-1.72 1.72a.75.75 0 1 1-1.06-1.06L6.94 8 5.22 6.28a.75.75 0 0 1 1.06-1.06L8 6.94l1.72-1.72a.75.75 0 1 1 1.06 1.06L9.06 8l1.72 1.72a.75.75 0 0 1 0 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </x-card>
            @endforeach
        </div>
    </div>
</div>
