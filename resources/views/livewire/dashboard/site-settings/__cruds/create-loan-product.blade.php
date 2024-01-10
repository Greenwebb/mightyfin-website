<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <form wire:submit.prevent="create_loan_product" id="kt_content_container" class="container-xxl">
            
            <div class="card-header border-0 cursor-pointer">
                <div class="alert alert-primary mt-2">
                    <small>
                        Please note that some of the fields below are optional. You can leave the fields empty if you do not want to place any restriction.
                    </small>
                </div>
            </div>

            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">Loan Description:</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <div id="kt_account_profile_details_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Loan Name</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" wire:model.lazy="new_loan_name" class="form-control form-control-lg form-control-solid" placeholder="E.g Business Loan" required/>
                                </div>
                                <!--end::Col-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">Loan Release:</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Set Loan Release Date to Today's date</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <!--begin::Options-->
                                <div class="d-flex align-items-center mt-3">
                                    <!--begin::Option-->
                                    <label for="no" class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                        <input class="form-check-input" id="no" wire:model.lazy="loan_release_date" type="radio" value="0" />
                                        <span class="fw-semibold ps-2 fs-6">No</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label for="yes" class="form-check form-check-custom form-check-inline form-check-solid">
                                        <input class="form-check-input" id="yes" wire:model.lazy="loan_release_date" type="radio" value="1" />
                                        <span class="fw-semibold ps-2 fs-6">Yes</span>
                                    </label>
                                    <!--end::Option-->
                                </div>
                                <div class="p-2 py-3">
                                    <p>If you select Yes, the Loan Release Date on the Add Loan page will be <br>auto-filled with today's date</p>
                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Col-->
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">Principal Amount:</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <div id="kt_account_profile_details_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Disbursed By</label>
                                <div class="col-lg-8 fv-row">
                                    <div class="d-block mt-3">
                                        <label for="cash" class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                            <input id="cash" class="form-check-input" wire:model.lazy="loan_disbursed_by" type="checkbox" value="cash" />
                                            <span class="fw-semibold ps-2 fs-6">Cash</span>
                                        </label>
                                        <br>
                                        <label for="cheque" class="mt-2 form-check form-check-custom form-check-inline form-check-solid">
                                            <input id="chaeque" class="form-check-input" wire:model.lazy="loan_disbursed_by" type="checkbox" value="cheque" />
                                            <span class="fw-semibold ps-2 fs-6">Cheque</span>
                                        </label>
                                        <br>
                                        <label for="wire-transfer" class="mt-2 form-check form-check-custom form-check-inline form-check-solid">
                                            <input id="wire-transfer" class="form-check-input" wire:model.lazy="loan_disbursed_by" type="checkbox" value="wire-transfer" />
                                            <span class="fw-semibold ps-2 fs-6">Wire Transfer</span>
                                        </label>
                                        <br>
                                        <label for="online-transfer" class="mt-2 form-check form-check-custom form-check-inline form-check-solid">
                                            <input id="online-transfer" class="form-check-input" wire:model.lazy="loan_disbursed_by" type="checkbox" value="online-transfer" />
                                            <span class="fw-semibold ps-2 fs-6">Online Transfer</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Minimum Principal Amount</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" wire:model.lazy="minimum_loan_principal_amount" class="form-control form-control-lg form-control-solid" placeholder="0.00" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Default Principal Amount</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Defualt amount the can be borrowed">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" wire:model.lazy="default_loan_principal_amount" class="form-control form-control-lg form-control-solid" placeholder="0.00" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Maximum Principal Amount</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" wire:model.lazy="maximum_principal_amount" class="form-control form-control-lg form-control-solid" placeholder="0.00" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            {{-- <div class="row mb-0">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Allow Marketing</label>
                                <!--begin::Label-->
                                <!--begin::Label-->
                                <div class="col-lg-8 d-flex align-items-center">
                                    <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                        <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" checked="checked" />
                                        <label class="form-check-label" for="allowmarketing"></label>
                                    </div>
                                </div>
                                <!--begin::Label-->
                            </div> --}}
                            <!--end::Input group-->
                        </div>
                        
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>


            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">Interest:</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <div id="kt_account_profile_details_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                        
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Interest Method</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select type="text" wire:model.lazy="loan_interest_method" class="form-control form-control-lg form-control-solid" placeholder="Company name" value="Keenthemes">
                                        <option value=""></option>
                                        <option value="flat-rate">Flat Rate</option>
                                        <option value="reducing-balance-ei">Reducing Balance - Equal Installments</option>
                                        <option value="reducing-balance-ep">Reducing Balance - Equal Principal</option>
                                        <option value="interest-only">Interest-Only</option>
                                        <option value="compound-interest">Compound Interest</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Interest Type</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <div class="d-block align-items-center mt-3">
                                        <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                            <input class="form-check-input" wire:model.lazy="loan_interest_type" type="radio" value="percentage" />
                                            <span class="fw-semibold ps-2 fs-6">I want interest rate to be percentage % based</span>
                                        </label>
                                        <label class="mt-2 form-check form-check-custom form-check-inline form-check-solid">
                                            <input class="form-check-input" wire:model.lazy="loan_interest_type" type="radio" value="fixed" />
                                            <span class="fw-semibold ps-2 fs-6">I want interest be a fixed amount Per Cycle</span>
                                        </label>
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Loan Interest Period</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select type="text" wire:model.lazy="loan_interest_period" class="form-control form-control-lg form-control-solid" placeholder="Company name" value="Keenthemes">
                                        <option value=""></option>
                                        <option value="per-day">Per Day</option>
                                        <option value="per-week">Per Week</option>
                                        <option value="per-month">Per Month</option>
                                        <option value="per-year">Per Year</option>
                                        <option value="per-loan">Per Loan</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Minimum Loan Interest</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" wire:model.lazy="minimum_loan_interest" class="form-control form-control-lg form-control-solid" placeholder="0.00" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Defualt Loan Interest</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" wire:model.lazy="default_loan_interest" class="form-control form-control-lg form-control-solid" placeholder="0.00" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Maximum Loan Interest</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" wire:model.lazy="maximum_loan_interest" class="form-control form-control-lg form-control-solid" placeholder="0.00" />
                                </div>
                                <!--end::Col-->
                            </div>
                            
                        </div>
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>

            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">Duration:</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <div id="kt_account_profile_details_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Loan Duration Period</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select type="text" wire:model.lazy="loan_duration_period" class="form-control form-control-lg form-control-solid" placeholder="Company name" value="Keenthemes">
                                        <option value=""></option>
                                        <option value="day">Days</option>
                                        <option value="week">Weeks</option>
                                        <option value="month">Month</option>
                                        <option value="year">Years</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Minimum Loan Duration</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select type="text" wire:model.lazy="minimum_loan_duration" class="form-control form-control-lg form-control-solid">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Defualt Loan Duration</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select type="text" wire:model.lazy="default_loan_duration" class="form-control form-control-lg form-control-solid" placeholder="0.00">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Maximum Loan Duration</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select type="text" wire:model.lazy="maximum_loan_duration" class="form-control form-control-lg form-control-solid" placeholder="0.00">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            
                        </div>
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            

            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer py-3" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">Repayments:</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <div id="kt_account_profile_details_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Repayment Cycle</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <div class="mt-3 align-items-start" style="display: block">
                                        <label for="daily" class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                            <input id="daily" class="form-check-input" wire:model.lazy="loan_repayment_cycle" type="checkbox" value="daily" />
                                            <span class="fw-semibold ps-2 fs-6">Daily</span>
                                        </label>
                                        <br>
                                        <label for="weekly" class="mt-2 form-check form-check-custom form-check-inline form-check-solid">
                                            <input id="weekly" class="form-check-input" wire:model.lazy="loan_repayment_cycle" type="checkbox" value="weekly" />
                                            <span class="fw-semibold ps-2 fs-6">Weekly</span>
                                        </label>
                                        <br>
                                        <label for="biweekly" class="mt-2 form-check form-check-custom form-check-inline form-check-solid">
                                            <input id="biweekly" class="form-check-input" wire:model.lazy="loan_repayment_cycle" type="checkbox" value="biweekly" />
                                            <span class="fw-semibold ps-2 fs-6">Biweekly</span>
                                        </label>
                                        <br>
                                        <label for="bimonthly" class="mt-2 form-check form-check-custom form-check-inline form-check-solid">
                                            <input id="bimonthly" class="form-check-input" wire:model.lazy="loan_repayment_cycle" type="checkbox" value="bimonthly" />
                                            <span class="fw-semibold ps-2 fs-6">Bimonthly</span>
                                        </label>
                                        <br>
                                        <label for="quarterly" class="mt-2 form-check form-check-custom form-check-inline form-check-solid">
                                            <input id="quarterly" class="form-check-input" wire:model.lazy="loan_repayment_cycle" type="checkbox" value="quarterly" />
                                            <span class="fw-semibold ps-2 fs-6">Quarterly</span>
                                        </label>
                                        <br>
                                        <label for="every-4-months" class="mt-2 form-check form-check-custom form-check-inline form-check-solid">
                                            <input id="every-4-months" class="form-check-input" wire:model.lazy="loan_repayment_cycle" type="checkbox" value="every-4-months" />
                                            <span class="fw-semibold ps-2 fs-6">Every 4 Months</span>
                                        </label>
                                        <br>
                                        <label for="semi-annual" class="mt-2 form-check form-check-custom form-check-inline form-check-solid">
                                            <input id="semi-annual" class="form-check-input" wire:model.lazy="loan_repayment_cycle" type="checkbox" value="semi-annual" />
                                            <span class="fw-semibold ps-2 fs-6">Semi Annual</span>
                                        </label>
                                        <br>
                                        <label for="every-9-months" class="mt-2 form-check form-check-custom form-check-inline form-check-solid">
                                            <input id="every-9-months" class="form-check-input" wire:model.lazy="loan_repayment_cycle" type="checkbox" value="every-9-months" />
                                            <span class="fw-semibold ps-2 fs-6">Every 9 Months</span>
                                        </label>
                                        <br>
                                        <label for="yearly" class="mt-2 form-check form-check-custom form-check-inline form-check-solid">
                                            <input id="yearly" class="form-check-input" wire:model.lazy="loan_repayment_cycle" type="checkbox" value="yearly" />
                                            <span class="fw-semibold ps-2 fs-6">Yearly</span>
                                        </label>
                                        <br>
                                        <label for="lamp-sum" class="mt-2 form-check form-check-custom form-check-inline form-check-solid">
                                            <input id="lamp-sum" class="form-check-input" wire:model.lazy="loan_repayment_cycle" type="checkbox" value="lamp-sum" />
                                            <span class="fw-semibold ps-2 fs-6">Lamp-Sum</span>
                                        </label>
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Minimum Number of Repayments</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" wire:model.lazy="minimum_num_of_repayments" class="form-control form-control-lg form-control-solid" placeholder="1" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Default Number of Repayments</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Defualt amount the can be borrowed">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" wire:model.lazy="default_num_of_repayments" class="form-control form-control-lg form-control-solid" placeholder="1" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Maximum Number of Repayments</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" wire:model.lazy="maximum_num_of_repayments" class="form-control form-control-lg form-control-solid" placeholder="1" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer py-3" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">Loan Due and Loan Schedule Amount:</h3>
                    </div>
                    <div class="alert alert-primary mt-2">
                        <small>
                            If loan Due amount and/or Schedule amounts are in decimals for example K100.3333, the system will convert it based on the below option.
                        </small>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <div id="kt_account_profile_details_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Decimal Places</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select type="text" wire:model.lazy="loan_decimal_place" class="form-control form-control-lg form-control-solid">
                                        <option value=""></option>

                                        <option value="off-to-2">Round Off to 2 Decimal Places</option>
                                        <option value="off-to-int">Round Off to Integer</option>
                                        <option value="down-to-integer">Round Down to Integer</option>
                                        <option value="off-to-1">Round Off to 1 Decimal Place</option>
                                        <option value="up-to-1">Round Up to 1 Decimal Place</option>
                                        <option value="off-to-nearest-5">Round Off to Nearest 5</option>
                                        <option value="up-to-nearest-10">Round Up to Nearest 10</option>
                                        <option value="off-to-nearest-100">Round Off to Nearest 100</option>
                                        
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                        </div>
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>

            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer py-3" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">Repayment Order:</h3>
                    </div>
                    <div class="alert alert-primary mt-2">
                        <small>
                            If loan Due amount and/or Schedule amounts are in decimals for example K100.3333, the system will convert it based on the below option.
                        </small>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <div id="kt_account_profile_details_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Repayment Order</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    
                                </div>
                                <!--end::Col-->
                            </div>
                        </div>
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>

            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer py-3" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">Automated Payments:</h3>
                    </div>
                    <div class="alert alert-primary mt-2">
                        <small>
                            If you select YES below, the system will automatically add due payments on the schedule dates for loans added in this
                            loan product. This is useful if you expect to receive payments on time for the loans. For example, you may have direct deposit or payroll
                            system which automatically deducts payments form the borrower on the scheduled dates. This will save
                            you time from having to manually add payments on MightyFin on the scheduled dates.
                        </small>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                <!--begin::Form-->
                    <div id="kt_account_profile_details_form" class="form">
                    <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Col-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Add Automatic Payments</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <!--begin::Options-->
                                    <div class="d-flex align-items-center mt-3">
                                        <!--begin::Option-->
                                        <label for="no" class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                            <input class="form-check-input" id="no" wire:model.lazy="add_automatic_payments" type="radio" value="0" />
                                            <span class="fw-semibold ps-2 fs-6">No</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label for="yes" class="form-check form-check-custom form-check-inline form-check-solid">
                                            <input class="form-check-input" id="yes" wire:model.lazy="add_automatic_payments" type="radio" value="1" />
                                            <span class="fw-semibold ps-2 fs-6">Yes</span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <div class="p-2 py-3">
                                        <p>
                                            If you select Yes, the system will automatically add the due payments on every repayment cycle based on the scheduled dates.
                                        </p>
                                    </div>
                                    <!--end::Options-->
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Cash/Bank</label>
                                    <div class="col-lg-8 fv-row">
                                        <div class="d-block mt-3">
                                            <label for="cash" class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                                <input id="cash" class="form-check-input" wire:model.lazy="auto_payment_sources" type="checkbox" value="cash" />
                                                <span class="fw-semibold ps-2 fs-6">Cash</span>
                                            </label>
                                            <br>
                                            <label for="zanaco" class="mt-2 form-check form-check-custom form-check-inline form-check-solid">
                                                <input id="zanaco" class="form-check-input" wire:model.lazy="auto_payment_sources" type="checkbox" value="cheque" />
                                                <span class="fw-semibold ps-2 fs-6">ZANACO (Zambia National Commercial Bank)</span>
                                            </label>
                                            <br>
                                            <label for="stanbic" class="mt-2 form-check form-check-custom form-check-inline form-check-solid">
                                                <input id="stanbic" class="form-check-input" wire:model.lazy="auto_payment_sources" type="checkbox" value="wire-transfer" />
                                                <span class="fw-semibold ps-2 fs-6">Stanbic Bank Zambia</span>
                                            </label>
                                            <br>
                                            <label for="petty-cash" class="mt-2 form-check form-check-custom form-check-inline form-check-solid">
                                                <input id="petty-cash" class="form-check-input" wire:model.lazy="auto_payment_sources" type="checkbox" value="online-transfer" />
                                                <span class="fw-semibold ps-2 fs-6">Petty Cash</span>
                                            </label>
                                        </div>
                                        <div class="p-2 py-3">
                                            <a href="#">Add or Edit Bank Accounts</a>
                                            <p>
                                                Select the bank account where the money will be received. This will allow the system to make
                                                the proper journal entry
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Col-->
                        </div>
                    </div>
                </div>
                <!--end::Content-->
            </div>

            <!--begin::Deactivate Account-->
            <div id="kt_account_settings_deactivate" class="collapse show">
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button id="kt_account_deactivate_account_submit" type="submit" class="btn btn-primary fw-semibold">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy2" viewBox="0 0 16 16">
                                <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v3.5A1.5 1.5 0 0 1 11.5 6h-7A1.5 1.5 0 0 1 3 4.5V1H1.5a.5.5 0 0 0-.5.5m9.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z"/>
                            </svg>
                        </span>    
                        Save
                    </button>
                </div>
            </div>
            <!--end::Deactivate Account-->
        </form>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>