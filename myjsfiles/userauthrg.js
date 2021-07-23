// Regex to validate email
$.validator.methods.email = function(value, element) {
    return this.optional(element) || /[a-z0-9]+@[a-z]+\.[a-z]+/.test(value);
}


// Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='regform']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            email: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true,
                remote: {
                    url: "functs/check-email.php", // PHP FIle to if email already exists
                    type: "post",
                    data: {
                        email: function() {
                            return $("#email").val();
                        }
                    }
                }
            },
            password: {
                required: true,
                minlength: 5
            },
            password2: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
            name: {
                required: true,
            },
            surname: {
                required: true,
            },
            dept: {
                required: true,
            },
            age: {
                required: true,
                min: 15 + Number.MIN_VALUE
            },

        },
        // Specify validation error messages
        messages: {
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            password2: {
                required: "Please provide a confirm password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Password and confirmation must be same"
            },
            email: {
                required: "Please enter your email address.",
                email: "Please enter a valid email address.",
                remote: jQuery.validator.format("{0} is already taken.")
            },
            name: {
                required: "Please enter your first name .",
            },
            surname: {
                required: "Please enter your family name .",
            },
            dept: {
                required: "Please enter valid dept name .",
            }

        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            //console.log("Yeee");	
            setTimeout(function() {
                form.submit();
            }, 3000); // in milliseconds
            iziToast.success({
                title: 'OK',
                message: 'Wait while we redirect you!',
                position: 'center',
                timeout: 3000,
            });

            //form.submit();	  
        }

    });
});