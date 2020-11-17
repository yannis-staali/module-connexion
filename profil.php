<?php 
session_start();

//La page ne s'affiche que si la SESSION 'connexion' est bien crée (en page connexion)
if(!isset($_SESSION['connexion']))
{
    //Autrement on redirige vers connexion
    header('location: connexion.php');
    exit();
}
//ici on stocke le contenu de la variable SESSION (le login entré precedemment) dans $loginverify
//pour pouvoir l'utiliser pour fixer la ligne lors de la requete UPDATE
$loginverify = $_SESSION['connexion'];

//on verifie que le boutton submit a bien été cliqué
if(isset($_POST['submit']))
{
    //on verifie que le formulaire ne soit pas vide hein
    if(!empty($_POST))
    {   
        //on utilise des variables intermédiaires
        $login= $_POST['login'];
        $prenom= $_POST['prenom'];
        $nom= $_POST['nom'];
        $password = $_POST['password'];
        $password2= $_POST['password2'];

        //on verifie que les deux mots de passe soit similaires
        if($password==$password2)
        {
            //hachage du password
            $password3 = password_hash($password, PASSWORD_BCRYPT, array('cost' =>10 ));

            //coonexion a la BDD
            $connexion = mysqli_connect("localhost","root","","moduleconnexion") or die('erreur');

            //ici on verifie qu'une ligne contenant déjà le login choisi n'existe pas
            $reget = ("SELECT * FROM utilisateurs WHERE login='$login' ");
            //lancement de la requete
            $regetx = mysqli_query($connexion, $reget);
            //cette fonction compte le nombre de lignes retourné
            $row = mysqli_num_rows($regetx); //elle ne retournera que 0 ou 1 puisque on a verouillé les doulbons dans la page inscription
            
            //si le resultat est 0 c'est qu'il n'y a pas de doublon
            if($row==0)
            {
            //on peut alors lancer la requete UPDATE pour changer les infos
            $requete = ("UPDATE `utilisateurs` SET login = '$login', prenom = '$prenom', nom = '$nom', password = '$password3' WHERE login = '$loginverify' ");
            $query = mysqli_query($connexion, $requete);
            echo "<p style='color: white'>" . "Vous avez bien modifié vos informations". "</p>";
            }
            else echo "<p style='color: white'>" . "Ce pseudo existe deja". "</p>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="module.css" />
        <title>Profil</title>
    </head>  

    <body class="bodyinscription">
        <header class="header_ins">
            <h1>Profil</h1>
        </header>

        <main class="main_ins">
            <section class="boite_ins">
                <form class="form_ins" action="profil.php" method="post">
                <h1 class="head_profile">Modifiez vos informations</h2>
                    <article class="pseudo_ins">
                        <label for="login">Votre pseudo :</label>
                        <input type="text" id="login" name="login" required>
                    </article>
                    <article class="firstName_ins">
                        <label for="enterFirstName">Prénom :</label>
                        <input type="text" id="enterFirstName" name="prenom" required>
                    </article>
                    <article class="lastName_ins">
                        <label for="enterLastName">Nom :</label>
                        <input type="text" id="enterLastName" name="nom" required>
                    </article>
                    <article class="mp_ins">
                        <label for="enterMp">Votre mot de passe : </label>
                        <input type="password" id="enterMp" name="password" required>
                    </article>
                    <article class="mp_ins">
                        <label for="confirmMp">Confirmez votre mot de passe :</label>
                        <input type="password" id="confirmMp" name="password2" >
                    </article>      
                    <article class="button_ins">
                        <button type="submit" name="submit">Valider</button>
                    </article>
                    <a href="deconnexion.php">Deconnexion</a>
                </form>
            </section>
        </main>

        <footer class="footer_ins">
            <p>Yaya-production™️</p>
        </footer>
        
    
    </body>
</html>