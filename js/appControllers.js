/**
* @Author: Dregend Drewonidas <root>
* @Date:   Wednesday, November 9, 2016 9:24 PM
* @Email:  dlaminiandrew@gmail.com
* @Last modified by:   root
* @Last modified time: Wednesday, November 9, 2016 11:22 PM
* @License: maDezynIzM.E. 2016
*/

function sendRequest(reqType, args, func) {
    $.post("php/requestHandler.php",
        "reqType=" + reqType + "&args=" + args,
        function(response, status) {
            if (status === "success") {
                try {
                    var data = JSON.parse(response);
                    console.log(data);
                    func(data);
                } catch (e) {
                    console.log(e.message);
                }
            }
        });
}