<?php
session_start();

if (isset($_SESSION['user'])) {
    header('location:acceuil.php');
}


$title = "Sign Up";
include_once('head.php');

?>

<body>
    <div class="container">
        <form action="inscriptionProcess.php" method="post">
        <?php if (isset($_SESSION['usernameUsed'])) { ?>
                <div class="alert alert-danger"><?= $_SESSION['usernameUsed'] ?></div>
            <?php }
            unset($_SESSION['usernameUsed']);
        ?>

        <?php if (isset($_SESSION['shortPwdError'])) { ?>
                <div class="alert alert-danger"><?= $_SESSION['shortPwdError'] ?></div>
            <?php }
            unset($_SESSION['shortPwdError']);
        ?>

        <?php if (isset($_SESSION['requiredFieldsError'])) { ?>
                <div class="alert alert-danger"><?= $_SESSION['requiredFieldsError'] ?></div>
            <?php }
            unset($_SESSION['requiredFieldsError']);
        ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>
        </form>
        
    </div>
</body>

</html>