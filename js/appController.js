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
});

/** VIEW-CONTROLLER **/
var AppController = function() {
    var appController = {
        viewController: null,
        requestController: null,
        loadingAnimation: null,
        messageDialog: null,
        init: function() {
            appController.loadingAnimation = $("#app_loader_cont");
            appController.messageDialog = $("#message_dialog");
            appController.viewController = new ViewController();
            appController.requestController = new RequestController();
            appController.requestController.sendRequest("status", "", appController.changeAppState);
        },
        dialogMsg: function(msg) {
            appController.messageDialog.find("message_dialog").text("msg");
            appController.messageDialog.show();
        },
        changeAppState: function(data) {
            if (data === "notFound") {
                // $("#app_access").css("display", "block");// location.hash = "/";
                alert("User input error!!");
            } else {
                var k = appController.viewController.home();
                console.log(k);
            }
            appController.loadingAnimation.hide();
        }
    };
    appController.init();
    return appController;
};
