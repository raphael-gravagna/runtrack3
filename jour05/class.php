<?php

abstract class Model{
public $bdd;

function __construct(){

    $this->bdd=new PDO('mysql:host=localhost;dbname=runtrack3;charset=utf8','root','');

}

}


class User extends Model{
    private $id;
    public $nom;
    public $prenom;
    public $email;
    protected $password;


public function __construct(){
    parent::__construct();
}

public function Inscription($nom, $prenom, $email, $password){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
      
        //connexion à la base de données pour verifier si le login existe deja 
        $requetesql2 = "SELECT email FROM `utilisateurs` WHERE email = '$this->email'";
            $calcul2 = $this->bdd->prepare($requetesql2);
            $calcul2 -> execute();
            // rowCount permet de compter le nombre d'utilisateur avec ce login
            $result2 = $calcul2->rowCount();

            // Si aucun utilisateur n'a ce login alors je le rentre ne base 
            if(($result2) == 0){
                $requetesql1 = "INSERT INTO `utilisateurs` (`nom`, `prenom`, `email`, `password`) VALUES ('$this->nom', '$this->prenom', '$this->email', '$this->password')";
                $calcul1 = $this->bdd->prepare($requetesql1);
                $calcul1 -> execute();
                //$_SESSION['message'] = '<div class="messageERR">'.'Inscription reussie'.'</div>';
            }else{//$_SESSION['message'] = '<div class="messageERR">'.'Login deja existant'.'</div>';
            }

            //var_dump($result2);
    }

    public function connexion($email, $password){
            $this->email = $email;
            $this->password = $password;

            //recupération du mail dans BDD
            $request = "SELECT email FROM `utilisateurs` WHERE email = '$this->email'";
            $calcul = $this->bdd->prepare($request);
            $calcul -> execute();
            $result = $calcul->rowCount();

             //recupération du password dans BDD
            $request2 = "SELECT password FROM `utilisateurs` WHERE email = '$this->email'";
            $calcul2 = $this->bdd->prepare($request2);
            $calcul2 -> execute();
            // On utilise fetchColumn car la fonction password_verify a besoin d'un résultat sous forme de string
            $result2 = $calcul2-> fetchColumn();
           

            // Création variable récupération décryptage password
            $check_password = $result2;
            var_dump($check_password);
            


            //Vérification que le login existe bien 
            if(($result) == 1){
                //vérification du password
                if(password_verify($password, $check_password)){
                    // Si le password est vérifié alors on récupère toutes les infos user et on les met dans la session
                    $request3 = "SELECT*FROM `utilisateurs` WHERE email = '$this->email'";
                    $calcul3 = $this->bdd->prepare($request3);
                    $calcul3 -> execute();
                    $result3 = $calcul3-> fetchAll(PDO::FETCH_ASSOC);
                    $_SESSION['user'] = $result3;
                        /*if($password === 'admin'){
                            header('location: admin.php');
                        }*/
                    //$_SESSION['message'] = '<div class="messageERR">'.'Connexion reussie'.'</div>';
                    // A rejouter : header('location:')
                }else{//$_SESSION['message'] = '<div class="messageERR">'.'Password incorrect'.'</div>';
                }
            }else{//$_SESSION['message'] = '<div class="messageERR">'.'Login inexistant'.'</div>';
            }
            var_dump($_SESSION['user']);
    }
}