<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href='https://fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="css/style.css" media="screen">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/appControllers.js"></script>
        <script type="text/javascript" src="js/modal.js"></script>
        <title>Matcha</title>
    </head>
    <body>
        <?php require('views/userAccess.html'); ?>
        <div id="app_ui">
            <header class="flex_container toolbar">
                <div class="flex_container branding" id="logo">
                    <img src="imgs/app/bg.png" class="brand_logo_sm">
                    <h1 class="logo_text"> ATCHA</h1>
                </div>
                <nav class="flex_container" id="nav_container">
                    <a id="search_btn" class="btn">
                        <span><i class="material-icons">search</i> Search</span>
                    </a>
                    <a id="profile_btn" class="btn" href="#/my-profile">
                        <span><i class="material-icons">account_circle</i> Profile</span>
                    </a>
                </nav>
            </header>

            <section id="main_content" class="app_views_container flex_container">
                <?php require('views/profile.html'); ?>
                <div id="browser_page" class="flex_col_container page">
                    <!-- PAGE TITLE -->
                    <div class="flex_container margin_tb_24">
                        <h2 class="center">Singles near you</h2>
                    </div>

                    <!-- CONTAINER FOR MINI PROFILE CARDS -->
                    <div id="profiles" class="flex_container mini_profiles_view">
                        <!-- MINI PROFILE CARD TEMPLATE -->
                        <div class="flex_col_container card mini_profile center">
                            <h3 class="profile_username"> sweet-cheeks </h3>
                            <div class="flex_container margin_4">
                                <img src="imgs/app/avt.svg" alt="#" id="profile_img" />
                            </div>
                            <div class="flex_container card_actions margin_4">
                                <button class="theme_link btn profile_like" name="like">
                                    <i class="material-icons">favorite_outline</i>
                                </button>
                                <button class="theme_link btn profile_info">
                                    <i class="material-icons">info</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PROFILE VIEWING MODAL -->
                <div class="modal">
                    <!-- MODAL'S CONTENT CONTAINER -->
                    <div class="flex_col_container modal_content">
                        <button class="theme modal_close">
                            <i class="material-icons">clear</i>
                        </button>
                        <div class="margin_8 flex_container">
                            <h3 class="center info_uname"> Kennedy </h3>
                        </div>
                        <div class="flex_container">
                            <div class="flex_col_container padding_8 margin_8 flex_1">
                                <img src="imgs/app/avt.svg" class="circle margin_4 info_dp">
                            </div>
                            <div class="flex_2 flex_col_container">
                                <div class="card padding_long margin_4">
                                    <p><b>First-name: </b><span class="info_fname"> Kenneth </span></p>
                                    <p><b>Last-name: </b><span class="info_lname"> Dean </span></p>
                                    <p><b>Sex: </b><span class="info_sex"> Male </span></p>
                                    <p><b>I like: </b><span class="info_pref"> Women </span></p>
                                    <p><b>About me: </b>
                                        <span class="info_bio">
                                            Even 'blah blah' can
                                            lead to great things :)
                                        </span>
                                    </p>
                                </div>
                                <div class="card padding_8 margin_4">
                                    <p><b>Likes: </b><span class="profile_likes"> 19 </span></p>
                                    <p><b>Matches: </b><span class="profile_matches"> 9 </span></p>
                                    <p><b>Rating: </b><span class="profile_rating"> 7/10 </span></p>
                                </div>
                                <br>
                                <div class="margin_8">
                                    <button class="theme">
                                        <i class="material-icons">favorite</i></button>
                                    <button class="theme profile_info">
                                        <i class="material-icons">info</i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="flex_container">
                <p>The Matcha Project</p>
                <p>maDezynIzM_E_ 2017</p>
            </footer>
        </div>

        <!-- LOADING ANIMATION/DISTRACTION FOR USERS -->
        <div class="flex_container modal" id="app_loader_cont">
            <div id="loader"></div>
        </div>
    </body>
</html>
