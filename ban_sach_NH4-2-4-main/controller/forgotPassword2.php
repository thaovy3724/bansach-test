<?php
    if (isset($_POST['submit_verify'])) {
        $maxacnhan = $_POST['maxacnhan'];
        if ($maxacnhan === $_SESSION['reset_password']['verify_code']) {
            header("Location:index.php?page=forgotPassword3");
        }
        else {
            $notif = 'Mã xác nhận không đúng';
            echo "<script>alert('{$notif}')</script>";
        }
    }
    $result = getLimitProductBestSeller(12);
    $category = getAllCategory();
    require_once "view/forgotPasswordPage2.php";
?>