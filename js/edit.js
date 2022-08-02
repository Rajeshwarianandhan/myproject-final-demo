$(document).ready(function () {

    $.ajax({
        url: "./php/home.php",
        type: "post",
        dataType: "JSON",
        success: function (user) {
            $("#fname").val(user.fname);
            $("#lname").val(user.lname);
            $("#email").val(user.email);
            $("#password").val(user.password);
            $("#mobile").val(user.mobile);
            $("#dob").val(user.dob);
        }
    });

});
