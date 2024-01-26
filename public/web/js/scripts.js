function scroll_to_class(element_class, removed_height) {
    var scroll_to = $(element_class).offset().top - removed_height;
    if ($(window).scrollTop() != scroll_to) {
        $("html, body").stop().animate({ scrollTop: scroll_to }, 0);
    }
}

function bar_progress(progress_line_object, direction) {
    var number_of_steps = progress_line_object.data("number-of-steps");
    var now_value = progress_line_object.data("now-value");
    var new_value = 0;
    if (direction == "right") {
        new_value = now_value + 100 / number_of_steps;
    } else if (direction == "left") {
        new_value = now_value - 100 / number_of_steps;
    }
    progress_line_object
        .attr("style", "width: " + new_value + "%;")
        .data("now-value", new_value);
}

jQuery(document).ready(function () {
    /*
        Form
    */
    $(".f1 fieldset:first").fadeIn("slow");

    $(".f1 input[required]").on("focus", function () {
        $(this).removeClass("input-error");
    });

    // next step
    $(".f1 .btn-next").on("click", function () {
        var parent_fieldset = $(this).parents("fieldset");
        var next_step = true;
        // navigation steps / progress steps
        var current_active_step = $(this)
            .parents(".f1")
            .find(".f1-step.active");
        var progress_line = $(this).parents(".f1").find(".f1-progress-line");

        // fields validation
        parent_fieldset.find("input[required]").each(function () {
            var inputValue = $(this).val();
            var inputType = $(this).attr("type");
            var isValid = true;

            // Validate based on input type
            switch (inputType) {
                case "text":
                    // Add your custom validation for text input type
                    // Example: Check if it contains only alphabets
                    isValid = /^[a-zA-Z]+$/.test(inputValue);
                    break;

                case "number":
                    // Add your custom validation for number input type
                    // Example: Check if it is a valid number
                    isValid = !isNaN(inputValue);
                    break;

                case "tel":
                    // Add your custom validation for phone input type
                    // Example: Check if it is a valid phone number
                    isValid = /^\d{9}$/.test(inputValue);
                    break;

                case "email":
                    // Add your custom validation for email input type
                    // Example: Check if it is a valid email address
                    isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(inputValue);
                    break;
            }

            if (inputValue === "" || !isValid) {
                $(this).addClass("input-error");
                next_step = false;
            } else {
                $(this).removeClass("input-error");
            }
        });

        // fields validation

        if (next_step) {
            parent_fieldset.fadeOut(400, function () {
                // change icons
                current_active_step
                    .removeClass("active")
                    .addClass("activated")
                    .next()
                    .addClass("active");
                // progress bar
                bar_progress(progress_line, "right");
                // show next step
                $(this).next().fadeIn();
                // scroll window to beginning of the form
                scroll_to_class($(".f1"), 20);
            });
        }
    });

    // previous step
    $(".f1 .btn-previous").on("click", function () {
        // navigation steps / progress steps
        var current_active_step = $(this)
            .parents(".f1")
            .find(".f1-step.active");
        var progress_line = $(this).parents(".f1").find(".f1-progress-line");

        $(this)
            .parents("fieldset")
            .fadeOut(400, function () {
                // change icons
                current_active_step
                    .removeClass("active")
                    .prev()
                    .removeClass("activated")
                    .addClass("active");
                // progress bar
                bar_progress(progress_line, "left");
                // show previous step
                $(this).prev().fadeIn();
                // scroll window to beginning of the form
                scroll_to_class($(".f1"), 20);
            });
    });

    // submit
    $(".f1").on("submit", function (e) {
        // Fields validation
        let isValid = true;
        $(this)
            .find('input[required]')
            .each(function () {
                if ($(this).val() == "") {
                    e.preventDefault();
                    $(this).addClass("input-error");
                    isValid = false;
                } else {
                    $(this).removeClass("input-error");
                }
            });

        // If all inputs are valid, proceed to submit the form data to the API
        if (isValid) {
            e.preventDefault(); // Prevent the default form submission

            // Gather data from the form
            const formData = {};
            $(this)
                .find("input")
                .each(function () {
                    formData[$(this).attr("name")] = $(this).val();
                });

            // Convert the formData object to JSON
            const jsonData = JSON.stringify(formData);
            console.log(jsonData)

            // Your API endpoint URL
            const apiUrl = "api/request-for-loan";

            // Make a POST request to the API using fetch
            fetch(apiUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    // Add any additional headers if needed
                },
                body: jsonData,
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(
                            `HTTP error! Status: ${response.status}`
                        );
                    }
                    return response.json();
                })
                .then((data) => {
                    // Handle the success response from the API
                    console.log("API Response:", data);
                })
                .catch((error) => {
                    // Handle errors
                    console.error("API Error:", error);
                });
        }
    });
});
