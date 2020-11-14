<?php 

// if(isset($_POST["submit"]))
// {

// $connect = mysqli_connect("localhost","root","","moduleconnexion");
// if (mysqli_connect_errno()) 
// {
// 	exit();
// }
			
// $result = mysqli_fetch_all(mysqli_query($connect,"SELECT * FROM utilisateurs"));
// $request = "INSERT INTO utilisateurs (`id`, `login`, `prenom`, `nom`,`password`) VALUES(NULL,'".$_POST["login"]. "','" .$_POST["prenom"]."','".$_POST["nom"].   "','".$_POST["password"]."')";

// mysqli_query($connect, $request);
// mysqli_close($connect);
				
				
// header("location:connexion.php");				
// }

if (!empty($_POST))
{
    
    $con = mysqli_connect("localhost", "root", "", "moduleconnexion");
    $nom = $_POST["nom"];
    $login = $_POST["login"];
    $prenom = $_POST["prenom"];
    $password = $_POST["password"];
    $password2 =  $_POST["password2"];

    if($password == $password2)
    {
        $req = "INSERT INTO utilisateurs (nom, login, prenom, password) VALUE ('$nom','$login','$prenom','$password')";
        // $req = "INSERT INTO nul (nom) VALUE ('".$_POST['nom']."')";
        $result = mysqli_query($con, $req)
        or die("requete impossible");

        if(isset($_POST['submit']))
        {
            header('Location:connexion.php');
        }
    }
    else
    {
        $incorrectMp = "Mots de passe non similaires";

    }
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
                        <input type="text" id="login" name="login">
                    </article>
                    <article class="firstName_ins">
                        <label for="enterFirstName">Prénom :</label>
                        <input type="text" id="enterFirstName" name="prenom">
                    </article>
                    <article class="lastName_ins">
                        <label for="enterLastName">Nom :</label>
                        <input type="text" id="enterLastName" name="nom">
                    </article>
                    <article class="mp_ins">
                        <label for="enterMp">Votre mot de passe (au moins 8 caractères) : </label>
                        <input pattern=".{8,}" type="password" id="enterMp" name="password">
                    </article>    
                    <article class="mp_ins">
                        <label for="confirmMp">Confirmez votre mot de passe :</label>
                        <input pattern=".{8,}" type="password" id="confirmMp" name="password2">
                    </article>  
                    <article class="button_ins">
                        <button type="submit" value="Submit"  name="submit">Valider</button>
                    </article>
                    <?php if(!empty($incorrectMp)){ echo '<p>'. $incorrectMp .'</p>';}?>
                </form>
            </section>
        </main>

        <footer class="footer_ins">
            <p>Yaya-production™️</p>
        </footer>
        
    
    </body>
</html>