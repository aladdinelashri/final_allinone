<div class="p-6">
    <div class="flex item2s-center justify-end px-4 py-3 text-right sm:px-6">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Soft Deleted Brands') }}
        </h2>
    </div>
 {{-- The data2 table --}}
 <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Created at</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">name</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @php
$i=0;
@endphp
                        @if ($data2->count())
                            @foreach ($data2 as $item2)
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                        {{ $i+1 }}
                                    </td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                        {{ $item2->created_at->diffForhumans() }}
                                    </td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                        {{ $item2->name }}
                                    </td>
                                    
                                    <td class="px-6 py-4 text-right text-sm">
                                        <x-jet-button wire:click="restoreShowmodal2({{ $item2->id }})">
                                            {{ __('Restore') }}
                                        </x-jet-button>
                                        <x-jet-danger-button wire:click="deleteShowmodal2({{ $item2->id }})">
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
{{-- The Delete modal2 --}}
<x-jet-dialog-modal wire:model="modal2ConfirmDeleteVisible">
    <x-slot name="title">
        {{ __('Soft Delete Page') }}
    </x-slot>
    <x-slot name="content">
        {{ __('Are you sure you want to delete this page? Once the page is deleted, all of its resources and data2 will be permanently deleted.') }}
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modal2ConfirmDeleteVisible')" wire:loading.attr="disabled">
            {{ __('Nevermind') }}
        </x-jet-secondary-button>
        <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
            {{ __('Delete Page') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>

{{-- The Delete modal2 --}}
<x-jet-dialog-modal wire:model="modal2ConfirmRestoreVisible">
    <x-slot name="title">
        {{ __('Soft Delete Page') }}
    </x-slot>
    <x-slot name="content">
        {{ __('Are you sure you want to restore delted Brand? ') }}
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modal2ConfirmRestoreVisible')" wire:loading.attr="disabled">
            {{ __('Nevermind') }}
        </x-jet-secondary-button>
        <x-jet-danger-button class="ml-2" wire:click="restore" wire:loading.attr="disabled">
            {{ __('Restore') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
</div>


