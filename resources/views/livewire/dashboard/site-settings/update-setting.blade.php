<div wire:ignore>
    @switch($page)
        @case('loan-product')
            @include('livewire.dashboard.site-settings.__cruds.update-loan-product')
        @break

        @default

        @break
    @endswitch
</div>