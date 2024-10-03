<?php
include_once '../bdd.php';


/* Function de création des tableaux d'affichage du crud */


function createTab($nomTable){


/* On récupère les valeurs des tables */

    $table = fetchEverything("$nomTable");
    
    echo "
    <table id='dataTable' style='width: 90%;' border='1' cellpadding='15';>
    <tbody>
    <tr class='first-tr'>
    ";

    $key_creator = $table[0];
/* Création de la première ligne */
    foreach($key_creator as $key => $value){
        echo "<td>".$key."</td>";
    }
    echo
    "
    </tr>
    ";
    
/* Création des lignes inférieurs */

    foreach($table as $row){
        echo"
        <tr>
        ";
        foreach($key_creator as $value => $key){
            echo "<td>".$row[$value]."</td>";
        }

        /* Création des boutons  */
        echo
        "
        <td><form action = 'php/Backoffice/update.php' method = 'POST'><button type = 'submit' name = 'update' value = '".$nomTable."-".$row['id']."'class='update' id='update-".$row['id']."'> update </button></form></td>
        <td><form action = 'php/Backoffice/delete.php' method = 'POST'><button type = 'submit' name = 'delete' value = '".$nomTable."-".$row['id']."'class='delete' id='delete-".$row['id']."'> delete </button></form></td>
        </tr>";
    }
    echo "
    </tbody>
    </table>
    <form action ='php/Backoffice/add.php' method= 'POST'><button type ='submit' name ='add' value ='".$nomTable."-".$row['id']."'class='add' id='add-".$nomTable."'> add </button></form>'
    ";
}
    ?>

<!-- Session -->

<?php
session_start();
if(isset($_SESSION['connexion']) && $_SESSION['droit'] == 1){
    $_SESSION['connexion'] = true;

}
else{
    header('Location: ../../index.php');
}
?>