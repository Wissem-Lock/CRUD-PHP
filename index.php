<?php require('db.php') ;

if(isset($_POST)){
    if (isset($_POST['add']) && !empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['firstname'])) {
        $name = trim(strip_tags($_POST['name']));
        $firstname = trim(strip_tags($_POST['firstname']));
        $email = trim(strip_tags($_POST['email']));
        $query_insert = $pdo->prepare("INSERT INTO users (name, firstname, email) VALUES ( :name , :firstname , :email)");
        $query_insert->bindParam('name', $name, PDO::PARAM_STR);
        $query_insert->bindParam('firstname', $firstname, PDO::PARAM_STR);
        $query_insert->bindParam('email', $email, PDO::PARAM_STR);
        $query_insert->execute();
    }
}


if (isset($_GET)) {
    /* DELETE */
    if(!empty($_GET['delete'])){
        $user_id = trim(strip_tags($_GET['delete']));
        $query_delete = $pdo->prepare("DELETE FROM users WHERE id = :id ");
        $query_delete->bindParam('id', $user_id, PDO::PARAM_INT);
        $query_delete->execute();
        header('location: index.php'); /* ne pas laisser 1ere ligne du fichier php en html sinon fonctionne pas */
    }
}

/* SELECT */
$query_select = $pdo->query("SELECT * FROM users");
$show_users = $query_select->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CRUD</title>
</head>
<body>


<table class="table table-dark table-bordered container">
    <thead>
    <tr>
        <th>Name</th>
        <th>FirstName</th>
        <th>Email</th>
        <th>Update</th>
        <th>DELETE</th>

    </tr>
    </thead>
    <tbody>
<?php
foreach ($show_users as $user): ?>
    <tr>
        <td><?php echo $user['name'] ?></td>
        <td><?php echo $user['firstname'] ?></td>
        <td><?php echo $user['email'] ?></td>

        <td>
            <a class="btn btn-primary" href="update.php?update=<?= $user['id'] ?>">Update</a>
        </td>
        <td>

            <a class="btn btn-primary" href="index.php?delete=<?=  $user['id'] ?>">Delete</a>

        </td>
    </tr>
<?php endforeach; ?>

    </tbody>
</table>



<form action="" method="post">
    <input type="text" name="name" placeholder="name">
    <input type="text" name="firstname" placeholder="firstname">
    <input type="text" name="email" placeholder="email">
    <input class="btn btn-primary" name="add" type="submit" value="Ajouter">
</form>



</body>
</html>