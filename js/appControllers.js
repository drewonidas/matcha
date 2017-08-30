/**
* @Author: Dregend Drewonidas <root>
* @Date:   Wednesday, November 9, 2016 9:24 PM
* @Email:  dlaminiandrew@gmail.com
* @Last modified by:   root
* @Last modified time: Wednesday, November 9, 2016 11:22 PM
* @License: maDezynIzM.E. 2016
*/

/*var home = $("#app_ui");
var access = $("#app_access");*/


/*function renderPage(newUrl, req, args) {
    /!*home.css("display", "block");
    loader.css("display", "none");
    access.css("display", "none");*!/
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
}*/

function sendRequest(reqType, args, func) {
    $.post("php/requestHandler.php",
        "reqType=" + reqType + "&args=" + args,
        function(response, status) {
            if (status === "success") {
                try {
                    console.log(response);
                    var data = JSON.parse(response);
                    func(data);
                    /**> CREATE AND ADD PROFILE CARDS */
                    // renderMiniProfileCards(data);
                } catch (e) {
                    console.log(e.message);
                }
            }
        });
}

