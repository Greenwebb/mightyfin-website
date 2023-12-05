<style>
    
.main-content .wizard-form .progressbar-list::before{
content: " ";
background-color: rgb(155, 155, 155);
border: 10px solid #fff;
border-radius: 50%;
display: block;
width: 30px;
height: 30px;
margin: 9px auto;
box-shadow: 1px 1px 3px #606060;
transition:all;
}
.main-content .wizard-form .progressbar-list::after{
content: "";
background-color: rgb(155, 155, 155);
padding: 0px 0px;
position: absolute;
top: 14px;
left: -50%;
width: 100%;
height: 2px;
margin: 9px auto;
z-index: -1;
transition: all 0.8s;
}
.main-content .wizard-form .progressbar-list.active::after{
    background-color: #a435dc;
}
.main-content .wizard-form .progressbar-list:first-child::after{
    content: none;
}
.main-content .wizard-form .progressbar-list.active::before{
    font-family: "Font Awesome 5 free";
    content: "\f00c";
    font-size: 11px;
    font-weight: 600;
    color: #fff;
    padding: 6px;
    background-color: #b535dc;
    border: 1px solid #9935dc;
    box-shadow: 0 0 0 7.5px rgb(176 60 70 / 11%);
}
.progressbar-list{
    color:#6f787d;
}
.active{
    color:#000;
}
/* card */
.card img{
    width: 40px;
}
.card{
    border: 3px solid #fbf6f6;
    cursor: pointer;
}
.active-card{
    color:#a235dc;
    font-weight: bold;
    border: 3px solid #aa35dc;
}
.form-check-input:focus {
    box-shadow: none;
}
.bg-color-info{
    background-color:#dc3545 !important;
}
.border-color{
    border-color: #ececec;
}
.btn{
    padding:16px 30px;
}
.back-to-wizard{
    transform: translate(-50%, -139%) !important;
}
.bg-success-color{
    background-color:#87D185;
}
.bg-success-color:focus{
    box-shadow: 0 0 0 0.25rem rgb(55 197 20 / 25%);
}

/* Input Field Style */
/* General styling for all inputs */
input {
    margin-top: 15px;
    padding: 10px;
    border: 2px solid #3498db; /* Border color */
    border-radius: 5px; /* Rounded corners */
    font-size: 24px; /* Increased font size */
    font-family: 'Arial', sans-serif;
}

/* Styling for text-type inputs */
input[type='text'] {
    text-align: right;
}

/* Hover effect */
input:hover {
    border-color: #2980b9; /* Border color on hover */
}

/* Focus effect */
input:focus {
    outline: none;
    border-color: #ab3ce7; /* Border color when focused */
    box-shadow: 0 0 10px rgba(185, 60, 231, 0.8); /* Box shadow when focused */
}


/* ranger */
@import url("https://fonts.googleapis.com/css2?family=Creepster&family=Roboto:wght@700&display=swap");

/* .container {
	height: 100vh;
	display: flex;
	align-items: center;
	justify-content: center;
} */

.range-slider {
	position: relative;
	width: 80vmin;
	height: 20vmin;
}

.range-slider_input {
	width: 100%;
	position: absolute;
	top: 50%;
	z-index: 3;
	transform: translateY(-50%);
	-webkit-appearance: none;
  appearance: none;
  width: 100%;
  height: 4px;
  opacity: 0;
	margin: 0;
}

.range-slider_input::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 100px;
  height: 100px;
  cursor: pointer;
	border-radius: 50%;
	opacity: 0;
}

.range-slider_input::-moz-range-thumb {
  width: 14vmin;
  height: 14vmin;
  cursor: pointer;
	border-radius: 50%;
	opacity: 0;
}

.range-slider_thumb {
	width: 14vmin;
	height: 14vmin;
	border: 0.6vmin solid #303030;
	border-radius: 50%;
	position: absolute;
	left: 0;
	top: 50%;
	transform: translateY(-50%);
	background-color: #f4f4f4;
	display: flex;
	justify-content: center;
	align-items: center;
	font-weight: 700;
	font-size: 4vmin;
	color: #303030;
	z-index: 2;
}

.range-slider_line {
	height: 0.5vmin;
	width: 100%;
	background-color: #e1e1e1;
	top: 50%;
	transform: translateY(-50%);
	left: 0;
	position: absolute;
	z-index: 1;
}

.range-slider_line-fill {
	position: absolute;
	height: 0.5vmin;
	width: 0;
	background-color: #303030;
}
</style>
<script src="https://jsuites.net/v4/jsuites.js"></script>
<div class="content-body">
        <div class="">
            {{-- <h2 class="mx-4">Get a Loan</h2> --}}
            
            <!-- section -->
            <section>
                <!-- container -->
                <div class="container">
                <!-- main content -->
                <div class="main-content">
                    <!-- alert box -->
                    <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-8">
                        <!-- svg -->
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                        </svg>
                        <!-- /svg -->
                        <div class="alert alert-danger d-flex align-items-center mt-3 d-none mb-0" id="alertBox" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div>
                                Por favor selecciona una accion!
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- alert box -->
                    <!-- row -->
                    <div class="row justify-content-center pt-0 p-4" id="wizardRow">
                    <!-- col -->
                    <div class="col-md-10 text-center">
                        <!-- wizard -->
                        <div class="wizard-form py-4 my-2">
                        <!-- ul -->
                        <ul id="progressBar" class="progressbar px-lg-5 px-0">
                            <li id="progressList-1"
                            class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list active">
                            Amount </li>
                            <li id="progressList-2"
                            class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list">
                            Loan</li>
                            <li id="progressList-3"
                            class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list">
                            Repayment</li>
                            <li id="progressList-4"
                            class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list">
                            Requirements</li>
                        </ul>
                        <!-- /ul -->
                        </div>
                        <!-- /wizard -->
                    </div>
                    <!-- /col -->
                    </div>
                    <!-- /row -->
                    <!-- row -->
                    <div class="row justify-content-center" id="cardSection">
                    <!-- col -->
                    <div class="col-lg-7 col-md-8">
                        <h3 class="fw-bold pt-3">Loan Details</h3>
                        <p class="small pb-2">How much would you like to borrow?</p>
                        <!-- cards -->
                        <div>
                            <div class="col-md-12">
                                <input type="text" contentEditable='true' data-mask='K #,##0.00' name="amount"/>
                            </div>
                        </div>
                        {{-- <div class="row row-cols-1 row-cols-lg-2 g-4 pb-5 border-bottom">
                            <div class="col">
                                <div class="card text-center h-100 py-5 shadow-sm">
                                <i class="fas fa-microphone fa-beat-fade card-img-top mx-auto img-light fs-1 pb-1"></i>
                                <div class="card-body px-0">
                                    <h5 class="card-title title-binding">Locutor</h5>
                                    <p class="card-text">
                                </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card text-center h-100 py-5"><i class="fas fa-headphones fa-beat-fade  card-img-top mx-auto img-light fs-1 pb-1"></i>
                                <div class="card-body px-0">
                                    <h5 class="card-title title-binding">Controles</h5>
                                </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- /cards -->
                        <!-- NEXT BUTTON-->
                        <button type="button" class="btn text-white float-end next mt-4 rounded-3 bg-color-info">Continue</button>
                        <!-- /NEXT BUTTON-->
                    </div>
                    <!-- /col -->
                    </div>
                    <!-- /row -->
                    <!-- row -->
                    <div class="row justify-content-center form-business">
                    <!-- col -->
                    <div class="col-lg-7 col-md-8">
                        <h3 class="fw-bold pt-5">Loan Detail</h3>
                        <p class="small pb-5">What is your reason for a loan?</p>
                        <!-- cards -->
                        <div class="row row-cols-1 row-cols-lg-3 g-4 pb-5 border-bottom">
                        <div class="col">
                            <div class="card text-center h-100 py-5">
                            <i class="fas fa-users card-img-top mx-auto img-light fs-1"></i>
                            <div class="card-body px-0">
                                <h5 class="card-title title-binding">GRZ Loan</h5>
                                <p class="card-text">Civil servant<br>based loan</p>
                            </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-center h-100 py-5">
                            <i class="fas fa-briefcase card-img-top mx-auto img-light fs-1"></i>
                            <div class="card-body px-0">
                                <h5 class="card-title title-binding">Business Loan</h5>
                                <p class="card-text">For starting a business</p>
                            </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-center h-100 py-5">
                            <i class="fas fa-store card-img-top mx-auto img-light fs-1"></i>
                            <div class="card-body px-0 pt-4">
                                <h5 class="card-title title-binding">SME Loans</h5>
                                <p class="card-text">Small / Medium / Enterprise Loan</p>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- /cards -->
                        <!-- NEXT BUTTON-->
                        <button type="button" class="btn btn-dark text-white float-start back mt-4 rounded-3">Go Back</button>
                        <button type="button" class="btn text-white float-end next mt-4 rounded-3 bg-color-info">Next</button>
                        <!-- /NEXT BUTTON-->
                    </div>
                    <!-- /col -->
                    </div>
                    <!-- /row -->
                    <!-- row -->
                    <div class="row justify-content-center form-business">
                    <!-- col -->
                        <div class="col-lg-7 col-md-8">
                        <h3 class="fw-bold pt-5">Repayment Options</h3>
                        <p class="small pb-5">How will you pay back</p>
                        <div>
                            <div class="container">
                                <div class="range-slider">
                                    <div id="slider_thumb" class="range-slider_thumb"></div>
                                    <div class="range-slider_line">
                                    <div id="slider_line" class="range-slider_line-fill"></div>
                                    </div>
                                    <input id="slider_input" class="range-slider_input" type="range" value="20" min="0" max="100">
                                </div>
                            </div>
                        </div>
                        <!-- cards -->
                        {{-- <div class="row row-cols-1 row-cols-lg-3 g-4 pb-5 border-bottom">
                            <div class="col">
                            <div class="card text-center h-100 py-5">
                                <i class="fas fa-hand-holding-medical card-img-top mx-auto img-light fs-1"></i>
                                <div class="card-body px-0">
                                <h5 class="card-title title-binding">Texto 1</h5>
                                <p class="card-text">
                                </div>
                            </div>
                            </div>
                            <div class="col">
                            <div class="card text-center h-100 py-5">
                                <i class="fas fa-people-carry card-img-top mx-auto img-light fs-1"></i>
                                <div class="card-body px-0">
                                <h5 class="card-title title-binding">Texto 2</h5>
                                </div>
                            </div>
                            </div>
                            <div class="col">
                            <div class="card text-center h-100 py-5">
                                <i class="fas fa-chalkboard-teacher card-img-top mx-auto img-light fs-1"></i>
                                <div class="card-body px-0 pt-4">
                                <h5 class="card-title title-binding">Texto 3</h5>
                                </div>
                            </div>
                            </div>
                        </div> --}}
                        <!-- /cards -->
                        <!-- NEXT BUTTON-->
                        <button type="button" class="btn btn-dark text-white float-start back mt-4 rounded-3">Go Back</button>
                        <button type="button" class="btn text-white float-end next mt-4 rounded-3 bg-color-info confirm">Continue</button>
                        <!-- /NEXT BUTTON-->
                        </div>
                        <!-- /col -->
                    </div>
                    <!-- /row -->
                    <!-- row -->
                    <div class="row justify-content-center py-5 form-business">
                    <!-- col -->
                    <div class="col-lg-7 col-md-8" id="successMessage">
                        <!-- success message -->
                        <div class="position-relative success-content">
                        <img src="https://uploads-ssl.webflow.com/5ef0df6b9272f7410180a013/60c0e28575cd7c21701806fd_q1cunpuhbdreMPFRSFLyfUXNzpqv_I5fz_plwv6gV3sMNXwUSPrq88pC2iJijEV7wERnKXtdTA0eE4HvdnntGo9AHAWn-IcMPKV-rZw1v75vlTEoLF4OdNqsRb7C6r7Mvzrm7fe4.png" class="w-100" id="successImage" alt="success-message">
                        <a href="#" type="button" class="btn bg-success-color py-2 back-to-wizard position-absolute top-100 start-50 translate-middle text-white">Volver a comenzar</a>
                        </div>
                        <!-- /success message -->
                    </div>
                    <!-- /col -->
                    <!-- col -->
                    <div class="col-lg-7 col-md-8" id="successForm">
                        <div class="mb-5 pb-5">
                        <!-- Final step -->
                        <div class="alert alert-primary text-center" role="alert">
                            <h5 class="p-4">Encontraras tu grabacion en iheart radio app.</h5>
                        </div>
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                            Gracias por participar
                            </label>
                        </div>
                        <!-- /Final step -->
                        </div>
                        <!-- NEXT BUTTON-->
                        <button type="button" class="btn btn-dark text-white float-start back rounded-3">Go Back</button>
                        <button type="submit" class="btn text-white float-end submit-button rounded-3 bg-color-info">Finalizar</button>
                        <!-- /NEXT BUTTON-->
                    </div>
                    <!-- /col -->
                    </div>
                </div>
                <!-- /main content -->
                </div>
                <!-- /container -->
            </section>
            <!-- /section -->

        </div>
    </div>
    <!-- pickdate -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- <script src="{{ asset('public/js/zan/dist/zangdar.min.js')}}"></script> --}}
    <script type="text/javascript">
        $(document).ready(function () {
            // hidden things
            $(".form-business").hide();
            $("#successMessage").hide();
            // next button
            $(".next").on({
                click: function () {
                    // select any card
                    var getValue = $(this).parents(".row").find(".card").hasClass("active-card");
                    if (getValue) {
                        $("#progressBar").find(".active").next().addClass("active");
                        $("#alertBox").addClass("d-none");
                        $(this).parents(".row").fadeOut("slow", function () {
                            $(this).next(".row").fadeIn("slow");
                        });
                        
                    } else {
                        $("#progressBar").find(".active").next().addClass("active");
                        $("#alertBox").addClass("d-none");
                        $(this).parents(".row").fadeOut("slow", function () {
                            $(this).next(".row").fadeIn("slow");
                        });
                    // $("#alertBox").removeClass("d-none");
                    }
                }
            });
            // back button
            $(".back").on({
                click: function () {
                    $("#progressBar .active").last().removeClass("active");
                    $(this).parents(".row").fadeOut("slow", function () {
                        $(this).prev(".row").fadeIn("slow");
                    });
                }
            });
            //finish button
            $(".submit-button").on({
                click: function () {
                    $("#wizardRow").fadeOut(300);
                    $(this).parents(".row").children("#successForm").fadeOut(300);
                    $(this).parents(".row").children("#successMessage").fadeIn(3000);
                }
            });
            //Active card on click function
            $(".card").on({
                click: function () {
                    $(this).toggleClass("active-card");
                    $(this).parent(".col").siblings().children(".card").removeClass("active-card");
                }
            });
            //back to wizard
            $(".back-to-wizard").on({
                click: function () {
                    location.reload(true);
                }
            });
        }); 



        const slider_input = document.getElementById('slider_input'),
        slider_thumb = document.getElementById('slider_thumb'),
        slider_line = document.getElementById('slider_line');

        function showSliderValue() {
            slider_thumb.innerHTML = slider_input.value;
            const bulletPosition = (slider_input.value /slider_input.max),
                    space = slider_input.offsetWidth - slider_thumb.offsetWidth;

            slider_thumb.style.left = (bulletPosition * space) + 'px';
            slider_line.style.width = slider_input.value + '%';
        }

        showSliderValue();
        window.addEventListener("resize",showSliderValue);
        slider_input.addEventListener('input', showSliderValue, false);
    </script>
    
</div>
