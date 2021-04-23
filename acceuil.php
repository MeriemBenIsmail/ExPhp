<?php
include_once 'autoload.php';

include_once 'isAuthentificated.php';
$title = 'Home';
include_once 'head.php';

$PersonRepository = new PersonRepository();
$persons = $PersonRepository->findAll();
?>

<body>  
    <div class="alert alert-success">Bienvenu <?= $_SESSION['user'] ?></div>

    <table class="table">
    <tr>
        <th>CIN</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Section</th>
        <th>Age</th>
        <th>Image</th>
        <th>Option1</th>
        <th>Option2</th>
    </tr>
    <?php foreach ($persons as $personne) {
    ?>
    <tr>
        <td><?= $personne->cin?></td>
        <td><?= $personne->firstname ?></td>
        <td><?= $personne->lastname ?></td>
        <td><?= $personne->section ?></td>
        <td><?= $personne->age ?></td>
    
        <td><?php echo " <img width='300' height='auto'  src='data:image/jpeg;base64,".base64_encode($personne->image)."'></img>" ?></td>
        <td><a class="btn btn-outline-secondary"  href="edit.php?cin=<?=$personne->cin?>">Edit</a></td>

        <td><a class="btn btn-outline-danger" href="delete.php?cin=<?=$personne->cin?>">Delete</a></td>
    </tr>
    <?php
    }
    ?>
</table>
<div>
<a class="btn btn-primary" href="addPerson.php">Add Person</a>
<a href="logout.php" class="btn btn-secondary">Logout</a>
</div>

</body>

</html>