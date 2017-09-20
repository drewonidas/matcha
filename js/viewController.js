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
        init: function () {
            viewController.mainContainer = $("#main_container");
            viewController.loadView("login");
        },
        loadView: function(viewName) {
            viewController.mainContainer.empty();
            switch (viewName) {
                case "":
                    viewController.mainContainer.load('./views/home.html', viewController.home);
                    break;
                case "login":
                case "registration":
                    viewController.mainContainer.load('./views/login.html', viewController.appAccess);
                    break;
                case "profile":
                    viewController.mainContainer.load('./views/profile.html', viewController.profile);
                    break;
                default:
                    break;
            }
        },
        home: function() {
            $("header").show();
            $("footer").show();
            $("#profile_btn").click(function () {
                // $(this).find("i.fa").removeClass("fa-user");
                // $(this).find("i.fa").addClass("fa-close");
                $(this).find("i.fa").replace("fa-user", "fa-close");

                viewController.profile();
            });
            // sendRequest("mini_profiles", "", renderMiniProfileCards);
            return "home";
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
            /** USER REGISTRATION/LOGIN **/
            $("form.access_form").submit(submitForm);
        },
        profile: function () {
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
                // $(this).find("i.fa").removeClass("fa-close");
                // $(this).find("i.fa").addClass("fa-user");
                $(this).find("i.fa").replace("fa-close", "fa-user");

                viewController.home();
            });
            // sendRequest("user_profile", "", renderProfilePage);
        }
    };
    viewController.init();
    return viewController;
};