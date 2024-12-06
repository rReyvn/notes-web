<div class="grid sm:grid-cols-3 gap-4">
    @foreach ($notes as $note)
        <x-card x-data="" x-on:click.prevent="$dispatch('open-modal', 'note-modal-{{ $note->id }}')">
            <div class="flex items-center justify-between" x-data="{ showDelete: false }" x-on:mouseenter="showDelete = true"
                x-on:mouseleave="showDelete = false">
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

        <x-modal name="note-modal-{{ $note->id }}" :maxWidth="'lg'" focusable>
            @csrf
            @method('put')

            <form class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Update Note') }}
                </h2>

                <div class="space-y-2 my-4">
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" name="title" :value="$note->title" class="block mt-1 w-full" />
                    </div>

                    <div>
                        <x-input-label for="content" :value="__('Content')" />
                        <x-text-input id="content" name="content" :value="$note->content" class="block mt-1 w-full" />
                    </div>
                </div>

                <div class="flex justify-end">
                    <x-primary-button>
                        {{ __('Save') }}
                    </x-primary-button>
                </div>
            </form>
        </x-modal>
    @endforeach
</div>
