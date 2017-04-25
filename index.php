<!DOCTYPE html>

<!--
@Author: Dregend Drewonidas <root>
@Date:   Tuesday, October 25, 2016 5:28 AM
@Email:  dlaminiandrew@gmail.com
@Last modified by:   root
@Last modified time: Thursday, November 10, 2016 2:14 AM
@Last modified time: Thursday, November 10, 2016 2:14 AM
@License: maDezynIzM.E. 2016
-->

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/md_style.css" media="screen">
        <link rel="stylesheet" href="css/main.css" media="screen">

        <title>Matcha</title>
    </head>

    <body>
        <div class="md_container md_full_size">
            <?php require_once('includes/main.php'); ?>
            <div class="md_full_size md_float_base">
                <header>
                    <div class="md_nav_bar">
                        <div id="left_side">
                            <a href="#">Match me</a>
                        </div>
                        <div id="right_side">
                            <button type="button" name="button">search</button>
                            <button type="button" name="button" id="profile_btn">profile</button>
                        </div>
                    </div>
                </header>
                <?php require_once('includes/profile.php'); ?>
                <div class="md_full_size md_float_base page" id="home">
                    <section class="md_col_container">
                        <h1>I am the main content</h1>

                    </section>
                    <footer class="md_col_container">
                        <h1>someone has to give them a kick every once in a while</h1>
                    </footer>
                </div>
                <div class="md_full_size md_float_base page" id="error_page">
		            <h1>Sorry, something went wrong... like, reeeaally wrong :(</h1>
	            </div>
            </div>
        </div>

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/funcs.js"></script>
        <script type="text/javascript" src="js/matcha.js"></script>
        <script type="text/javascript" src="js/modal.js"></script>
    </body>
</html>
