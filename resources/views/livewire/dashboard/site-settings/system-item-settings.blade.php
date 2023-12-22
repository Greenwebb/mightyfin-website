<div>
    @switch($settings)
        {{-- User Settings Group --}}
        @case('user-req')
            
            @break


        
        {{-- Loan Settings Group --}}
        @case('loan-types')
            
        @break
        @case('loan-rates')
            @include('livewire.dashbo')
        @break
        @case('loan-types')
        
        @break
        @case('loan-approval')
        
        @break
        @case('loan-repayments')
        
        @break
        @default
            
    @endswitch
</div>
