<!--
@Author: Dregend Drewonidas <root>
@Date:   Wednesday, October 26, 2016 10:58 AM
@Email:  dlaminiandrew@gmail.com
@Last modified by:   root
@Last modified time: Tuesday, November 1, 2016 3:39 AM
@License: maDezynIzM.E. 2016
-->

<div class="md_container md_full_size md_float_mid page" id="profile">
    <div class="md_col_container column" id="left_side">
        <div class="md_container left_section">
            <img src="imgs/app/user.svg" alt="#" id="profile_img" />
            <p>
                <?php
                if ($_SESSION) {
                    echo $_SESSION['uname'];
                }
                ?>
            </p>
            <p> </p>
        </div>
        <div class="md_col_container left_section" id="stats">
            <p>
                Lorem ipsum dolor sit ame
            </p>
            <p>
                Lorem ipsum dolor sit ame
            </p>
            <p>
                Lorem ipsum dolor sit ame
            </p>
        </div>
        <div class="md_col_container left_section" id="actions">
            <button type="button" name="edit">Edit profile</button>
            <button type="button" name="settings">Settings</button>
            <button type="button" name="sign_out" id="sign_out_btn">Sign-out</button>
        </div>
    </div>
    <div class="md_col_container column" id="right_side">
        <div class="md_col_container" id="about">
            <p id="profile_fname">
                First name:
            </p>
            <p id="profile_lname">
                Last name:
            </p>
            <p id="profile_age">
                Age:
            </p>
            <p id="profile_sex">
                Sex:
            </p>
            <p id="profile_pref">
                Sexual preference:
            </p>
            <p id="profile_location">
                Location:
            </p>
        </div>
        <div class="md_container" id="conn_img_gallery">
        </div>
    </div>
</div>