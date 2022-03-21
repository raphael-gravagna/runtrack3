<?php
require ("class.php");

$message = '';
if(isset($_POST['email']) && isset($_POST['password'])){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    
        $user = new User();
        $user->connexion($email, $password);
    }
    else{
        $message = 'Utilisateur invalide';
    
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styleOrdi.css">
    <title>Inscription</title>
</head>
<body class='body'>

<main class="main">
    <form class="formContainer" action="" method="post">
        <h1>CONNEXION</h1>
        <?php echo $message; ?>
        <?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} ?>
        <p><input type="text" name="email" class="zonetext" required="required" placeholder="Mail ..."></p>
        <p><input type="password" name="password" class="zonetext" required="required" placeholder="Password ..."></p>
        <p><input type="submit" class="boutonvalidation" name="submit"></p>

    </form>
</main>
</body>
</html>
