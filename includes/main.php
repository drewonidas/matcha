<!--
@Author: Dregend Drewonidas <root>
@Date:   Wednesday, October 26, 2016 12:05 PM
@Email:  dlaminiandrew@gmail.com
@Last modified by:   root
@Last modified time: Tuesday, November 1, 2016 4:25 AM
@License: maDezynIzM.E. 2016
-->

<div class="md_col_container md_full_size md_float_mid page" id="access_page">
    <!--
        login form
    -->
    <form class="md_card" method="POST" id="sign_in_form">
        <h1 class="card_title">Login</h1>
        <div class="md_input_wrapper">
            <p>Username/E-mail:</p>
            <input type="text" name="uname" id="uname" required>
        </div>
        <div class="md_input_wrapper">
            <p>Password:</p>
            <input type="text" name="password" id="password" maxlength="10" required>
        </div>
        <div class="md_input_wrapper">
            <input type="button" name="submit_login" id="submit_login" value="Sign-in">
        </div>
        <div class="md_options md_container">
            <a>uhm...I dont have an account!</a>
            <a>haha..I forgot my password!</a>
        </div>
    </form>
        <!--
			registration form
		-->
		<form class="md_card" method="post" id="sign_up_form">
			<h1 class="card_title">Register</h1>
			<div class="md_input_wrapper">
				<p>Username:</p>
				<input type="text" name="new_uname" id="new_uname" required>
			</div>
            <div class="md_input_wrapper">
				<p>First name:</p>
				<input type="text" name="fname" id="fname" required>
			</div>
      <div class="md_input_wrapper">
				<p>Last name:</p>
				<input type="text" name="lname" id="lname" required>
			</div>
			<div class="md_input_wrapper">
				<p>E-mail:</p>
				<input type="email" name="email" id="email" placeholder="example@here.com" required>
			</div>
			<div class="md_input_wrapper">
				<p>Password:</p>
				<input type="text" name="password1" id="password1" maxlength="10" required>
			</div>
			<div class="md_input_wrapper">
				<p>Re-enter password:</p>
				<input type="text" name="password2" id="password2" maxlength="10" required>
			</div>
			<div class="md_input_wrapper">
                <input type="button" name="submit_reg" id="submit_reg" value="Sign-up">
			</div>
			<div class="md_options md_container">
				<a>uhm...I have an account!</a>
			</div>
		</form>
    <p id="response">blah blah blah</p>
</div>
