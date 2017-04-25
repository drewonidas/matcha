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
