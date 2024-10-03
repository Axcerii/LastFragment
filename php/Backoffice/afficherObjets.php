<?php
session_start();

if(isset($_SESSION['connexion']) && $_SESSION['droit'] == 1){
    $_SESSION['connexion'] = true;

}
else{
    header('Location: admin.php');
}



$host = 'mysql-lastfragment.alwaysdata.net'; // Votre hôte de base de données
$user = '288462_2';  // Votre nom d'utilisateur
$pass = 'LastFragmentAdmin3';  // Votre mot de passe
$db   = 'lastfragment_1';  // Nom de votre base de données

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = isset($_POST['data']) ? $_POST['data'] : '';

$query = "SELECT * FROM objets WHERE appartenance = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $data);
$stmt->execute();
$result = $stmt->get_result();
$items = $result->fetch_all(MYSQLI_ASSOC);

?>

<link rel="stylesheet" href="css/tableauObjets.css">

<table id="data-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Appartenance</th>
            <th>Nom</th>
            <th>Type</th>
            <th>Rarete</th>
            <th>Poids</th>
            <th>Localisation</th>
            <th>Description</th>
            <!-- ajoutez d'autres colonnes selon vos besoins -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $item): ?>
        <tr>
            <td data-field="id"><?php echo $item['id']; ?></td>
            <td data-field="appartenance"><?php echo $item['appartenance']; ?></td>
            <td data-field="nom"><?php echo $item['nom']; ?></td>
            <td data-field="type"><?php echo $item['type']; ?></td>
            <td data-field="rarete"><?php echo $item['rarete']; ?></td>
            <td data-field="poids"><?php echo $item['poids']; ?></td>
            <td data-field="localisation"><?php echo $item['localisation']; ?></td>
            <td data-field="description"><?php echo $item['description']; ?></td>
            <!-- ajoutez d'autres colonnes selon vos besoins -->
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script src="js/afficherObjets.js"></script>