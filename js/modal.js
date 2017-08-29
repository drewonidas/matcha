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
    var appData = {userProfile: ''};
    var viewsContainer = $("#main_content");
    var loader = $("#app_loader_cont");
    var appControllers = {
        loadPage: function(page) {
            var pageUrl = page.split('/')[1];
            console.log(pageUrl);
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
                alert("It works");
                // appData.userProfile = response;
                var args = {"user" : data[0].username};
                sendRequest("profiles", JSON.stringify(args), renderPageContent);
                loader.css("display", "none");
            });
        },
        appAccess: function(page) {
            viewsContainer.load('./views/userAccess.html', function() {
                alert("It works");
                if (page === "login") {
                    $("#signin_form").show();
                    $("#signup_form").hide();
                } else if (page === "registration") {
                    $("#signup_form").show();
                    $("#signin_form").hide();
                }
                loader.css("display", "none");
            });
        },
        profile: function() {
            /*access.css("display", "flex");
             loader.css("display", "none");*/
            viewsContainer.load('./views/profile.html', function() {
                alert("It works");
                loader.css("display", "none");

            });
        }
    };

    /** LOAD COMPLETE, CHECK IF USER IS SIGNED IN **/
    sendRequest("status", "", dummy);

    function dummy(data) {
        //var data = JSON.parse(response);
        console.log(data);
        if (data === "notFound") {
            appControllers.appAccess();
        } else {
            appControllers.home(data);
        }
    }
    function changeAppState(data) {
        if (data === "notFound") {
            // $("#app_access").css("display", "block");
            alert("User input error!!");
        } else {
            appControllers.home();
        }
        $("#app_loader_cont").css("display", "none");
    }
    function renderPageContent(response, status) {
        if (status === "success") {
            try {
                var data = JSON.parse(response);
                /**!> CREATE AND ADD PROFILE CARDS **/
                renderMiniProfileCards(data);
                $("#app_loader_cont").css("display", "none");
            } catch (e) {
                console.log(e.message);
            }
        }
    }
    function renderProfilePage() {
        try {
            var user = JSON.parse(appData.userProfile);
            console.log(user);
        } catch (e) {
            console.log(e);
        }
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
    }
    function openModalProfile()  {
        var profileID = $(this).parents('div.card').attr("id");
        // console.log(profileID);
        var args = {"id" : profileID};
        sendRequest("profile_info", JSON.stringify(args), function (response, status) {
            if (status === 'success') {
                try {
                    var data = JSON.parse(response);
                    var profile = data[0];
                    console.log(profile);
                    $('.modal').show();
                    $('h3.info_uname').text(profile.username);
                    $('span.info_fname').text(profile.first_name);
                    $('span.info_lname').text(profile.last_name);
                    $('span.info_sex').text(profile.gender);
                    $('span.info_pref').text(profile.sexual_pref);
                    $('textarea.info_bio').text(profile.bio);
                } catch (e) {
                    console.log(e.message);
                }
                $("#app_loader_cont").css("display", "none");
            } else {
                alert('Server connection error');
            }
        });
    }
    function closeModalProfile() {
        $('.modal_close').parents('.modal').hide();
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

    /** USER SIGN-OUT **/
    $("#sign_out_btn").click(function() {
        // renderPage("/access", "logout", "");
        sendRequest("logout", "", changeAppState);
    });
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

    $(window).on('hashchange', function() {
        var newPage = location.hash;

        alert(newPage);
        appControllers.loadPage(newPage);
    });

    $(document).ajaxStart(function() {
        // $('.page').hide();
        $("#app_loader_cont").show();
    });
});
