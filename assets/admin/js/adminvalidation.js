$(document).ready(function() {
//admin login validation
    $("#loginfrm").validate({
        errorClass: 'admin-error',
        rules: {
            username: {
                required: true
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            username: {
                required: "The Username field is required!",
            }, password: {
                required: "The Password field is required!",
                minlength: "The Password field must be at least 6 characters in length!"
            }
        },
        highlight: function(element, errorClass, validClass) {
            return false;  // ensure this function stops
        },
        unhighlight: function(element, errorClass, validClass) {
            return false;  // ensure this function stops
        },
        errorElement: "div",
        errorPlacement: function(error, element) {

            if (element.attr("name") == "username") {
                error.appendTo($('#username_error'));
            }

            if (element.attr("name") == "password") {
                error.appendTo($('#password_error'));
            }
        }

    });

    $("#add_product,#edit_product").validate({
        errorClass: 'admin-error',
        rules: {
            name: {
                required: true,
                minlength: 2,
            },
            amount: {
                required: true,
                number: true,
            },
            status: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "The name field is required!",
                minlength: "The name field must be at least 2 characters in length!"
            }, amount: {
                required: "The amount field is required!",
                number: "The amount field must be numeric!",
            }, status: {
                required: "The status field is required!",
            }
        },
        highlight: function(element, errorClass, validClass) {
            return false;  // ensure this function stops
        },
        unhighlight: function(element, errorClass, validClass) {
            return false;  // ensure this function stops
        },
        errorElement: "div",
    });

    $("#add_epin").validate({
        errorClass: 'admin-error',
        rules: {
            sponser_affiliate_id: {
                number: true,
            },
            number_of_code: {
                required: true,
                number: true,
            },
            transaction_password: {
                required: true,
                minlength: 2
            },
            product_id: {
                required: true,
                number: true,
            }
        },
        messages: {
            sponser_affiliate_id: {
                number: "The sponser affiliate id field must be numeric!",
            }, number_of_code: {
                required: "The number of epin field is required!",
                number: "The number of epin field must be numeric!",
            }, transaction_password: {
                required: "The transaction password field is required!",
                minlength: "The name field must be at least 4 characters in length!"
            }, product_id: {
                required: "The status field is required!",
                number: "The status field is required!",
            }
        },
        highlight: function(element, errorClass, validClass) {
            return false;  // ensure this function stops
        },
        unhighlight: function(element, errorClass, validClass) {
            return false;  // ensure this function stops
        },
        errorElement: "div",
    });

    $("#edit_epin").validate({
        errorClass: 'admin-error',
        rules: {
            sponser_affiliate_id: {
                number: true,
            },
            status: {
                required: true,
            },
            epin_code: {
                required: true,
            },
            epin_sr_no: {
                required: true,
            },
            transaction_password: {
                required: true,
                minlength: 2
            },
            product_id: {
                required: true,
                number: true,
            }
        },
        messages: {
            sponser_affiliate_id: {
                number: "The sponser affiliate id field must be numeric!",
            }, status: {
                required: "The status field is required!",
            }, transaction_password: {
                required: "The transaction password field is required!",
                minlength: "The name field must be at least 4 characters in length!"
            }, product_id: {
                required: "The status field is required!",
                number: "The status field is required!",
            }
        },
        highlight: function(element, errorClass, validClass) {
            return false;  // ensure this function stops
        },
        unhighlight: function(element, errorClass, validClass) {
            return false;  // ensure this function stops
        },
        errorElement: "div",
    });

    $("#edit_staff").validate({
        errorClass: 'admin-error',
        rules: {
            username: {
                required: true,
            },
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            primary_email: {
                required: true,
                email:true
            },
            secondary_email: {
                required: true,
                email:true
            },
            phone: {
                required: true,
            },
            status: {
                required: true,
            },role:{
                required:true,
            }
        },
        messages: {
            username: {
                required: "Username field is required!",
            }, first_name: {
                required: "The firstname field is required!",
            }, last_name: {
                required: "The last name field is required!",
            },
            primary_email: {
                required: "The Primary email field is required!",
                email:"Invalid email!"
            }, secondary_email: {
                required: "The seondary email field is required!",
                email:"Email is invalid!"
            }, phone: {
                required: "Phone is required!"
            }, status: {
                required: "The status field is required!",
            },role:{
                required:"The role field is required"
            }
        },
        highlight: function(element, errorClass, validClass) {
            return false;  // ensure this function stops
        },
        unhighlight: function(element, errorClass, validClass) {
            return false;  // ensure this function stops
        },
        errorElement: "div",
    });
    
    $("#add_staff").validate({
        errorClass: 'admin-error',
        rules: {
            username: {
                required: true,
            },
            password:{
              required:true,  
            },
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            primary_email: {
                required: true,
                email:true
            },
            secondary_email: {
                required: true,
                email:true
            },
            phone: {
                required: true,
            },
            status: {
                required: true,
            },role:{
                required:true,
            }
        },
        messages: {
            username: {
                required: "Username field is required!",
            },password:{
                required:"Password field is required!",
            },
            first_name: {
                required: "The firstname field is required!",
            }, last_name: {
                required: "The last name field is required!",
            },
            primary_email: {
                required: "The Primary email field is required!",
                email:"Invalid email!"
            }, secondary_email: {
                required: "The seondary email field is required!",
                email:"Email is invalid!"
            }, phone: {
                required: "Phone is required!"
            }, status: {
                required: "The status field is required!",
            },role:{
                required:"The role field is required"
            }
        },
        highlight: function(element, errorClass, validClass) {
            return false;  // ensure this function stops
        },
        unhighlight: function(element, errorClass, validClass) {
            return false;  // ensure this function stops
        },
        errorElement: "div",
    });

});

  