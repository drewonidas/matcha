/**
* @Author: Dregend Drewonidas <root>
* @Date:   Wednesday, November 9, 2016 9:24 PM
* @Email:  dlaminiandrew@gmail.com
* @Last modified by:   root
* @Last modified time: Wednesday, November 9, 2016 11:22 PM
* @License: maDezynIzM.E. 2016
*/

$(function() {
    var home = $("#app_interface");
    var loader = $("#loader_container");
    var access = $("#app_access");
    var tmpUrl = "";

    tmpUrl = location.hash;
    $(window).on('hashchange', function() {
        sendRequest(tmpUrl, "status", "");
    });
    // console.log(tmpUrl);
    //sendRequest(tmpUrl, "status", "");
    //render('');
});

function render(newUrl, response) {
    var pageUrl = newUrl.split('/')[1];
    //console.log(newUrl);
    var home = $("#app_interface");
    var loader = $("#loader_container");
    var access = $("#app_access");
    // console.log(tmp);
    var appPages = {
        '': function() {
            home.css("display", "block");
            // location.hash = pageUrl;
            },
        'access': function() {
            access.css("display", "flex");
            // location.hash = pageUrl;
        }
    };
    if (appPages[pageUrl]) {
        if (response === 'notFound') {
            pageUrl = 'access';
            location.hash = '/' + pageUrl;
        }
        appPages[pageUrl]();
        loader.css("display", "none");
    } else {
        alert("Error 404: Page not found!");
    }
}

function sendRequest(url, reqType, args) {
    $("#loader_container").css("display", "block");
    $("#app_interface").css("display", "none");
    $("#app_access").css("display", "none");

    $.post("php/RequestServiceController.php",
        "reqType=" + reqType + "&args=" + args,
        function (data) {
            var response = JSON.parse(data);
            // console.log(response);
            render(url, response);
        });
}