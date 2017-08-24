<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!--    <link rel="stylesheet" href="css/md_style.css" media="screen">-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href='https://fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>
        <link rel="stylesheet" href="css/style.css" media="screen">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/modal.js"></script>
        <!--     <script type="text/javascript" src="js/helperFunctions.js"></script>-->
        <script type="text/javascript" src="js/matcha.js"></script>
        <title>Matcha</title>
    </head>
    <body>
    <!-- LOADING MODAL -->
        <div class="flex_container" id="app_loader_cont">
            <div id="loader"></div>
        </div>
        <?php require('includes/userAccess.html'); ?>
        <div id="app_ui">
            <header class="flex_container toolbar">
                <div class="flex_container" id="logo">
                    <img src="imgs/app/bg.png" id="logo_img">
                    <h1 id="logo_text"> ATCHA</h1>
                </div>
                <nav class="flex_container" id="nav_container">
                    <a id="search_btn" class="nav_btn" href="">
                        <span><i class="material-icons">search</i> Search</span>
                    </a>
                    <a id="profile_btn" class="nav_btn">
                        <span><i class="material-icons">account_circle</i> Profile</span>
                    </a>
                </nav>
            </header>
            <section id="main_content" class="flex_container">
                <?php require('includes/profile.html'); ?>
                <div id="browser_page" class="flex_col_container page">
                    <!-- PAGE TITLE -->
                    <div class="flex_container margin_tb_24">
                        <h2 class="center">Singles near you</h2>
                    </div>
                    <!-- CONTAINER FOR MINI PROFILE CARDS -->
                    <div id="profiles" class="flex_container mini_profiles_view">
                        <!-- MINI PROFILE CARD TEMPLATE -->
                        <div class="flex_col_container card mini_profile">
                            <div class="flex_container margin_4">
                                <!-- PROFILE MAIN/DISPLAY PICTURE -->
                                <img src="imgs/app/avt.svg" alt="#" id="profile_img" />
                                <!-- PROFILE USERNAME AND STATS -->
                                <div class="flex_col_container padding_16">
                                    <h3 class="profile_username"> sweet-cheeks </h3>
                                    <br>
                                    <p>Likes: <span class="profile_likes"> 19 </span></p>
                                    <p>Matches: <span class="profile_matches"> 9 </span></p>
                                    <p>Rating: <span class="profile_rating"> 7/10 </span></p>
                                </div>
                            </div>
                            <!-- CONTAINER FOR ACTION BUTTONS -->
                            <div class="flex_container card_actions margin_4">
                                <button class="theme_button_1 profile_like" name="like">
                                    <i class="material-icons">favorite_outline</i>
                                </button>
                                <button class="theme_button_1 profile_info">
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
                        <!-- BUTTON TO CLOSE MODAL -->
                        <button class="theme_button_1 modal_close">
                            <i class="material-icons">clear</i>
                        </button>
                        <div class="margin_8 flex_container">
                            <h3 class="center"> Kennedy </h3>
                        </div>
                        <div class="flex_container">
                            <div class="flex_col_container padding_8 margin_8 flex_1">
                                <img src="imgs/app/avt.svg" class="circle margin_4">
                            </div>
                            <div class="flex_2 flex_col_container">
                                <div class="card padding_long margin_4">
                                    <p><b>First-name: </b><span> Kenneth </span></p>
                                    <p><b>Last-name: </b><span> Dean </span></p>
                                    <p><b>Sex: </b><span> Male </span></p>
                                    <p><b>I like: </b><span> Women </span></p>
                                    <p><b>About me: </b><span> Even 'blah blah' can
                                            <br>lead to great things :)</span></p>
                                </div>
                                <div class="card padding_8 margin_4">
                                    <p><b>Likes: </b><span class="profile_likes"> 19 </span></p>
                                    <p><b>Matches: </b><span class="profile_matches"> 9 </span></p>
                                    <p><b>Rating: </b><span class="profile_rating"> 7/10 </span></p>
                                </div>
                                <br>
                                <div class="margin_8">
                                    <button class="theme_button_1">
                                        <i class="material-icons">favorite</i></button>
                                    <button class="theme_button_1 profile_info">
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
    </body>
</html>
