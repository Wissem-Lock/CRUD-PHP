<?php require_once 'db.php';



if (isset($_POST['update']) && !empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['firstname'])) {
    $user_id = trim(strip_tags($_GET['update']));
    $name = trim(strip_tags($_POST['name']));
    $firstname = trim(strip_tags($_POST['firstname']));
    $email = trim(strip_tags($_POST['email']));
    $query_update = $pdo->prepare("UPDATE users SET name = :name, firstname = :firstname, email = :email WHERE id = :id");
    $query_update->bindParam('name', $name, PDO::PARAM_STR);
    $query_update->bindParam('firstname', $firstname, PDO::PARAM_STR);
    $query_update->bindParam('email', $email, PDO::PARAM_STR);
    $query_update->bindParam('id', $user_id, PDO::PARAM_INT);
    if ($query_update->execute()){
        header("location: index.php");
    } else {
        echo('fail');
    }
}



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
<form action="" method="post">
    <input type="text" name="name" placeholder="name">
    <input type="text" name="firstname" placeholder="firstname">
    <input type="text" name="email" placeholder="email">
    <input class="btn btn-primary" name="update" type="submit" value="Update">
</form>


</body>
</html>