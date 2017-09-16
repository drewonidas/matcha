    <?php
/*
@Author: Dregend Drewonidas <root>
@Date:   Saturday, October 22, 2016 6:57 AM
@Email:  dlaminiandrew@gmail.com
@Last modified by:   root
@Last modified time: Tuesday, October 25, 2016 2:27 AM
@License: maDezynIzM.E. 2016
*/
    var_dump($_FILES);
    exit();
    $img_dir = "../imgs/uploads/";
    $new_img_dir = $img_dir . basename($_POST['imageFile']);
    $img_name = $_POST['imageFile'];
    $img_tmp_name = $_POST['imageFile'];
    $img_type = $_POST['imageFile'];
    $ok = 1;
    echo '<br/>' . $_POST['imageFile'] . '<br/>';
    // Check if image file is a actual image or fake image

    // if everything is ok, try to upload file
    if ($ok == 0) {
        echo "image was not uploaded!";
    } else {
        if (move_uploaded_file($img_tmp_name, $new_img_dir)) {
            echo "The file ". $img_name . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
?>
