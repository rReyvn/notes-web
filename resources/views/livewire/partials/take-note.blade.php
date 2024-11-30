<div class="max-w-lg mx-auto p-2 bg-white dark:bg-neutral-800 text-neutral-900 dark:text-neutral-100 shadow rounded-lg"
    x-data="{ showTitleInput: false }" x-on:click.outside="showTitleInput = false" wire:click.outside="save">
    <form wire:submit="save">
        <div x-show="showTitleInput" x-transition>
            <input type="text" wire:model.blur="title" id="take_note_title" placeholder="Title"
                class="w-full border-none sm:text-sm dark:bg-neutral-800 dark:text-white focus:ring-transparent" />
        </div>

        <!-- Auto grow textarea -->
        <!-- bug doesn't respect parent width -->
        <!-- <div
            class="
            grid
            text-sm
            after:px-3.5
            [&>textarea]:text-inherit
            after:text-inherit
            [&>textarea]:resize-none
            [&>textarea]:overflow-hidden
            [&>textarea]:[grid-area:1/1/2/2]
            after:[grid-area:1/1/2/2]
            after:whitespace-pre-wrap
            after:invisible
            after:content-[attr(data-cloned-val)_'_']
            after:border
        ">
            <textarea type="text" wire:model.blur="content" id="take_note_content" x-on:focus="showTitleInput = true"
                x-bind:placeholder="showTitleInput ? 'Content' : 'Take a note...'" rows="1"
                onInput="this.parentNode.dataset.clonedVal = this.value"
                class="w-full border-none sm:text-sm dark:bg-neutral-800 dark:text-white focus:ring-transparent resize-none"></textarea>
        </div> -->

        <div>
            <textarea type="text" wire:model.blur="content" id="take_note_content" x-on:focus="showTitleInput = true"
                x-bind:placeholder="showTitleInput ? 'Content' : 'Take a note...'" x-bind:rows="showTitleInput ? 4 : 1"
                onInput="this.parentNode.dataset.clonedVal = this.value"
                class="w-full border-none sm:text-sm dark:bg-neutral-800 dark:text-white focus:ring-transparent resize-none"></textarea>
        </div>

        <div wire:dirty wire:target="title, content">
            <div class="flex items-center justify-end px-2 text-xs opacity-50 gap-x-2">
                <x-svg.info class="size-3" />

                {{ __('Unsaved') }}
            </div>
        </div>

        <div class="flex items-center justify-end px-2 gap-x-4" x-show="showTitleInput" x-transition>
            <button x-on:click="showTitleInput = false"
                class="inline-block rounded border border-current px-6 py-1 text-sm font-medium text-neutral-400/60 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring">
                {{ __('Cancel') }}
            </button>

            <button type="submit"
                class="inline-block rounded bg-neutral-700 px-6 py-1 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring">
                {{ __('Save') }}
            </button>
        </div>
    </form>
</div>
