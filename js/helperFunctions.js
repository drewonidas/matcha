/**
* @Author: Dregend Drewonidas <root>
* @Date:   Wednesday, November 9, 2016 9:24 PM
* @Email:  dlaminiandrew@gmail.com
* @Last modified by:   root
* @Last modified time: Saturday, November 12, 2016 1:36 AM
* @License: maDezynIzM.E. 2016
*/

/*
function isSignedIn() {
    var tmp = '';

    $.get("php/check.php",
        function(result) {
            tmp = result;
            console.log(tmp);
        }, "json");
    return (tmp);
}

function sendRequest(reqType, args) {
    $.post("php/RequestServiceController.php",
        "reqType=" + reqType + "&args=" + args, tmp);
}
// );
function tmp(response) {
    var userData = JSON.parse(response);
    console.log(userData);
    switch (dummy) {
        case "status":
            if (userData === "empty") {
                $("#loader").hide();
                $("#app_access").show();
            } else
                $("#app_access").hide();
            break;
        case "login":
            if (userData === "notFound") {
                alert("Incorrect login details");
            } else {
                $("#app_access").hide();
                $("#loader").show();
            }
            /!*var profiles = JSON.parse(response);
             if (profiles == "error") {
             $("#app_access").show();
             $("#app_ui").hide();
             } else {
             $("#app_access").hide();
             $("#app_ui").show();
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
             createProfiles(profiles);
             }*!/
            break;
        case "logout":
            $("#app_access").show();
            $("#app_ui").hide();
            break;
        default:
            break;
    }
}

function createProfiles(profiles) {
    var miniProfileElem;
    var userDataElem;
    var infoContainer;
    var tmp;

    for (var i = 0; i < profiles.length; i++) {
        miniProfileElem = $("<div></div>");
        infoContainer = $("<div></div>");
        miniProfileElem.addClass("flex_col_container");
        miniProfileElem.addClass("card");
        infoContainer.addClass("flex_col_container");
        $("#profiles").append(miniProfileElem);
        userDataElem = $("<p></p>");
        userDataElem.text(tmp + ": " + profiles[i][tmp]);
        infoContainer.append(userDataElem);
        /!*tmp = null;
         for (tmp in profiles[i]) {
         userDataElem = $("<p></p>");
         userDataElem.text(tmp + ": " + profiles[i][tmp]);
         infoContainer.append(userDataElem);
         }*!/
        miniProfileElem.append(infoContainer);
    }
}

*/
