<?php
include("php1/dbconnect.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);
include("../php/dbconnect.php");

if(isset($_POST['reset_password'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $old_password = mysqli_real_escape_string($conn, $_POST['old_password']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // 获取用户信息
    $sql = "SELECT * FROM student WHERE emailid='$email'";
    $result = $conn->query($sql);
    $user = mysqli_fetch_array($result);

    if ($user) {
        $stored_password = $user['about'];

        // 验证旧密码
        if (md5($old_password) === $stored_password) {
            // 验证新密码和确认密码是否一致
            if ($new_password === $confirm_password) {
                // 更新数据库中的密码
                $new_password_hash = md5($new_password);
                $update_sql = "UPDATE student SET about='$new_password_hash' WHERE emailid='$email'";

                if ($conn->query($update_sql)) {
                    echo '<link rel="stylesheet" href="assets/css/popup_style.css">';
                    echo '<div class="popup popup--icon -success js_success-popup popup--visible">
                            <div class="popup__background"></div>
                            <div class="popup__content">
                                <h3 class="popup__content__title">Success</h1>
                                <p>Password has been updated successfully.</p>
                                <p><a href="login.php"><button class="button button--success" data-for="js_success-popup">OK</button></a></p>
                            </div>
                          </div>';
                } else {
                    echo '<link rel="stylesheet" href="assets/css/popup_style.css">';
                    echo '<div class="popup popup--icon -error js_error-popup popup--visible">
                            <div class="popup__background"></div>
                            <div class="popup__content">
                                <h3 class="popup__content__title">Error</h1>
                                <p>Something went wrong. Please try again.</p>
                                <p><button class="button button--error" data-for="js_error-popup">Close</button></p>
                            </div>
                          </div>';
                }
            } else {
                echo '<link rel="stylesheet" href="assets/css/popup_style.css">';
                echo '<div class="popup popup--icon -error js_error-popup popup--visible">
                        <div class="popup__background"></div>
                        <div class="popup__content">
                            <h3 class="popup__content__title">Error</h1>
                            <p>New password and confirmation do not match.</p>
                            <p><button class="button button--error" data-for="js_error-popup">Close</button></p>
                        </div>
                      </div>';
            }
        } else {
            echo '<link rel="stylesheet" href="assets/css/popup_style.css">';
            echo '<div class="popup popup--icon -error js_error-popup popup--visible">
                    <div class="popup__background"></div>
                    <div class="popup__content">
                        <h3 class="popup__content__title">Error</h1>
                        <p>Incorrect original password.</p>
                        <p><button class="button button--error" data-for="js_error-popup">Close</button></p>
                    </div>
                  </div>';
        }
    } else {
        echo '<link rel="stylesheet" href="assets/css/popup_style.css">';
        echo '<div class="popup popup--icon -error js_error-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">Error</h1>
                    <p>Email not found.</p>
                    <p><button class="button button--error" data-for="js_error-popup">Close</button></p>
                </div>
              </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fontso/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="csso/style.css">
</head>
<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="imageso/signup-img.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form action="reset_password.php" method="post" class="register-form" id="register-form">
                        <h2>Reset Password</h2>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" name="email" id="email" required/>
                        </div>
                        <div class="form-group">
                            <label for="old_password">Original Password :</label>
                            <input type="password" name="old_password" id="old_password" required/>
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password :</label>
                            <input type="password" name="new_password" id="new_password" required/>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm New Password :</label>
                            <input type="password" name="confirm_password" id="confirm_password" required/>
                        </div>
                        <div class="form-submit">
                            <input type="submit" value="Reset Password" class="submit" name="reset_password" id="reset_password" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="vendoro/jquery/jquery.min.js"></script>
    <script src="jso/main.js"></script>
</body>
</html>
