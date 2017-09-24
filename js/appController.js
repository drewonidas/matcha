/**
* @Author: Dregend Drewonidas <root>
* @Date:   Wednesday, October 26, 2016 5:49 PM
* @Email:  dlaminiandrew@gmail.com
* @Last modified by:   root
* @Last modified time: Thursday, November 10, 2016 2:30 AM
* @Last modified time: Thursday, November 10, 2016 2:30 AM
* @License: maDezynIzM.E. 2016
*/

$(function() {
    var app = new AppController();
    $(document).ajaxStart(function() {
        // $('.page').hide();
        $("#app_loader_cont").show();
    });
    $(document).ajaxComplete(function () {
        $("#app_loader_cont").hide();
    });
    $(window).on('hashchange', app.run);
});

/** VIEW-CONTROLLER **/
var AppController = function() {
    var appController = {
        viewController: null,
        requestController: null,
        loadingAnimation: null,
        messageDialog: null,
        init: function() {
            window.location.hash = "";
            appController.loadingAnimation = $("#app_loader_cont");
            appController.messageDialog = $("#message_dialog");
            /** INITIALIZE CONTROLLERS **/
            appController.viewController = new ViewController();
            appController.requestController = new RequestController();
            var events = {};
            events['formSubmit'] = appController.submitForm;
            events['updateProfile'] = appController.requestController.updateProfile;
            appController.viewController.bindEvents(events);
            appController.requestController.sendRequest("status", "", function (data) {
                if (data !== "notFound")
                    window.location.hash = "/";
                else
                    window.location.hash = "/login";
            });
        },
        submitForm: function(event) {
            event.preventDefault();
            var tmp = $(this).find("input:valid").serializeArray();
            var args = {};
            $.each(tmp, function(i, field) {
                args[field.name] = field.value;
            });
            appController.requestController.sendRequest($(this).attr("name"),
                JSON.stringify(args), appController.signInUp);
        },
        signInUp: function(data) {
            if (data === "notFound") {
                // $("#app_access").css("display", "block");// location.hash = "/";
                alert("Incorrect details. Please try again!");
                console.log(data);
            } else {
                console.log("good shit happened");
                // appController.dialogMsg("data");
                // appController.viewController.loadView("home");
                window.location.hash = "/";
                console.log(data);
            }
            // appController.loadingAnimation.hide();
        },
        signOut: function () {
          appController.requestController.sendRequest("logout", "", function () {
              alert("You have successfully logged out");
              window.location.hash = "/login";
          })
        },
        run: function () {
            /** TODO: IMPLEMENT SWITCHER TO CONTROL HASH CHANGES **/
            var tmp = window.location.hash.split("/")[1];
            appController.viewController.loadView(tmp);
            switch (tmp) {
                case "":
                    appController.requestController.renderHomeContent();
                    $('.sign_out_btn').click(appController.signOut);
                    break;
                case "profile":
                    appController.requestController.renderProfilePage();
                    $('form[name=update]').submit(appController.submitForm);
                    break;
                case "user-details":
                    /** TODO: IMPLEMENT 'SEARCH QUERY STRING' REMIX
                     * [(".) couldn't find a better word] **/
                    console.log("user-details");
                    appController.requestController.renderProfileModal();
                    break;
                default:
                    break;
            }
        }
    };
    appController.init();
    return appController;
};
