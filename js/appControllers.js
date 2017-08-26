/**
* @Author: Dregend Drewonidas <root>
* @Date:   Wednesday, November 9, 2016 9:24 PM
* @Email:  dlaminiandrew@gmail.com
* @Last modified by:   root
* @Last modified time: Wednesday, November 9, 2016 11:22 PM
* @License: maDezynIzM.E. 2016
*/

var home = $("#app_ui");
var loader = $("#app_loader_cont");
var access = $("#app_access");
var appContollers = {
    '#/': function(data) {
        var tmp = JSON.parse(data);
        if (tmp === 'notFound')
            alert("Incorrect details. Try again or reset");
        else {
            /*home.css("display", "block");
            loader.css("display", "none");*/
            alert("it works!! :D");
        }
    },
    'login': function(data) {
        /*access.css("display", "flex");
         loader.css("display", "none");*/
    }
};

function renderPage (newUrl, req, args) {
    home.css("display", "block");
    loader.css("display", "none");
    access.css("display", "none");
    var pageUrl = newUrl.split('/')[1];
    console.log(pageUrl);
    if (appPages[pageUrl]) {
        // loader.css("display", "flex");
        sendRequest(req, args, appPages[pageUrl]);
        // appPages[pageUrl]();
        // loader.css("display", "none");
    } else {
        alert("Error 404: Page not found!");
    }
}

function sendRequest(reqType, args, func) {
    $.post("php/requestHandler.php",
        "reqType=" + reqType + "&args=" + args,
        function(response, status) {
            if (status === "success") {
                try {
                    var data = JSON.parse(response);
                    console.log(data);
                    func(response);
                    /**> CREATE AND ADD PROFILE CARDS */
                    // renderMiniProfileCards(data);
                    $("#app_loader_cont").css("display", "none");
                } catch (e) {
                    console.log(e.message);
                }
            }
        });
}

