<?php
session_start();

if (isset($_SESSION['user'])) {
    header('location:acceuil.php');
}


$title = "Login";
include_once('head.php');

?>

<body>
    <div class="container">
        <form action="loginProcess.php" method="post">
            <?php if (isset($_SESSION['IncorrectFieldsError'])) { ?>
                <div class="alert alert-danger"><?= $_SESSION['IncorrectFieldsError'] ?></div>
            <?php }
            unset($_SESSION['IncorrectFieldsError']);
            ?>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <a href="inscription.php" class="btn btn-info">Inscrivez-vous</a>
    </div>

</body>

</html>
