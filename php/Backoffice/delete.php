<?php

include_once '../bdd.php';

$nomID = $_POST['delete'];

$nomID = explode("-", $nomID);

$nomTable = $nomID[0];
$id = $nomID[1];

unset($nomID);

$table = executerSQL("SELECT * FROM $nomTable WHERE `id`=$id");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/Office.css">
    <title>Confirmation</title>
</head>
<body>

<!-- HTML afin de demander confirmation de la suppression d'un élément -->

<!-- Div affichant la table -->

    <div>
        <p>Voulez vous réellement supprimer :</p>



        <?php echo "<table style='width: 90%;' border='1' cellpadding='15';>
                        <tbody>
                            <tr>
                            ";
                            
                foreach($table as $key => $value){
                    echo "<td>$key</td>";
                }

              echo          "
                            </tr>
                            <tr>
                            ";

                foreach($table as $value){
                    echo "<td>$value</td>";
                }

                    echo    "
                    </tr>
                    </tbody>
                    </table>";?>

            <br>
            <p> De la table <?php echo $nomTable?> ?</p>
    </div>


    <div style ="display : flex; flex-direction : row">

<!-- Boutons de confirmation et d'annulation -->

    <form action='delete2.php' method='POST'>
        <input type='hidden' value='<?php echo $nomTable?>' name='table'></input>
        <input type='hidden' value='<?php echo $id?>' name='id'></input>
        <button type='submit' class='delete'> Confirmer </button>
    </form>

    <form action='../../Office.php' method='POST'>
    <button type='submit' class='update'> Annuler </button>
    </form>

    </div>
</body>
</html>

<!-- Session -->

<?php
session_start();
if(isset($_SESSION['connexion']) && $_SESSION['droit'] == 1){
    $_SESSION['connexion'] = true;

}
else{
    header('Location: admin.php');
}
?>