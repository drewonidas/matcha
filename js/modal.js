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
    $("#profile_page").hide();
    $("#sign_up_form").hide();
    sendRequest("status", "");

    function sendRequest(reqType, args) {
      $.post("php/RequestServiceController.php",
        "reqType=" + reqType + "&args=" + args,
        function(response) {
            switch (reqType) {
              case "login":
                var profiles = JSON.parse(response);
                console.log(profiles);
                if (profiles.length > 0)
                  response = "ok";
                else {
                  $("#response").text("Incorrect details. Please try again");
                }
              case "status":
                if (response == "ok") {
                  $("#access_page").hide();
                } else {
                  $("#access_page").show();
                }
                break;
              case "logout":
                $("#access_page").show();
                break;
              default:
                break;
            }
        });
    }
    $("#sign_up_btn").click(function() {
        $("#sign_up_form").show();
        $("#sign_in_form").hide();
    });
    $("#sign_in_btn").click(function() {
        $("#sign_in_form").show();
        $("#sign_up_form").hide();
    });
    // console.log("fuuuuuck!!!!");
    $("#profile_btn").click(function() {
        $("#profile_page").toggle();
    });
    $("#sign_out_btn").click(function() {
        sendRequest("logout", "");
    });
    /*
        user login
    */
    $("#submit_login").click(function() {
        var name = $("#uname").val();
        var pwd = $("#password").val();
        //var data = $(this).serialize();
        var args = {"username" : name, "pwd" : pwd};
        sendRequest("login", JSON.stringify(args));
        //console.log(response);
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
        var args = {"username" : uname, "fname" : fname, "lname" : lname,
                    "email" : email, "pwd" : pwd1};
        //var data = $(this).serialize();
        sendRequest("register", JSON.stringify(args));
    });
});
