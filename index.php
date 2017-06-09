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
      <nav id="navigation_bar" class="flex_container">
        <div>
          <p href="#">Match me</p>
        </div>
        <div>
          <button type="button" name="button">search</button>
          <button type="button" name="button" id="profile_btn">profile</button>
        </div>
      </nav>
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
      <div>
        <p>The Matcha Project</p>
        <p>maDezynIzM_E_ 2017</p>
      </div>
    </footer>
  </body>
</html>
