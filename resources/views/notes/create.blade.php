<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create a Notes') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="mx-auto max-w-2xl space-y-4 sm:px-6 lg:px-8">
            <x-button href="{{ route('notes.index') }}" wire:navigate icon="arrow-left" class="mb-6" blue>Back</x-button>
            <livewire:notes.create-note />
        </div>
    </div>
</x-app-layout>
