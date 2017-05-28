/**
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

