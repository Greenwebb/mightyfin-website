<style>
    #loading-spinner {
        display: none;
    }
</style>

<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold fs-3 mb-1">Loan Products</span>
            <span class="text-muted mt-1 fw-semibold fs-7">Over loan products</span>
        </h3>
        <div class="card-toolbar">
            <a href="{{ route('system-create', ['page' => 'loan-product']) }}" class="btn btn-sm btn-light-primary">
            <i class="ki-duotone ki-plus fs-2"></i>New Loan Product</a>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        @include('livewire.dashboard.__parts.dash-alerts')
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bold text-muted bg-light">
                        <th class="ps-4 min-w-205px rounded-start">Loan Description</th>
                        <th class="min-w-100px">Interest</th>
                        <th class="min-w-100px">Duration</th>
                        <th class="min-w-100px">Release Date</th>
                        <th class="min-w-100px">Status</th>
                        <th class="min-w-100px text-end rounded-end"></th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-label bg-light-danger symbol-50px me-5">
                                </div>
                                <div class="d-flex justify-content-start flex-column">
                                    <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">GRZ Loan</a>
                                    <span class="text-muted fw-semibold text-muted d-block fs-7">Civil servants</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">2.3%</a>
                            <span class="text-muted fw-semibold text-muted d-block fs-7">Percentage</span>
                        </td>
                        <td>
                            <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">1 month</a>
                            <span class="text-muted fw-semibold text-muted d-block fs-7">Insurance</span>
                        </td>
                        <td>
                            <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">Auto</a>
                            <span class="text-muted fw-semibold text-muted d-block fs-7">Todate</span>
                        </td>
                        <td>
                            <span class="badge badge-light-primary fs-7 fw-bold">Active</span>
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <i class="ki-duotone ki-switch fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </a>
                            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <i class="ki-duotone ki-pencil fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </a>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>