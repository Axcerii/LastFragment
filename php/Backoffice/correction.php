
<?php
$chemin = '../../description/';
$chemin .= $_POST['nomfichier'];
?>

<link rel="stylesheet" href="../../css/style.css">
<link rel="stylesheet" href="../../css/office.css">


<form action="text.php" method='POST'>
    <div style='display: flex; flex-direction: column;'>
        <label for="text">Description :</label>
        <input type='hidden' value='<?php echo $_POST['nomfichier'];?>' name='txtname'>
        <textarea class='text desc' name='text' id='desc'></textarea>
        <button type='submit' style='margin-top: 2em'>Submit Texte</button>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $('#desc').load('<?php echo $chemin;?>');
</script>