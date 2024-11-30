<div class="grid sm:grid-cols-3 gap-4">
    @foreach ($notes as $note)
        <x-card>
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
    @endforeach
</div>
