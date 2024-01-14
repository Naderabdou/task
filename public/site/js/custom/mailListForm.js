$(document).ready(function () {
    $('#mailListForm').validate({ // initialize the plugin

        rules: {
            fullname: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
        },


        errorElement: "span",
        errorLabelContainer: '.errorTxt',

        submitHandler: function (form) {
            form.submit();
        }
    });

});
