$(document).ready(function () {
    $('#contactForm').validate({ // initialize the plugin

        rules: {
            fullname: {
                required: true,
                minlength: 3
            },
            phone: {
                required: true,
                digits: true,
                minlength: 9,
                maxlength: 14
            },
            email: {
                required: true,
                email: true
            },
            message: {
                required: true,
                minlength: 10
            }
        },


        errorElement: "span",
        errorLabelContainer: '.errorTxt',

        submitHandler: function (form) {
            form.submit();
        }
    });

});
