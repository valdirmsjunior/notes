<?php

use Livewire\Volt\Component;
use App\Models\Note;
use Carbon\Carbon;

new class extends Component {
    public function with(): array
    {
        return [
            'notes' => Auth::user()->notes()->orderBy('send_date', 'asc')->get(),
        ];
    }

    public function delete($noteId)
    {
        $note = Note::where('id', $noteId)->first();
        $this->authorize('delete', $note);
        $note->delete();
    }
}; ?>

<div>
    <div class="space-y-2">
        @if ($notes->isEmpty())
            <div class="text-center">
                <p class="text-xl font-bold">No Notes yet</p>
                <p class="text-sm">Let's create your firts note to send.</p>
                <x-button href="{{ route('notes.create') }}" class="mt-6" primary icon-right="plus" wire:navigate>Create
                    Note</x-button>
            </div>
        @else
            <x-button icon="pencil" class="mb-4" positive icon-right="plus" href="{{ route('notes.create') }}"
                wire:navigate>Create Note</x-button>
            <div class="mt-12 grid grid-cols-3 gap-4">
                @foreach ($notes as $note)
                    <x-card wire:key='{{ $note->id }}'>
                        <div class="flex justify-between">
                            <div>
                                <a href="{{ route('notes.edit', $note) }}" wire:navigate
                                    class="text-xl font-bold hover:text-blue-500 hover:underline">
                                    {{ $note->title }}
                                </a>
                                <p class="mt-2 text-xs">{{ Str::limit($note->body, 50) }}</p>
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ Carbon::parse($note->send_date)->format('d/m/Y') }}
                            </div>
                        </div>
                        <div class="mt-4 flex items-end justify-between space-x-1">
                            <p class="text-xs">Recipient: <span class="font-semibold">{{ $note->recipient }}</span></p>
                            <div>
                                <x-button.circle icon="eye"></x-button.circle>
                                <x-button.circle icon="trash"
                                    wire:click="delete('{{ $note->id }}')"></x-button.circle>
                            </div>
                        </div>
                    </x-card>
                @endforeach
            </div>
        @endif
    </div>
</div>
