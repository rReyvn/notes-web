<div class="space-y-12">
    <div class="flex justify-between items-center">
        <!-- Search Note -->
        <div wire:model.live="searchNote" class="w-80">
            <x-search placeholder="Search..." />
        </div>

        <!-- User profile -->
        <div>
            <div class="flex items-center gap-x-4 opacity-50">
                <!-- WARNING: Need a authenticated user to display username -->
                {{ __('Note User') }}
                <x-svg.user class="size-8" />
            </div>
        </div>
    </div>

    <div class="relative">
        <!-- Take Note Input -->
        <div class="max-w-lg mx-auto p-2 bg-white dark:bg-neutral-800 text-neutral-900 dark:text-neutral-100 shadow rounded-lg"
            x-data="{ showTitleInput: false }" x-on:click.outside="showTitleInput = false" wire:click.outside="save">
            <form wire:submit="save">
                <div x-show="showTitleInput" x-transition>
                    <input type="text" wire:model.blur="title" id="take_note_title" placeholder="Title"
                        class="w-full border-none sm:text-sm dark:bg-neutral-800 dark:text-white focus:ring-transparent" />
                </div>

                <div>
                    <input type="text" wire:model.blur="content" id="take_note_content"
                        x-on:focus="showTitleInput = true"
                        x-bind:placeholder="showTitleInput ? 'Content' : 'Take a note...'"
                        class="w-full border-none sm:text-sm dark:bg-neutral-800 dark:text-white focus:ring-transparent" />
                </div>

                <div wire:dirty wire:target="title, content">
                    <div class="flex items-center justify-end px-2 text-xs opacity-50 gap-x-2">
                        <x-svg.info class="size-3" />

                        {{ __('Press enter to save') }}
                    </div>
                </div>
            </form>
        </div>

        <span wire:loading wire:target="title, content" class="absolute inset-y-0 inset-x-3/4 place-content-center">
            <x-svg.arrow-spin class="size-5 animate-spin" />
        </span>
    </div>

    <div class="space-y-4">
        <!-- Note list -->
        <div class="grid sm:grid-cols-3 gap-4">
            @foreach ($notes as $note)
                <x-card>
                    <div class="flex items-center justify-between" x-data="{ showDelete: false }"
                        x-on:mouseenter="showDelete = true" x-on:mouseleave="showDelete = false">
                        <!-- Note created time -->
                        <div class="flex items-center text-xs gap-x-2 opacity-50 pb-2">
                            <x-svg.clock class="size-3" />
                            {{ $note->updated_at->diffForHumans() }}
                        </div>

                        <!-- Note delete button -->
                        <div x-show="showDelete" x-transition>
                            <button wire:click.prevent="delete({{ $note->id }})">
                                <x-svg.x-circle class="size-4 text-red-500 hover:text-red-400 active:text-red-600" />
                            </button>
                        </div>
                    </div>

                    <div class="space-y-2">
                        @isset($note->title)
                            <div class="font-bold text-xl">{{ $note->title }}</div>
                        @endisset

                        @isset($note->content)
                            <div class="{{ isset($note->title) ? 'text-sm opacity-75' : 'font-bold text-xl' }}">
                                @markdown($note->content)
                            </div>
                        @endisset
                    </div>
                </x-card>
            @endforeach
        </div>
    </div>

    <x-alert />

    {{ $notes->links() }}
</div>
