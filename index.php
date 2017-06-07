<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/md_style.css" media="screen">
        <link rel="stylesheet" href="css/style.css" media="screen">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/modal.js"></script>
        <!-- <script type="text/javascript" src="js/funcs.js"></script> -->
        <!-- <script type="text/javascript" src="js/matcha.js"></script> -->
        <title>Matcha</title>
    </head>
    <body>
        <header>
          <div id="navigation_bar" class="flex_container">
            <div id="left_side">
                <a href="#">Match me</a>
            </div>
            <div id="right_side">
                <button type="button" name="button">search</button>
                <button type="button" name="button" id="profile_btn">profile</button>
            </div>
          </div>
        </header>
        <section id="main_content" class="flex_container">
          <?php require('includes/userAccess.html');
          require('includes/profile.html'); ?>
            <div id="browser_page" class="flex_col_container">
              <h2>Matches near you</h2>
              <div id="profiles" class="flex_container">

              </div>
            </div>
        </section>
        <footer>
            <h1>someone has to give them a kick every once in a while</h1>
        </footer>
    </body>
</html>
