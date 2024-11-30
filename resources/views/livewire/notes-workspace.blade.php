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
        @include('livewire.partials.take-note')

        <span wire:loading wire:target="title, content" class="absolute inset-y-0 inset-x-3/4 place-content-center">
            <x-svg.arrow-spin class="size-5 animate-spin" />
        </span>
    </div>

    <div class="space-y-4">
        <!-- Note list -->
        @include('livewire.partials.note-list')
    </div>

    <x-alert />

    {{ $notes->links() }}
</div>
