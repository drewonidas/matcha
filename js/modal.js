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
        /*loadPage: function(pageUrl) {
            /!*var pageUrl = page.split('/ ')[1];
            console.log(pageUrl);*!/
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
        },*/
        home: function() {
            viewsContainer.empty();
            viewsContainer.load('./views/home.html', function() {
                $("header").show();
                $("footer").show();
                $("#profile_btn").click(function () {
                    $(this).find("i.fa").removeClass("fa-user");
                    $(this).find("i.fa").addClass("fa-close");
                    appControllers.profile();
                });
                sendRequest("mini_profiles", "", renderMiniProfileCards);
            });
        },
        appAccess: function() {
            viewsContainer.empty();
            viewsContainer.load('./views/userAccess.html', function() {
                var signInForm = $("form[name=login]");
                var signUpForm = $("form[name=register]");

                signUpForm.hide();
                signInForm.show();
                $("header").hide();
                $("footer").hide();
                $("#toggle_reg").click(function () {
                    signInForm.hide("fast");
                    signUpForm.show("slow");
                });
                $("#toggle_log").click(function () {
                    signUpForm.hide("fast");
                    signInForm.show("slow");
                });
                /** USER REGISTRATION/LOGIN **/
                $("form.access_form").submit(submitForm);
                loader.hide();
            });
        },
        profile: function() {
            viewsContainer.empty();
            viewsContainer.load('./views/profile.html', function() {
                var actions = $("#edit_actions");
                var btnEdit = actions.find("button[name=edit]");
                var btnSave = actions.find("button[name=save]");
                var btnCancel = actions.find("button[name=cancel]");
                var inputs = $(".info");

                btnEdit.click(function () {
                    inputs.attr("disabled", false);
                    btnSave.show();
                    btnCancel.show();
                    $(this).hide();
                    // $("");
                });
                btnCancel.click(function () {
                    inputs.attr("disabled", true);
                    btnSave.hide();
                    btnEdit.show();
                    $(this).hide();
                });
                $("form[name=update]").submit(updateProfile);
                $("button[name=sign_out]").click(signOut);
                $("#profile_btn").click(function () {
                    $(this).find("i.fa").removeClass("fa-close");
                    $(this).find("i.fa").addClass("fa-user");
                    appControllers.home();
                });
                sendRequest("user_profile", "", renderProfilePage);
            });
        }
    };

    function changeAppState(data) {
        if (data === "notFound") {
            // $("#app_access").css("display", "block");
            // location.hash = "/";
            alert("User input error!!");
        } else {
            appControllers.home();
        }
        loader.hide();
    }
    function renderMiniProfileCards(data) {
        var contentCont = $("#profiles");
        var profileCard = $(".mini_profile");
        var cardClone;
        var toggleAffections;
        // LOOP THROUGH RECEIVED DATA
        for (var c = 0; c < data.length; c++) {
            cardClone = profileCard.clone(true);
            /**> FIND AND FILL FILE INFO ELEMENTS */
            cardClone.find('p.profile_username').text(data[c].username);
            console.log(data[c].affections);
            cardClone.attr("id", data[c].id);
            toggleAffections = cardClone.find('.theme_toggle :checkbox');
            toggleAffections.attr("checked", (data[c].affections > 0));
            toggleAffections.change(changeAffections);
            contentCont.append(cardClone);
            cardClone = null;
        }
        /* REMOVE TEMPLATE */
        profileCard.remove();
        // $('input[name=profile_like]').change(changeAffections);
        $('.profile_info').click(openModalProfile);
        $('.modal_close').click(closeModalProfile);
        $("#app_loader_cont").css("display", "none");
    }
    function renderProfilePage(data) {
        var profile = data;
        $(".profile_username").text(profile.username);
        $("#profile_fname").val(profile.first_name);
        $("#profile_lname").val(profile.last_name);
        $("#profile_email").val(profile.email);
        $("#profile_gender").val(profile.gender);
        $("#profile_sex_pref").val(profile.sexual_pref);
        $("#profile_bio").text(profile.bio);
        loader.hide();
    }
    function openModalProfile() {
        var profileID = $(this).parents('div.card_container').attr("id");
        var args = {"id" : profileID};
        sendRequest("mini_profile_info", JSON.stringify(args), function (data) {
            var profile = data[0];
            console.log(profile);
            $('.modal').show();
            $('h1.info_uname').text(profile.username);
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
    function updateProfile(event) {
        event.preventDefault();
        var tmp = $(this).find(".info").serializeArray();
        var args = {};
        $.each(tmp, function(i, field) {
            args[field.name] = field.value;
        });
        console.log(args);
        sendRequest($(this).attr("name"), JSON.stringify(args), function (data) {
            if (data === true)
                alert("Profile successfully changed!");
            else
                alert("Something went wrong. Please try again");

            appControllers.profile();
            loader.hide();
        });
    }
    function signOut() {
        sendRequest("logout", "", appControllers.appAccess);
    }
    function changeAffections() {
        var btn = $(this).filter('[name=profile_like]');
        console.log(btn);
        var action = btn.attr("checked");
        var profileID = btn.parents('div.card_container').attr("id");
        var args = {"recID" : profileID, "action" : action};
        console.log(args);
        /*sendRequest("like_user", JSON.stringify(args), function(data) {
         alert("Affections changed");
         loader.hide();
         });*/
    }

    appControllers.initialize();
    $(document).ajaxStart(function() {
        // $('.page').hide();
        $("#app_loader_cont").show();
    });
});
