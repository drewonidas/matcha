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
    $("#access_page").hide();
    $("#profile_page").hide();
    $("#sign_up_form").hide();
    $("#sign_up_btn").click(function() {
        $("#sign_up_form").show();
        $("#sign_in_form").hide();
    });
    $("#sign_in_btn").click(function() {
        $("#sign_in_form").show();
        $("#sign_up_form").hide();
    });
    // console.log("fuuuuuck!!!!");
    var data = null;
    $("#profile_btn").click(function() {
      var status = sendRequest("reqType=status");
      console.log(data);
      if (data === 0) {
        $("#access_page").toggle();
      }
      else {
        $("#profile_page").toggle();
      }
      //  console.log("biiiiiiitch!!!!");
    });
    // $("#access_page").show();
    $("#sign_out_btn").click(function() {
        console.log(sendRequest("reqType=logout"));
    });
    /*
        user login
    */
    $("#submit_login").click(function() {
        var name = $("#uname").val();
        var pwd = $("#password").val();
        //var data = $(this).serialize();
        var args = "reqType=login" + "&username=" + name + "&pwd=" + pwd;
        console.log(sendRequest(args));
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
        var args = "reqType=register" + "&username=" + uname + "&fname=" + fname +
                     "&lname=" + lname + "&email=" + email +
                      "&pwd=" + pwd1;
        //var data = $(this).serialize();
        console.log(sendRequest(args));
    });

    function sendRequest(args) {
      $.post("php/RequestServiceController.php", args,
        function(response) {
            data = JSON.parse(response);
            //return response;
        }, "json");
    }
});
