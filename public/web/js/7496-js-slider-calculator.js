//API Handler
class LoanService {
    constructor(baseUrl, apiEndpoint) {
        this.apiUrl = `${baseUrl}${apiEndpoint}`;
    }

    handleErrors(response) {
        if (!response.ok) {
            throw Error(response.statusText);
        }
        return response;
    }

    async fetchLoanProducts() {
        try {
            const response = await fetch(this.apiUrl);
            const data = await response.json();
            return data;
        } catch (error) {
            console.error("Error fetching data:", error.message);
            throw error;
        }
    }
}
/*LAUNCH CALCULATOR BEHAVIOUR*/
document.addEventListener("DOMContentLoaded", async function () {
    //value formater
    function number_format(number, decimals, dec_point, thousands_sep) {
        // Strip all characters but numerical ones.
        number = (number + "").replace(/[^0-9+\-Ee.]/g, "");
        let n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
            dec = typeof dec_point === "undefined" ? "." : dec_point,
            s = "",
            toFixedFix = function (n, prec) {
                let k = Math.pow(10, prec);
                return "" + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || "").length < prec) {
            s[1] = s[1] || "";
            s[1] += new Array(prec - s[1].length + 1).join("0");
        }
        return s.join(dec);
    }
    //UI VARIABLES

    let apply_btn = document.querySelector("#apply");
    let duration = document.getElementById("duration");
    let time_frame = document.getElementById("time_frame");
    let slider_amount = document.getElementById("slidatious");
    let update_side_amount = document.getElementById("update_side");
    let result_amount = document.getElementById("amountatious");
    let result_payment = document.getElementById("result_payment");
    let result_duration = document.getElementById("result_duration");
    let _new_person = document.getElementById("new_customer");
    let _old_person = document.getElementById("returning_customer");
    let slider_duration = document.getElementById("slidate");
    let loan_products = document.getElementById("loan_products");

    //BASE URL
    const baseUrl =
        window.location.protocol +
        "//" +
        window.location.hostname +
        (window.location.port ? ":" + window.location.port : "") +
        window.location.pathname;

    //INITIAL UI BEHAVIOUR
    duration.style.display = "block";
    apply_btn.disabled = true;
    apply_btn.innerHTML = "INPUT DETAILS ABOVE";
    apply_btn.disabled = true;
    duration.style.display = "block";

    // Function to fetch loan products
    const loanApiEndpoint = "api/get-loan-products";

    const loanService = new LoanService(baseUrl, loanApiEndpoint);
    try {
        const loanProducts = await loanService.fetchLoanProducts();

        let radioGroupHtml = "";

        if (loanProducts.length === 0) {
            radioGroupHtml += `
                <div class="col-12">
                    <label class="custom-radio">
                        <div class="radio-btn">
                            <div class="content">
                                <div class="mb-2">
                                    <img width="50px" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='50' height='50' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='12' cy='12' r='10' /%3E%3Cline x1='15' y1='9' x2='9' y2='15' /%3E%3Cline x1='15' y1='15' x2='9' y2='9' /%3E%3C/svg%3E" />
                                </div>
                                <h2>No Loans Available Yet</h2>
                                <p class="skill">Not ready!</p>
                            </div>
                        </div>
                    </label>
                </div>
            `;
        } else {
            loanProducts.forEach((product, index) => {
                if (product.status !== 1) {
                    radioGroupHtml += `
                        <div class="col-6">
                            <label class="custom-radio" style="opacity: 0.5;">
                                <input disabled type="radio" name="loan_type" />
                                <div class="radio-btn">
                                    <div class="content">
                                        <div class="mb-2">
                                            <img width="50px" src="data:image/svg+xml,${encodeURIComponent(
                                                product.icon
                                            )}" />
                                        </div>
                                        <h2>${product.name}</h2>
                                        <p class="skill">${
                                            product.description
                                        } (coming soon)</p>
                                        <span class="check-icon">
                                            <span class="icon"></span>
                                        </span>
                                    </div>
                                </div>
                            </label>
                        </div>`;
                } else {
                    radioGroupHtml += `
                        <div class="col-6">
                            <label class="custom-radio">
                                <input type="radio" name="loan_type" value="${
                                    product.id
                                }" onclick="checker(this)" ${
                        loanProducts.length === 1 && index === 0
                            ? "checked"
                            : ""
                    }>
                                <div class="radio-btn">
                                    <div class="content">
                                        <div class="mb-2">
                                            <img width="50px" src="data:image/svg+xml,${encodeURIComponent(
                                                product.icon
                                            )}" />
                                        </div>
                                        <h2>${product.name}</h2>
                                        <p class="skill">${
                                            product.description
                                        }</p>
                                        <span class="check-icon">
                                            <span class="icon"></span>
                                        </span>
                                    </div>
                                </div>
                            </label>
                        </div>`;
                }
            });
        }

        loan_products.innerHTML = radioGroupHtml;

        // Calculate and display the total number of loan products
    } catch (error) {
        // Handle errors if needed
    }

    //initial values
    slider_amount.step = 10000;
    slider_duration.setAttribute("max", 0);

    //next page
    //slider

    //get values

    function checker() {
        let resul_duration = document.getElementById("rl_duration");

        let loantype = document.querySelector(
            'input[name = "loan_type"]:checked'
        );
        let check_package = document.querySelector(
            'input[name = "package"]:checked'
        );
        slider_amount.step = 10000;

        console.log(loantype.value);
        if (loantype.value == "grz_loan") {
            apply_btn.disabled = true;
            //dvPassport.style.display = "block";
            //duration.style.display = "block";
            // time_frame.innerHTML = "Duration in months";
            //duration
            time_duration.value = slider_duration.value;

            //amount
            /*slider_amount.max = "2000000";
    update_side_amount.max = "2000000";
    slider_amount.min = "2000000";
    update_side_amount.min = "0000";
    update_side_amount.value = slider_amount.value;
*/
            console.log(checked_person.value);
            if (checked_person.value == "salary_advance") {
                let my_returns =
                    slider_amount.value * 0.21 * parseInt(time_duration.value) +
                    parseInt(slider_amount.value);
                // let my_returns = (slider_amount.value * 0.07) * parseInt((time_duration.value)) + parseInt((slider_amount.value));
                result_payment.innerHTML = number_format(my_returns);

                time_frame.innerHTML = "Duration in months";
                //duration
                time_duration.max = "24";
                slider_duration.max = "24";
                time_duration.value = slider_duration.value;
                //amount
                // slider_amount.max = "2000000";
                //update_side_amount.max = "2000000";
                update_side_amount.value = slider_amount.value;
                if (slider_amount.value >= 10000) {
                    if (time_duration.value > 0) {
                        apply_btn.disabled = false;
                        //apply_btn.style.backgroundColor = "#fec00f"
                        apply_btn.innerHTML = "APPLY NOW";
                    } else {
                        apply_btn.disabled = true;
                        apply_btn.innerHTML = "FINISH UP YOUR OPTIONS";
                    }
                } else {
                    apply_btn.disabled = true;
                    //
                    apply_btn.innerHTML = "FINISH UP YOUR OPTIONS";
                }
            } else if (checked_person.value == "collateral") {
                if (slider_amount.value >= 10000) {
                    if (time_duration.value > 0) {
                        apply_btn.disabled = false;
                        //apply_btn.style.backgroundColor = "#fec00f"
                        apply_btn.innerHTML = "APPLY NOW";
                    } else {
                        apply_btn.disabled = true;
                        apply_btn.innerHTML = "FINISH UP YOUR OPTIONS";
                    }
                } else {
                    apply_btn.disabled = true;
                    //
                    apply_btn.innerHTML = "FINISH UP YOUR OPTIONS";
                }
                time_frame.innerHTML = "Duration in months";
                //duration
                time_duration.max = "24";
                slider_duration.max = "24";
                time_duration.value = slider_duration.value;
                resul_duration.innerHTML = "months";
                let my_returns =
                    slider_amount.value * 0.02 * parseInt(time_duration.value) +
                    parseInt(slider_amount.value);
                result_payment.innerHTML = number_format(my_returns);

                //amount
                //slider_amount.max = "2000000";
                //update_side_amount.max = "2000000";
                //update_side_amount.value = slider_amount.value;
            } else {
                console.log("error");
                //slider_amount.max = "200000000";
                //update_side_amount.max = "200000000";
                result_amount.innerHTML = "slide to pick amount";
                result_payment.innerHTML = "pick amount";
                time_duration.value = slider_duration.value;
                update_side_amount.value = slider_amount.value;
                apply_btn.disabled = true;
                apply_btn.innerHTML = "FINISH ENTERING DETAILS!";
            }
        } else if (check_package.value == "sme") {
            dvPassport.style.display = "none";

            time_frame.innerHTML = "Duration in months";
            resul_duration.innerHTML = "months";

            //duration
            time_duration.max = "12";
            slider_duration.max = "12";
            time_duration.value = slider_duration.value;

            //amount
            slider_amount.max = "200000000";
            update_side_amount.max = "200000000";
            update_side_amount.value = slider_amount.value;

            if (slider_amount.value >= 10000) {
                if (time_duration.value > 0) {
                    apply_btn.disabled = false;
                    apply_btn.innerHTML = "APPLY NOW";
                } else {
                    apply_btn.disabled = true;
                    apply_btn.innerHTML = "FINISH UP YOUR OPTIONS";
                }
            } else {
                apply_btn.disabled = true;
                //
                apply_btn.innerHTML = "FINISH UP YOUR OPTIONS";
            }
            let my_returns =
                slider_amount.value * 0.07 * parseInt(time_duration.value) +
                parseInt(slider_amount.value);
            result_payment.innerHTML = number_format(my_returns);
        } else if (check_package.value == "sml") {
            if (slider_amount.value >= 10000) {
                if (time_duration.value > 0) {
                    apply_btn.disabled = false;
                    apply_btn.innerHTML = "APPLY NOW";
                } else {
                    apply_btn.disabled = true;
                    apply_btn.innerHTML = "FINISH UP YOUR OPTIONS";
                }
            } else {
                apply_btn.disabled = true;
                //
                apply_btn.innerHTML = "FINISH UP YOUR OPTIONS";
            }
            dvPassport.style.display = "none";
            time_frame.innerHTML = "Duration in months";
            resul_duration.innerHTML = "months";
            //duration
            time_duration.max = "4";
            slider_duration.max = "4";
            time_duration.value = slider_duration.value;

            //amount
            slider_amount.max = "2000000";
            update_side_amount.max = "2000000";
            update_side_amount.value = slider_amount.value;

            duration.style.display = "block";
            if (slider_duration.value == 1) {
                let my_returns =
                    slider_amount.value * 0.07 + parseInt(slider_amount.value);
                console.log(my_returns);
                result_payment.innerHTML = number_format(my_returns);
            } else if (slider_duration.value == 2) {
                let my_returns =
                    slider_amount.value * 0.07 + parseInt(slider_amount.value);
                console.log(my_returns);
                result_payment.innerHTML = number_format(my_returns);
            } else if (slider_duration.value == 3) {
                let my_returns =
                    slider_amount.value * 0.07 + parseInt(slider_amount.value);
                console.log(my_returns);
                result_payment.innerHTML = number_format(my_returns);
            } else if (slider_duration.value == 4) {
                let my_returns =
                    slider_amount.value * 0.07 + parseInt(slider_amount.value);
                console.log("4month");
                result_payment.innerHTML = number_format(my_returns);
            } else {
                console.log("no_month");
            }
        } else {
            console.log("error!");
            dvPassport.style.display = "none";
            apply_btn.disabled = true;
            apply_btn.innerHTML = "FINISH ENTERING DETAILS!";
        }
        //console.log(slider_amount);

        //value updates
        time_duration.value = slider_duration.value;
        time_duration.value = slider_duration.value;
        //show results
        result_amount.innerHTML = update_side_amount.value;
        result_amount.innerHTML = number_format(slider_amount.value);
        result_duration.innerHTML = time_duration.value;
    }
});

//alert(apiUrl);
