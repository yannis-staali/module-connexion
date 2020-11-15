<?php

if(isset($_POST['submit']))
{
    $login = $_POST['login'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    if($login && $prenom && $nom && $password)
    {
        if($password==$password2)
        {
            $connexion = mysqli_connect("localhost","root","","moduleconnexion") or die('erreur');

            $reget = ("SELECT * FROM utilisateurs WHERE login='$login' ");
            $regetx = mysqli_query($connexion, $reget);
            $row = mysqli_num_rows($regetx);

            if($row==0)
            {
            $requete = ("INSERT INTO utilisateurs (`login`, `prenom`, `nom`, `password`) VALUE ('$login','$prenom','$nom','$password')");
            $query = mysqli_query($connexion, $requete);
            header('location: connexion.php');
            }
            else echo "<p style='color: white'>" . "Ce pseudo n'est pas disponible". "</p>";
        }
        else echo "<p style='color: white'>" . "les deux mots de passe doivent être identiques". "</p>";
    }
    else echo "<p style='color: white'>" . "Veuillez renseigner tous les champs". "</p>";
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="module.css" />
        <title>Inscription</title>
    </head>  

    <body class="bodyinscription">
        <header class="header_ins">
            <h1>Inscription</h1>
        </header>

        <main class="main_ins">
            <section class="boite_ins">
                <form class="form_ins" action="inscription.php" method="post">
                    <article class="pseudo_ins">
                        <label for="login">Votre pseudo :</label>
                        <input type="text" id="login" name="login" >
                    </article>
                    <article class="firstName_ins">
                        <label for="enterFirstName">Prénom :</label>
                        <input type="text" id="enterFirstName" name="prenom" >
                    </article>
                    <article class="lastName_ins">
                        <label for="enterLastName">Nom :</label>
                        <input type="text" id="enterLastName" name="nom" >
                    </article>
                    <article class="mp_ins">
                        <label for="enterMp">Votre mot de passe (au moins 8 caractères) : </label>
                        <input pattern=".{8,}" type="password" id="enterMp" name="password" >
                    </article>    
                    <article class="mp_ins">
                        <label for="confirmMp">Confirmez votre mot de passe :</label>
                        <input pattern=".{8,}" type="password" id="confirmMp" name="password2" >
                    </article>  
                    <article class="button_ins">
                        <button type="submit" value="Submit"  name="submit">Valider</button>
                    </article>
                </form>
            </section>
        </main>

        <footer class="footer_ins">
            <p>Yaya-production™️</p>
        </footer>
        
    
    </body>
</html>