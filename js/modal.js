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
              case "status":
                var profiles = JSON.parse(response);
                if (profiles == "error") {
                  $("#response").text("Incorrect details. Please try again");
                  $("#access_page").show();
                } else {
                  $("#access_page").hide();
                  var currUser = profiles.pop();
                  var username = $("<h1></h1>").text(currUser.username);
                  var rating = $("<p></p>").text("Rating: " + currUser.rating);
                  var lastIn = $("<p></p>").text("Last in: " + currUser.last_in);
                  var fname = $("<p></p>").text("First names: " + currUser.first_name);
                  var lname = $("<p></p>").text("Last name: " + currUser.last_name);
                  var gender = $("<p></p>").text("Sex: " + currUser.gender);
                  var sexPref = $("<p></p>").text("I Like: " + currUser.sexual_pref);
                  var bio = $("<p></p>").text("About me: " + currUser.bio);
                  $("#stats").append(username, rating, lastIn);
                  $("#user_info").append(fname, lname, gender, sexPref, bio);

                  var miniProfileElem;
                  var userDataElem;
                  var tmp;
                    for (var i = 0; i < profiles.length; i++) {
                      miniProfileElem = $("<div></div>");
                      miniProfileElem.addClass("flex_col_container");
                      $("#profiles").append(miniProfileElem);
                         console.log(profiles[i]);
                         tmp = null;
                      for (tmp in profiles[i]) {
                    //    break;
                        userDataElem = $("<p></p>");
                        userDataElem.text(tmp + ": " + profiles[i][tmp]);
                        miniProfileElem.append(userDataElem);
                      }
                    }
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
    $("#profile_btn").click(function() {
        $("#profile_page").toggle();
        $("#browser_page").toggle();
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
