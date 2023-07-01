    <p style="color:red;text-align:center;font-size:20px;font-weight:bold;font-style:italic;">
        <?php
            if(isset($_SESSION['incorrect-userpass'])){
                echo $_SESSION['incorrect-userpass'];
                unset($_SESSION['incorrect-userpass']);
                session_destroy();
            }
        ?>
    </p>

    <p style="color:red;text-align:center;font-size:15px;font-weight:bold;font-style:italic;">
        <?php
            if(isset($_SESSION['password-not-match'])){
                echo $_SESSION['password-not-match'];
                unset($_SESSION['password-not-match']);
                session_destroy();
            }
        ?>
    </p>

    <p style="color:red;text-align:center;font-size:15px;font-weight:bolder;">
        <?php
            if(isset($_SESSION['mobile_length_error'])){
                echo $_SESSION['mobile_length_error'];
                unset($_SESSION['mobile_length_error']);
                session_destroy();
            }
        ?>
    </p>
