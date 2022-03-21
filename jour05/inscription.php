<?php
require ("class.php");
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype'])){
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    if($password === $password_retype){
        $password = password_hash($password, PASSWORD_BCRYPT);
        $user = new User();
        $user->Inscription($nom, $prenom, $email, $password);
    }
    else{
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
    <script language="javascript" type="text/javascript">
        var b_nom=false; var b_prenom=false; var b_email=false; var b_password=false; var b_password_retype=false;

        function envoyer() {
            if(b_nom==true && b_prenom==true && b_email==true && b_password==true && b_password_retype==true) {
                document.getElementById("message").innerText = "Envoi serveur";
                //document.getElementById("inscription").submit();
            }
            else {
                document.getElementById("message").innerText = "Le formulaire est incomplet";

            }
            document.getElementById("message").innerText += "-" + b_nom + "-" + b_prenom + "-" + b_email + "-" + b_password + "-" + b_password_retype + "-" + b_password_retype;
            console.log(b_nom + "-" + b_prenom + "-" + b_email + "-" + b_password + "-" + b_password_retype + "-" + b_password_retype)
        }
    </script>

    <script src=script.js async="async"></script>

</head>
<body class='body'>

<main class="main">
    <form id="inscription" action="" method="post">
        <h1>INSCRIPTION</h1>
        <p><input type="text" name="nom" id="nom" class="zonetext" required="required" value="Nom" onClick="saisie('Nom',this.id)" onMouseOut="retablir('Nom',this.id)" onBlur="mev('Nom',this.id)"></p>
        <p><input type="text" name="prenom" id="prenom" class="zonetext" required="required" value="Prenom" onClick="saisie('Prenom',this.id)" onMouseOut="retablir('Prenom',this.id)" onBlur="mev('Prenom',this.id)"></p>
        <p><input type="text" name="email" id="email" class="zonetext" required="required" value="Mail" onClick="saisie('Mail',this.id)" onMouseOut="retablir('Mail',this.id)" onBlur="mev('Mail',this.id)"></p>
        <p><input type="password" name="password" id="password" class="zonetext" required="required" value="Password" onClick="saisie('Password',this.id)" onMouseOut="retablir('Password',this.id)" onBlur="mev('Password',this.id)"></p>
        <p><input type="password" name="password_retype" id="password_retype" class="zonetext" required="required" value="Password Confirmation" onClick="saisie('Password Confirmation',this.id)" onMouseOut="retablir('Password Confirmation',this.id)" onBlur="mev('Password Confirmation',this.id)"></p>
        <p><input type="submit" class="boutonvalidation" name="submit" id="valid_inscr" value="Valider" onClick="envoyer()"></p>

    </form>
    <div style="width:800px;display:inline-block;" id="conteneur">
    <div id="message">
    </div>
    </div>

</main>
</body>
</html>
