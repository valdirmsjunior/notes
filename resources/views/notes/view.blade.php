<x-guest-layout>
    <div class="flex justify-between">
        <h2 class="text-x1 font-semibold leading-tight text-gray-800">
            {{ $note->title }}
        </h2>
    </div>
    <p class="mt-4">{{ $note->body }}</p>
    <div class="mt-12 flex items-center justify-end space-x-2">
        <h3 class="mr-2 text-sm"> Sent from {{ $user->name }} </h3>
        <livewire:heartreact :note="$note" />
    </div>
</x-guest-layout>
