<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <!--    <link rel="stylesheet" href="css/md_style.css" media="screen">-->
        <link rel="stylesheet" href="css/style.css" media="screen">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/modal.js"></script>
        <!--     <script type="text/javascript" src="js/helperFunctions.js"></script>-->
         <script type="text/javascript" src="js/matcha.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <title>Matcha</title>
    </head>
    <body>
        <div class="flex_container" id="app_loader_cont">
            <div id="loader"></div>
        </div>
        <?php require('includes/userAccess.html'); ?>
        <div id="app_ui">
            <header class="flex_container">
                <div class="flex_container" id="logo">
                    <img src="imgs/app/bg.png" id="logo_img">
                    <h1 id="logo_text"> ATCHA</h1>
                </div>
                <div class="flex_container" id="nav_container">
                    <a id="search_btn" class="nav_btn">
                        <span><i class="material-icons">search</i> Search</span>
                    </a>
                    <a id="profile_btn" class="nav_btn">
                        <span><i class="material-icons">account_circle</i> Profile</span>
                    </a>
                </div>
            </header>
            <section id="main_content" class="flex_container">
            <?php require('includes/profile.html'); ?>
            <div id="browser_page" class="flex_col_container">
                <h2 style="color: white">Matches near you</h2>
                <br>
                <div id="profiles" class="flex_container mini_profiles_view">
                    <div class="flex_col_container padding_16 card mini_profile">
                        <img src="imgs/app/avt.svg" alt="#" id="profile_img" />
                        <div class="flex_col_container">
                            <h3 class="profile_username"> sweet-cheeks </h3>
                            <br>
                            <p>Likes: <span class="profile_likes"> 19 </span></p>
                            <p>Matches: <span class="profile_matches"> 9 </span></p>
                            <p>Rating: <span class="profile_rating"> 7/10 </span></p>
                        </div>
                        <br>
                        <div class="flex_container card_actions">
                            <button class="theme_button"><i class="material-icons">favorite</button>
                            <button class="theme_button profile_info"><i class="material-icons">info</button>
                        </div>
                    </div>
                </div>
            </div>
                <div class="modal">
                    <img src="imgs/app/avt.svg" class="card center">
                </div>
            </section>
            <footer>
                <p>The Matcha Project</p>
                <p>maDezynIzM_E_ 2017</p>
            </footer>
        </div>
    </body>
</html>
