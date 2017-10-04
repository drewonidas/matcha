/** CONTENT-CONTROLLER **/

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
                            var data = JSON.parse(response);
                            console.log(response);
                            func(data);
                        } catch (e) {
                            alert('Something went wrong :(... sorry');
                            console.log(e.message);
                            console.log(response);
                        }
                    }
                }
            );
        },
        renderHomeContent: function() {
            requestController.sendRequest("mini_profiles", "",
                requestController.miniProfiles);
        },
        miniProfiles: function(data) {
            var contentCont = $("#profiles");
            var profileCard = $(".mini_profile");
            var cardClone;
            var toggleAffections;
            // LOOP THROUGH RECEIVED DATA
            for (var c = 0; c < data.length; c++) {
                cardClone = profileCard.clone(true);
                /**> FIND AND FILL FILE INFO ELEMENTS */
                cardClone.find('p.profile_username').text(data[c].username);
                if (data[c].status === 'online')
                    cardClone.find('input[name=status]').attr("checked", true);
                cardClone.find('span.status_text').text(data[c].status);
                cardClone.attr("id", data[c].id);
                toggleAffections = cardClone.find('input[name=profile_like]');
                // toggleAffections.attr("checked", (data[c].affections > 0));
                toggleAffections.change(requestController.changeAffections);
                contentCont.append(cardClone);
                cardClone = null;
            }
            /** REMOVE TEMPLATE **/
            profileCard.remove();
            $('.profile_info').click(requestController.renderProfileModal);
            $('.modal_close').click(function () {
                $('.modal_close').parents('.modal').hide();
            });
        },
        renderProfilePage: function () {
            requestController.sendRequest("user_profile", "", function (data) {
                var profile = data[0];
                $(".profile_username").text(profile.username);
                $("#profile_fname").val(profile.first_name);
                $("#profile_lname").val(profile.last_name);
                $("#profile_email").val(profile.email);
                $("#profile_gender").val(profile.gender);
                $("#profile_sex_pref").val(profile.sexual_pref);
                $("#profile_bio").text(profile.bio);
            });
        },
        renderProfileModal: function () {
            var profileID = $(this).parents('div.card_container').attr("id");
            var args = {"id" : profileID};
            // $('.modal_close').parents('.modal').hide();
            requestController.sendRequest("mini_profile_info",
                JSON.stringify(args), function (data) {
                    var profile = data[0];
                    console.log(profile);
                    $('.modal').show();
                    $('h1.info_uname').text(profile.username);
                    $('span.info_fname').text(profile.first_name);
                    $('span.info_lname').text(profile.last_name);
                    $('span.info_sex').text(profile.gender);
                    $('span.info_pref').text(profile.sexual_pref);
                    $('textarea.info_bio').text(profile.bio);
                    // console.log(profileID);
                    // $('.card_container').attr("id", profileID);
                    // $('input[name=profile_like]').change(requestController.changeAffections);
                });
        },
        updateProfile: function(form) {
            var tmp = form.find(".info").serializeArray();
            var newImage = $('#img_upload')[0].files;
            console.log(newImage);
            var args = {};
            $.each(tmp, function(i, field) {
                args[field.name] = field.value;
            });
            requestController.sendRequest(form.attr("name"),
                JSON.stringify(args), function(data) {
                    if (data === true)
                        alert("Your profile update was successful");
                })
        },
        searchMembers: function(form) {
            var tmp = form.find("input.criteria").serializeArray();
            var args = {};
            $.each(tmp, function(i, field) {
                args[field.name] = field.value;
            });
            console.log(args);
            requestController.sendRequest(form.attr("name"),
                JSON.stringify(args), function(data) {
                    if (data !== "notFound") {
                        console.log(data);
                    }
                });
        },
        changeAffections: function () {
            var btn = $(this);
            var action = btn[0].checked;/*attr("checked");*/
            console.log(action);
            var profileID = btn.parents('div.card_container').attr("id");
            var args = {"recID" : profileID, "action" : action.toString()};
            console.log(args);
            requestController.sendRequest("like_user", JSON.stringify(args), function(data) {
                alert("Affections changed");
            });
        }
    };
    requestController.init();
    return requestController;
};