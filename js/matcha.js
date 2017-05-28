/**
* @Author: Dregend Drewonidas <root>
* @Date:   Wednesday, November 9, 2016 9:24 PM
* @Email:  dlaminiandrew@gmail.com
* @Last modified by:   root
* @Last modified time: Wednesday, November 9, 2016 11:22 PM
* @License: maDezynIzM.E. 2016
*/

$(function() {
    $(window).on('hashchange', function(){
        render(decodeURI(window.location.hash));
    });
    // decides on page to be shown
    //render('');

});

function render(url) {
    //var url = decodeURI(window.location);
    var tmp = url.split('/')[1];
    var res = '';

    // $('#access_page').hide();
    var appPages = {
        // homepage
        '': function() {
            // $('#home').addClass('visible');
            $('.floating_page').hide();
        },
        // renderSignupPage
        'access': function() {
            //var index = url.split('#sign-up/')[1];
            $('#access_page').show();
            // $('#access_page').show();
        }/*,
        'myprofile': function() {
            //var index = url.split('#profile/')[1];
            $('#profile').addClass('visible');
        }*/
    };
    // console.log(appPages[tmp]);
    if (appPages[tmp]) {
        //res = isSignedIn();
        res = 'FALSE';
        if (res == 'FALSE') {
            tmp = 'access';
            window.location.hash = '/' + tmp;
        }
            console.log('jeeeeeeeeeez');
        appPages[tmp]();
    } /*else {
        $('#error_page').addClass('visible');
    }*/
}