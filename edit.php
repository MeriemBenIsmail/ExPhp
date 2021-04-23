<?php session_start();
include_once 'autoload.php';

$title = 'Edit Person';
include_once 'head.php';

$cin = $_GET['cin'];

$persons = new PersonRepository();


if (isset($_POST['firstname']) && !empty($_POST['firstname'])) {
  $persons->update('firstname', $_POST['firstname'], $cin);
}
if (isset($_POST['lastname']) && !empty($_POST['lastname'])) {
  $persons->update('lastname', $_POST['lastname'], $cin);
}
if (isset($_POST['section']) && !empty($_POST['section'])) {
  $persons->update('section', $_POST['section'], $cin);
}
if (isset($_POST['age']) && !empty($_POST['age'])) {
  $persons->update('age', $_POST['age'], $cin);
}

if (isset($_FILES['image']) && !empty($_FILES['image'])) {
  if ($_FILES['image']['size'] <= 524288) {

    $img_blob = file_get_contents($_FILES['image']['tmp_name']);
    $persons->updatePic('image', $img_blob, $cin);
    header('location:acceuil.php');
  } else {

    $_SESSION['imageSizeError'] = 'Image size is too big !try again ...';
  }
}

if (isset($_POST['submit']) && (!(isset($_FILES['image']) && !empty($_FILES['image'])))) {
  header('location:acceuil.php');
}


?>

<body>

  <div class="container">
    <?php if (isset($_SESSION['imageSizeError'])) { ?>
      <div class="alert alert-danger"><?= $_SESSION['imageSizeError'] ?></div>
    <?php }
    unset($_SESSION['imageSizeError']);
    ?>
    <form action="edit.php?cin=<?= $cin ?>" method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label for="username">Firstname</label>
        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname">
      </div>

      <div class="form-group">
        <label for="username">Lastname</label>
        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname">
      </div>

      <div class="form-group">
        <label for="username">Section</label>
        <input type="text" class="form-control" name="section" id="section" placeholder="Section">
      </div>

      <div class="form-group">
        <label for="username">Age</label>
        <input type="text" class="form-control" name="age" id="age" placeholder="Age">
      </div>
      <div class="form-group">
        <label for="username">Image</label>
        <input type="file" class="form-control" name="image" id="image" placeholder="image">
      </div>


      <button type="submit" name="submit" class="btn btn-primary">Save</button>
      <a href="acceuil.php" class="btn btn-primary">Back</a>
    </form>

  </div>



</body>

</html>