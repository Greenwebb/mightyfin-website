
<!--begin::Card header-->
<!--begin::Content-->
<div id="kt_account_settings_profile_details" class="collapse show">
    <!--begin::Form-->
    <form id="kt_account_profile_details_form" class="form">
        <div class="card-body border-top p-9">
            <div class="row mb-6">
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Loan Assigning</label>
                <div class="col-lg-8 fv-row">
                    <div class="d-flex align-items-center mt-3">
                        <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                            <input class="form-check-input" name="process_type" type="radio" value="1" onchange="toggleSettings('spooling')" />
                            <span class="fw-semibold ps-2 fs-6">Spooling</span>
                        </label>
                        <label class="form-check form-check-custom form-check-inline form-check-solid">
                            <input class="form-check-input" name="process_type" type="radio" value="2" onchange="toggleSettings('manual')" />
                            <span class="fw-semibold ps-2 fs-6">Manual</span>
                        </label>
                        <label class="form-check form-check-custom form-check-inline form-check-solid">
                            <input class="form-check-input" name="process_type" type="radio" value="3" onchange="toggleSettings('auto')" />
                            <span class="fw-semibold ps-2 fs-6">Auto</span>
                        </label>
                    </div>
                </div>
            </div>
    
            <div class="separator separator-dashed my-3"></div>
    
            <div id="spooling" class="settings mb-0">
                <label class="col-lg-4 col-form-label fw-bold fw-semibold fs-6">Spooling Settings</label>

                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="fv-row mb-0">
                        <label for="approvers" class="form-label fs-6 mb-3">Number of Approvers</label>
                        <input disabled type="text" class="form-control form-control-lg form-control-solid" id="approvers" placeholder="Email Address" name="num_of_approvers" value="Any" />
                    </div>
                </div>
            </div>
            <div id="manual" class="settings mb-0">
                <label class="col-lg-4 col-form-label fw-bold fs-6">Manual Settings</label>
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="fv-row mb-0">
                        <label for="approvers" class="form-label fs-6 mb-3">Number of Approvers</label>
                        <input disabled type="number" class="form-control form-control-lg form-control-solid" id="approvers" placeholder="Email Address" name="num_of_approvers" value="Any" />
                    </div>
                </div>
            </div>
            <div id="auto" class="settings mb-0">
                <label class="col-lg-4 col-form-label fw-bold fs-6">Auto Settings</label>
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="fv-row mb-0">
                        <label for="approvers" class="form-label fs-6 mb-3">Number of Approvers</label>
                        <input disabled type="number" class="form-control form-control-lg form-control-solid" id="approvers" placeholder="Email Address" name="num_of_approvers" value="Any" />
                    </div>
                </div>
            </div>
        </div>
    
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
        </div>
    </form>
    
</div>  


