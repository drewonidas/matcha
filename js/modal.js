/**
* @Author: Dregend Drewonidas <root>
* @Date:   Wednesday, October 26, 2016 5:49 PM
* @Email:  dlaminiandrew@gmail.com
* @Last modified by:   root
* @Last modified time: Thursday, November 10, 2016 2:30 AM
* @Last modified time: Thursday, November 10, 2016 2:30 AM
* @License: maDezynIzM.E. 2016
*/

// click events
$(document).ready(function() {
    // $("#sign_up_form").hide();
    // $("#sign_up_btn").click(function() {
    //     $("#sign_up_form").show();
    //     $("#sign_in_form").hide();
    // });
    // $("#sign_in_btn").click(function() {
    //     $("#sign_in_form").show();
    //     $("#sign_up_form").hide();
    // });
    // $("#profile_btn").click(function() {
    //    $("#profile").toggle();
    $("#sign_out_btn").click(function() {
        $.ajax({
            type: "POST",
            url: "php/logout.php",
            data: "",
            dataType: "text",
            success: function(user_data) {
                render('#sign-up');
            }
        });
    });
    /*
        user login
    */
    $("#submit_login").click(function() {
        var name = $("#uname").val();
        var pwd = $("#password").val();
        //var data = $(this).serialize();
        //console.log("blck");
        $.get("php/login.php",
            "uname=" + name + "&upwd=" + pwd,
            function(result) {
                console.log(result);
                if (result[0] != 'FALSE') {
                    render('');
                    //console.log(result);
                } else {
                    console.log("jj");
                }
            });
    });
    /*
        user registration
    */
    $("#submit_reg").click(function() {
        var uname = $("#new_uname").val();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var pwd1 = $("#password1").val();
        var pwd2 = $("#password2").val();
        var user_info = "uname=" + uname + "&fname=" + fname +
                     "&lname=" + lname + "&email=" + email +
                      "&pwd=" + pwd1;
        //var data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "php/register.php",
            data: user_info,
            dataType: "text",
            success: function(response) {
                $("#response").html(response);
                // console.log(response);
                // if (response == 'TRUE') {
                //
                //     // $("#sign_in").fadeIn(1000);
                //     // $("#sign_up").fadeOut(1000);
                // } else {
                //   console.log("jj");
                //   $("#response").html("wrong data name");
                // }
            }
        });
    });
});
