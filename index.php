<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/md_style.css" media="screen">
    <link rel="stylesheet" href="css/style.css" media="screen">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/modal.js"></script>
<!--     <script type="text/javascript" src="js/helperFunctions.js"></script>-->
     <script type="text/javascript" src="js/matcha.js"></script>
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
                <a id="search_btn" class="nav_btn">search</a>
                <a id="profile_btn" class="nav_btn">profile</a>
            </div>
        </header>
        <section id="main_content" class="flex_container">
          <?php require('includes/profile.html'); ?>
            <div id="browser_page" class="flex_col_container">
              <h2>Matches near you</h2>
              <div id="profiles" class="flex_container">

              </div>
            </div>
        </section>
        <footer>
            <p>The Matcha Project</p>
            <p>maDezynIzM_E_ 2017</p>
        </footer>
      </div>
  </body>
</html>
