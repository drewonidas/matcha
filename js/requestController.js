/** CONTENT-CONTROLLER **/
function renderMiniProfileCards(data) {
    var contentCont = $("#profiles");
    var profileCard = $(".mini_profile");
    var cardClone;
    var toggleAffections;
    // LOOP THROUGH RECEIVED DATA
    for (var c = 0; c < data.length; c++) {
        cardClone = profileCard.clone(true);
        /**> FIND AND FILL FILE INFO ELEMENTS */
        cardClone.find('p.profile_username').text(data[c].username);
        console.log(data[c].affections);
        cardClone.attr("id", data[c].id);
        toggleAffections = cardClone.find('.theme_toggle :checkbox');
        toggleAffections.attr("checked", (data[c].affections > 0));
        toggleAffections.change(changeAffections);
        contentCont.append(cardClone);
        cardClone = null;
    }
    /* REMOVE TEMPLATE */
    profileCard.remove();
    // $('input[name=profile_like]').change(changeAffections);
    $('.profile_info').click(openModalProfile);
    $('.modal_close').click(closeModalProfile);
    $("#app_loader_cont").css("display", "none");
}
function renderProfilePage(data) {
    var profile = data;
    $(".profile_username").text(profile.username);
    $("#profile_fname").val(profile.first_name);
    $("#profile_lname").val(profile.last_name);
    $("#profile_email").val(profile.email);
    $("#profile_gender").val(profile.gender);
    $("#profile_sex_pref").val(profile.sexual_pref);
    $("#profile_bio").text(profile.bio);
    loader.hide();
}
function openModalProfile() {
    var profileID = $(this).parents('div.card_container').attr("id");
    var args = {"id" : profileID};
    sendRequest("mini_profile_info", JSON.stringify(args), function (data) {
        var profile = data[0];
        console.log(profile);
        $('.modal').show();
        $('h1.info_uname').text(profile.username);
        $('span.info_fname').text(profile.first_name);
        $('span.info_lname').text(profile.last_name);
        $('span.info_sex').text(profile.gender);
        $('span.info_pref').text(profile.sexual_pref);
        $('textarea.info_bio').text(profile.bio);
        loader.hide();
    });
}
function submitForm(event) {
    event.preventDefault();
    var tmp = $(this).find("input:valid").serializeArray();
    var args = {};
    $.each(tmp, function(i, field) {
        args[field.name] = field.value;
    });
    console.log(args);
    //sendRequest($(this).attr("name"), JSON.stringify(args), changeAppState);
}
function updateProfile(event) {
    event.preventDefault();
    var tmp = $(this).find(".info").serializeArray();
    var args = {};
    $.each(tmp, function(i, field) {
        args[field.name] = field.value;
    });
    console.log(args);
    sendRequest($(this).attr("name"), JSON.stringify(args), function (data) {
        if (data === true)
            alert("Profile successfully changed!");
        else
            alert("Something went wrong. Please try again");

        viewController.profile();
        loader.hide();
    });
}
function signOut() {
    sendRequest("logout", "", viewController.appAccess);
}
function changeAffections() {
    var btn = $(this).filter('[name=profile_like]');
    console.log(btn);
    var action = btn.attr("checked");
    var profileID = btn.parents('div.card_container').attr("id");
    var args = {"recID" : profileID, "action" : action};
    console.log(args);
    /*sendRequest("like_user", JSON.stringify(args), function(data) {
     alert("Affections changed");
     loader.hide();
     });*/
}

var RequestController = function() {
    var requestController = {
        serverPage: null,
        init: function () {
            requestController.serverPage = "php/requestHandler.php";
        },
        sendRequest: function(reqType, args, func) {
            $.post(requestController.serverPage, "reqType=" + reqType + "&args=" + args,
                function(response, status) {
                    if (status === "success") {
                        try {
                            console.log(response);
                            var data = JSON.parse(response);
                            console.log(data);
                            func(data);
                        } catch (e) {
                            /** USE printErrorMsg() here **/
                            console.log(e.message);
                        }
                    }
                }
            );
        }
    };
    requestController.init();
    return requestController;
};