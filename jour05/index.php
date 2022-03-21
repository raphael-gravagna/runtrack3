<?php
require ("class.php");
var_dump($this->bdd);
$message = '';
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype'])){
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    //Si le password et le password_retype identiques alors je crypte le mdp et j'appel la fonction d'inscription 
    if($password === $password_retype){
        $password = password_hash($password, PASSWORD_BCRYPT);
        $user = new User();
        $user->Inscription($nom, $prenom, $email, $password);
    }
    else{
        $message = 'Passwords non-identiques';
    }
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
        <h1>INSCRIPTION</h1>
        <?php echo $message; ?>
        <?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} ?>
        <p><input type="text" name="nom" class="zonetext" required="required" placeholder="Nom..."></p>
        <p><input type="text" name="prenom" class="zonetext" required="required" placeholder="Prenom..."></p>
        <p><input type="text" name="email" class="zonetext" required="required" placeholder="Mail ..."></p>
        <p><input type="password" name="password" class="zonetext" required="required" placeholder="Password ..."></p>
        <p><input type="password" name="password_retype" class="zonetext" required="required" placeholder="Password Confirmation ..."></p>
        <p><input type="submit" class="boutonvalidation" name="submit"></p>

    </form>
</main>
</body>
</html>
