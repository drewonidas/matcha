\/**
* @Author: Dregend Drewonidas <root>
* @Date:   Wednesday, November 9, 2016 9:24 PM
* @Email:  dlaminiandrew@gmail.com
* @Last modified by:   root
* @Last modified time: Saturday, November 12, 2016 1:36 AM
* @License: maDezynIzM.E. 2016
*/

function isSignedIn() {
    var tmp = '';

    $.get("php/check.php",
        function(result) {
            tmp = result;
            console.log(tmp);
        }, "json");
    return (tmp);
}

function render(url) {
    //var url = decodeURI(window.location);
    var tmp = url.split('/')[0];
    var res = '';

    $('.page').removeClass('visible');
    var appPages = {
        // homepage
        '': function() {
            $('#home').addClass('visible');
        },
        // renderSignupPage
        '#sign-up': function() {
            //var index = url.split('#sign-up/')[1];
            $('#sign_in').addClass('visible');
        },
        '#myprofile': function() {
            //var index = url.split('#profile/')[1];
            $('#profile').addClass('visible');
        }
    };
    if (appPages[tmp]) {
        res = isSignedIn();
console.log(res);
        if (res == 'FALSE') {
            tmp = '#sign-up';
            console.log('jeeeeeeeeeez');
            window.location.hash = tmp;
        }
        appPages[tmp]();
    } else {
        $('#error_page').addClass('visible');
    }
}
