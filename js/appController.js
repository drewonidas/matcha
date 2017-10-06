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
    $(window).on('hashchange', app.run);
    $(document).ajaxStart(function() {
        $("#app_loader_cont").show();
    });
    $(document).ajaxComplete(function () {
        $("#app_loader_cont").hide();
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
            window.location.hash = "";
            appController.loadingAnimation = $("#app_loader_cont");
            appController.messageDialog = $("#message_dialog");
            /** INITIALIZE CONTROLLERS **/
            appController.viewController = new ViewController();
            appController.requestController = new RequestController();
            var events = {};
            /** TODO: CHECK IF THIS IS IN USE, REMOVE IF NOT **/
            events['formSubmit'] = appController.submitForm;
            events['updateProfile'] = appController.requestController.updateProfile;
            events['searchProfiles'] = appController.requestController.searchMembers;
            events['changeAffections'] = appController.requestController.changeAffections;
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
                alert("Incorrect details. Please try again!");
                console.log(data);
            } else {
                console.log("good shit happened");
                appController.loadApp();
            }
        },
        signOut: function () {
          appController.requestController.sendRequest("logout", "", function () {
              window.location.hash = "/login";
              alert("You have successfully logged out");
          })
        },
        loadApp: function () {
            window.location.hash = "/";
        },
        run: function() {
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

var ChatController = function () {
    var chatController = {
        msgBubbleContainer: null,
        contact_bubble: null,
        userMsgBubble: null,
        chatMsgBubble: null,
        init: function () {
            var chatDialog = $('.chat_space .chat');
            chatController.msgBubbleContainer = chatDialog.find('.message_bubbles');
            chatController.userMsgBubble = $('<p class="chat_bubble pos_right"></p>');
            chatController.chatMsgBubble = $('<p class="chat_bubble pos_left"></p>');
        },
        loadContactList: function (dataFunc) {
            dataFunc("contacts", "", function (data) {
                console.log(data);
            });
        },
        loadChat: function (data) {

        }
    };
    chatController.init();
    return chatController;
};
