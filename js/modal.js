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
    var appData = {userProfile: ''};

    $("#sign_up_form").hide();
    $("#app_ui").css("display", "none");
    $("#app_access").css("display", "none");

    /** LOAD COMPLETE, CHECK IF USER IS SIGNED IN **/
    sendRequest("status", "", changeAppState);

    function changeAppState(response) {
        var data = JSON.parse(response);
        // console.log()
        $("#profile_page").hide();
        if (data === "notFound") {
            $("#app_access").css("display", "block");
            alert("User input error!!");
        } else {
            $("#app_ui").css("display", "block");
            $("#app_access").css("display", "none");
            appData.userProfile = data[0];
            var args = {"user" : data[0].username};
            console.log(args);
            sendRequest("profiles", args, renderPageContent);
        }
        $("#app_loader_cont").css("display", "none");
    }

    function renderPageContent(response, status) {
        if (status === "success") {
            try {
                var data = JSON.parse(response);
                /**> INITIALIZE CONTENT CARDS */
                var contentCont = $("#profiles");
                var profileCard = $(".mini_profile");
                var cardClone;
                // LOOP THROUGH RECEIVED DATA
                for (var c = 0; c < data.length; c++) {
                    cardClone = profileCard.clone(true);
                    /**> FIND AND FILL FILE INFO ELEMENTS */
                    cardClone.find('h3.profile_username').text(data[c].username);
                    cardClone.attr("id", c);
                    /**> ADD TO PAGE */
                    contentCont.append(cardClone);
                    // cardClone.show();
                    cardClone = null;
                }
                /* REMOVE TEMPLATE */
                // $("#profiles:first-child").remove();
                $('.profile_info').click(openModalProfile);
                $("#app_loader_cont").css("display", "none");
            } catch (e) {
                console.log(e.message);
            }
        }
    }

    function openModalProfile()  {
        $('.modal').show();
        var profileID = $(this).parents('div.card').attr("id");
        console.log(profileID);
    }

    $("#sign_up_btn").click(function() {
        $("#sign_up_form").show();
        $("#sign_in_form").hide();
    });

    $("#sign_in_btn").click(function() {
        $("#sign_in_form").show();
        $("#sign_up_form").hide();
    });
    /** PROFILE VIEW TOGGLER **/
    $("#profile_btn").click(function() {
        $("#profile_page").toggle();
        $("#browser_page").toggle();
    });
    /** USER SIGN-OUT **/
    $("#sign_out_btn").click(function() {
        // renderPage("/access", "logout", "");
        sendRequest("logout", "", changeAppState);
    });
    /** USER LOGIN **/
    /*$("#submit_login").click(function() {
        var name = $("#uname").val();
        var pwd = $("#password").val();
        //var data = $(this).serialize();
        var args = {"username" : name, "pwd" : pwd};
        // sendRequest("/", "login", JSON.stringify(args));
    });*/
    /** USER REGISTRATION/LOGIN **/
    $("form").submit(function(event) {
        event.preventDefault();
        var tmp = $("input:valid").serializeArray();
        var args = {};
        $.each(tmp, function(i, field) {
            args[field.name] = field.value;
        });
        sendRequest($(this).attr("name"), JSON.stringify(args), changeAppState);
    });

    $(document).ajaxStart(function() {
        $("#app_ui").css("display", "none");
        $("#app_access").css("display", "none");
        $("#app_loader_cont").show();
    });
    /*$(document).ajaxComplete(function() {
        $("#app_loader_cont").hide();
    });*/
});
