<div class="p-6">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button class="mr-5" wire:click="dispatchEvent">
            {{ __('Dispatch Event') }}
        </x-jet-button>
        <x-jet-button wire:click="createShowModal">
            {{ __('Create') }}
        </x-jet-button>
    </div>

 {{-- The data table --}}
 <div class="flex flex-col">
    <div class="flex items-center">
        <label class="relative block w-full">
            <span class="sr-only">Search</span>
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                <svg class="h-5 w-5 fill-stone-300 dark:fill-stone-500" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
            </span>
            <input
                wire:model.debounce.250ms="search"
                wire:ref="search-box"
                type="text"
                name="search"
                value=""
                placeholder="Type something..."
                class="placeholder:italic placeholder:text-stone-400 dark:placeholder:text-stone-500 dark:text-stone-400 block bg-stone-50 dark:bg-stone-900 w-full border border-stone-300 dark:border-stone-600 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
                placeholder="Search all articles and videos..." type="text" name="search"/>
        </label>
    </div>
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Created at</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">name</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">note</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @php
$i=0;
@endphp
                        @if ($data->count())
                            @foreach ($data as $item)
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                        {{ $i+1 }}
                                    </td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                        {{ $item->created_at->diffForhumans() }}
                                    </td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                        {{ $item->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                        {{ $item->note }}
                                    </td>

                                    <td class="px-6 py-4 text-right text-sm">
                                        <x-jet-button wire:click="updateShowModal({{ $item->id }})">
                                            {{ __('Update') }}
                                        </x-jet-button>
                                        <x-jet-danger-button wire:click="deleteShowModal({{ $item->id }})">
                                            {{ __('Delete') }}
                                        </x-jet-button>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No Results Found</td>
                            </tr>
                        @endif

                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>

<br/>


     {{-- Modal Form --}}
     <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Save Page') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="name" />
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="note" value="{{ __('note') }}" />
                <x-jet-input id="note" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="note" />
                @error('note') <span class="error">{{ $message }}</span> @enderror
            </div>




        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            @if ($modelId)
                <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-jet-danger-button>
            @else
                <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-jet-danger-button>
            @endif

        </x-slot>
    </x-jet-dialog-modal>
{{-- The Delete Modal --}}

<x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
    <x-slot name="title">
        {{ __('Delete Page') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you want to delete this page? Once the page is deleted, all of its resources and data will be permanently deleted.') }}
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
            {{ __('Nevermind') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
            {{ __('Delete Page') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
</div>
