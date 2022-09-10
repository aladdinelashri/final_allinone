<div class="p-6">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button class="mr-5" wire:click="dispatchEvent">
            {{ __('Dispatch Event') }}
        </x-jet-button>
        <x-jet-button wire:click="createShowModal">
            {{ __('Create') }}
        </x-jet-button>
    </div>
</div>
 {{-- Modal Form --}}
 <x-jet-dialog-modal wire:model="modalFormVisible">
    <x-slot name="title">
        {{ __('Save Page') }}
    </x-slot>

    <x-slot name="content">
        <div class="mt-4">
            <x-jet-label for="Name" value="{{ __('Name') }}" />
            <x-jet-input id="Name" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="Name" />
            @error('Name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <x-jet-label for="Size" value="{{ __('Size') }}" />
            <x-jet-input id="Size" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="Size" />
            @error('Size') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <x-jet-label for="Color" value="{{ __('Color') }}" />
            <x-jet-input id="Color" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="Color" />
            @error('Color') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <x-jet-label for="Note" value="{{ __('Note') }}" />
            <x-jet-input id="Note" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="Note" />
            @error('Note') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <label for="Brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select color option</label>
            <select wire:model="selectedBrandId " class="form-control mb-2">
                <option selected>Choose Brand</option>

                @foreach (App\Models\Brand::all() as $department)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <x-jet-label for="weightoption_id" value="{{ __('weightoption_id') }}" />
            <x-jet-input id="weightoption_id" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="weightoption_id" />
            @error('weightoption_id') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <x-jet-label for="sizeoption_id" value="{{ __('sizeoption_id') }}" />
            <x-jet-input id="sizeoption_id" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="sizeoption_id" />
            @error('sizeoption_id') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <x-jet-label for="brand_id" value="{{ __('brand_id') }}" />
            <x-jet-input id="brand_id" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="brand_id" />
            @error('brand_id') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <x-jet-label for="categoryitem_id" value="{{ __('categoryitem_id') }}" />
            <x-jet-input id="categoryitem_id" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="categoryitem_id" />
            @error('categoryitem_id') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <x-jet-label for="in_stock" value="{{ __('in_stock') }}" />
            <x-jet-input id="in_stock" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="in_stock" />
            @error('in_stock') <span class="error">{{ $message }}</span> @enderror
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