<div wire:ignore>
    @switch($page)
        @case('loan-product')
            @include('livewire.dashboard.site-settings.__cruds.create-loan-product')
        @break

        @default

        @break
    @endswitch
</div>
