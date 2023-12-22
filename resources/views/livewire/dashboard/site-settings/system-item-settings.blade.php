<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0 gap-3">
                        <a href="{{ route('sys-settings') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                                <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
                            </svg>
                        </a>
                        <h3 class="fw-bold m-0">{{ ucwords(str_replace('-', ' ', $settings)) }} Settings</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                @switch($settings)
                    {{-- User Settings Group --}}
                    @case('user-req')
                        
                        @break
                    {{-- Loan Settings Group --}}
                    @case('loan-types')
                        @include('livewire.dashboard.site-settings.__parts.loan-types')
                    @break
                    @case('loan-rates')
                        @include('livewire.dashboard.site-settings.__parts.loan-rates')
                    @break
                    @case('loan-approval')
                        @include('livewire.dashboard.site-settings.__parts.loan-approval-hierarchy')
                    @break
                    @case('loan-repayments')
                        @include('livewire.dashboard.site-settings.__parts.loan-repayments')
                    @break


                    @default
                    @break
                @endswitch
            </div>
        </div>
    </div>
</div>