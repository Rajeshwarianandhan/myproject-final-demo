$(document).ready(function () {

    $.ajax({
        url: "./php/home.php",
        type: "post",
        dataType: "JSON",
        success: function (user) {
            $("#name").html('welcome'+' '+ user.fname);
            $("#fname").html(user.fname);
            $("#lname").html(user.lname);
            $("#email").html(user.email);
            $("#mobile").html(user.mobile);
            $("#dob").html(user.dob);
        }
    });

});
