/**
* @Author: Dregend Drewonidas <root>
* @Date:   Wednesday, November 9, 2016 9:24 PM
* @Email:  dlaminiandrew@gmail.com
* @Last modified by:   root
* @Last modified time: Wednesday, November 9, 2016 11:22 PM
* @License: maDezynIzM.E. 2016
*/

var ViewController = function() {
    var viewController = {
        mainContainer: null,
        currentView: null,
        externalEvents: null,
        profileCard: null,
        init: function () {
            viewController.mainContainer = $("#main_container");
            viewController.loadView("login");
        },
        bindEvents: function (events) {
            /** FORM SUBMISSION EVENT **/
            viewController.externalEvents = events;
        },
        loadView: function(viewName) {
            viewController.mainContainer.empty();
            switch (viewName) {
                case "":
                case "home":
                    viewController.mainContainer.load('./views/home.html', viewController.home);
                    break;
                case "login":
                case "registration":
                    viewController.mainContainer.load('./views/login.html', viewController.appAccess);
                    break;
                case "profile":
                    viewController.mainContainer.load('./views/profile.html', viewController.profile);
                    break;
                case "search":
                    // viewController.search();
                    viewController.mainContainer.load('./views/home.html', viewController.search);
                    break;
                default:
                    break;
            }
            viewController.currentView = viewName;
        },
        home: function() {
            $("header").show();
            $("footer").show();
            viewController.profileCard = $(".mini_profile");
            $("#profile_btn").click(function () {
                $(this).find("i.fa").removeClass("fa-user");
                $(this).find("i.fa").addClass("fa-close");
                $(this).attr("href", "#/profile");
                viewController.profile();
            });
            $('.action_btn').click(function (event) {
                event.preventDefault();
                $('.chat_space form[name=chat]').toggle();
                $('.chat_space form ul li').click(function (event) {
                    event.preventDefault();
                    $('.chat_space form .contacts').hide();
                    $('.chat_space form .messages').show(function () {
                        $(this).find('button').click(function () {
                            $(this).parents('.messages').hide();
                            $('.chat_space form .contacts').show();
                        });
                    });
                });
            });
            /*$('#search.open').click(function() {
                $('#profiles').empty();
                $(this).find("i.fa").removeClass("fa-search");
                $(this).find("i.fa").addClass("fa-close");
                console.log("search bithes!!!!");
            });*/
        },
        appAccess: function() {
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
            $("form.access_form").submit(viewController.externalEvents['formSubmit']);
        },
        profile: function () {
            var actions = $("#edit_actions");
            var btnEdit = actions.find("button[name=edit]");
            var btnSave = actions.find("button[name=save]");
            var btnCancel = actions.find("button[name=cancel]");
            var btnUpload = $('.img_upload');
            var inputs = $(".info");

            btnEdit.click(function () {
                inputs.attr("disabled", false);
                btnSave.show();
                btnCancel.show();
                btnUpload.show();
                $(this).hide();
            });
            btnCancel.click(function () {
                inputs.attr("disabled", true);
                btnSave.hide();
                btnEdit.show();
                btnUpload.hide();
                $(this).hide();
            });
            $('#profile_btn').click(function () {
                $(this).find("i.fa").removeClass("fa-close");
                $(this).find("i.fa").addClass("fa-user");
                $(this).attr("href", "#/");
            });
            $('form[name=update]').submit(function (event) {
                event.preventDefault();
                viewController.externalEvents['updateProfile']($(this));
                inputs.attr("disabled", true);
                btnSave.hide();
                btnEdit.show();
            });
            $('#img_upload').change(function () {
                console.log('so far so good!');
                var newImage = $(this)[0].files;
                console.log(newImage);
                $('#slot_1').src = newImage[0].name;
            });
            $('.gps_location').click(function (event) {
                event.preventDefault();
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        console.log(position);
                        var coordinates = position.coords.latitude + ',' + position.coords.longitude;
                        var geocodeAddress = "https://maps.googleapis.com/maps/api/geocode/json?latlng="
                            + coordinates + "&key=AIzaSyBq_EtziXDEQHJN4TjQMwYUMgNTxCNXrEs";
                        console.log(geocodeAddress);
                    })
                }
            });
        },
        search: function () {
            console.log("searching niiigaz");
            var searchToggle = $('#search');
            var searchForm = $('form[name=search]');
            searchToggle.find("i.fa").removeClass("fa-search");
            searchToggle.find("i.fa").addClass("fa-close");
            searchToggle.attr("href", "#/");
            // $('form[name=search] input').focus();
            // $('h1.page_title').hide();
            searchForm.show();
            searchForm.submit(function (event) {
                event.preventDefault();
                console.log('search initiated');
                viewController.externalEvents['searchProfiles']($(this));
            });
        }
    };
    viewController.init();
    return viewController;
};