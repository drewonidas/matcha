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
$(function() {
    // location.pathname = "server/matcha/";
    var appData = {userProfile: ''};
    var viewsContainer = $("#main_content");
    var loader = $("#app_loader_cont");
    var appControllers = {
        initialize: function() {
            /** LOAD COMPLETE, CHECK IF USER IS SIGNED IN **/
            var cont = this;
            sendRequest("status", "", function (data) {
                if (data !== "notFound") {
                    appData.userProfile = data[0];
                    cont.home(data);
                } else {
                    cont.appAccess();
                }
            });
        },
        loadPage: function(pageUrl) {
            /*var pageUrl = page.split('/ ')[1];
            console.log(pageUrl);*/
            viewsContainer.empty();
            switch (pageUrl) {
                case "":
                    this.home();
                    break;
                case "login":
                case "registration":
                    this.appAccess(pageUrl);
                    break;
                case "profile":
                    this.profile();
                    break;
                default:
                    break;
            }
        },
        home: function(data) {
            viewsContainer.load('./views/home.html', function() {
                var args = {"user" : data[0].username};
                $("header").show();
                $("footer").show();
                sendRequest("profiles", JSON.stringify(args), renderMiniProfileCards);
                loader.css("display", "none");
                $("#profile_btn").click(appControllers.profile);
                /** USER SIGN-OUT **/
            });
        },
        appAccess: function() {
            viewsContainer.load('./views/userAccess.html', function() {
                var signInForm = $("#signin_form");
                var signUpForm = $("#signup_form");

                $("header").hide();
                $("footer").hide();
                $("#toggle_reg").click(function () {
                    signUpForm.show();
                    signInForm.hide();
                });
                $("#toggle_log").click(function () {
                    signInForm.show();
                    signUpForm.hide();
                });
                /** USER REGISTRATION/LOGIN **/
                $("form").submit(submitForm);
                loader.css("display", "none");
            });
        },
        profile: function() {
            viewsContainer.load('./views/profile.html', function() {
                var args = {"id" : appData.userProfile.id};
                // console.log(appData.userProfile.id);
                sendRequest("profile_info", JSON.stringify(args), renderProfilePage);
                $("#sign_out_btn").click(signOut);
                $("#edit_profile_btn").click(function () {
                    $("#edit_actions").show();
                    $("input:disabled").attr("disabled", false);
                    // $("");
                });
                loader.css("display", "none");
            });
        }
    };

    function changeAppState(data) {
        if (data === "notFound") {
            // $("#app_access").css("display", "block");
            // location.hash = "/";
            alert("User input error!!");
        } else {
            appControllers.home(data);
        }
        $("#app_loader_cont").css("display", "none");
    }
    function renderMiniProfileCards(data) {
        var contentCont = $("#profiles");
        var profileCard = $(".mini_profile");
        var cardClone;
        // LOOP THROUGH RECEIVED DATA
        for (var c = 0; c < data.length; c++) {
            cardClone = profileCard.clone(true);
            /**> FIND AND FILL FILE INFO ELEMENTS */
            cardClone.find('h3.profile_username').text(data[c].username);
            cardClone.attr("id", data[c].id);
            /**> ADD TO PAGE */
            contentCont.append(cardClone);
            // cardClone.show();
            cardClone = null;
        }
        /* REMOVE TEMPLATE */
        profileCard.remove();
        // $("#profiles:first-child").remove();
        $('.profile_info').click(openModalProfile);
        $('.modal_close').click(closeModalProfile);
        $("#app_loader_cont").css("display", "none");
    }
    function renderProfilePage(data) {
        var profile = data[0];
        $(".profile_username").text(profile.username);
        $("#profile_fname").val(profile.first_name);
        $("#profile_lname").val(profile.last_name);
        $("#profile_email").val(profile.email);
        $("#profile_gender").val(profile.gender);
        $("#profile_sex_pref").val(profile.sexual_pref);
        $("#profile_bio").val(profile.bio);

        $("#logo").click(function () {
            appControllers.home(data);
        });
    }
    function openModalProfile()  {
        var profileID = $(this).parents('div.card').attr("id");
        var args = {"id" : profileID};
        sendRequest("profile_info", JSON.stringify(args), function (data) {
            var profile = data[0];
            console.log(profile);
            $('.modal').show();
            $('h3.info_uname').text(profile.username);
            $('span.info_fname').text(profile.first_name);
            $('span.info_lname').text(profile.last_name);
            $('span.info_sex').text(profile.gender);
            $('span.info_pref').text(profile.sexual_pref);
            $('textarea.info_bio').text(profile.bio);
            loader.hide();
        });
    }
    function closeModalProfile() {
        $('.modal_close').parents('.modal').hide();
    }
    function submitForm(event) {
        event.preventDefault();
        var tmp = $(this).find("input:valid").serializeArray();
        var args = {};
        $.each(tmp, function(i, field) {
            args[field.name] = field.value;
        });
        console.log(args);
        sendRequest($(this).attr("name"), JSON.stringify(args), changeAppState);
    }
    function signOut() {
        sendRequest("logout", "", appControllers.appAccess);
    }
    /**!! SET UP EVENT LISTENERS !!**/
/*    $("#sign_up_btn").click(function() {
        $("#signup_form").show();
        $("#signin_form").hide();
    });

    $("#sign_in_btn").click(function() {
        $("#signin_form").show();
        $("#signup_form").hide();
    });*/

    appControllers.initialize();
    $(document).ajaxStart(function() {
        // $('.page').hide();
        $("#app_loader_cont").show();
    });
});
