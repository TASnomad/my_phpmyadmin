<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="my_phpmydadmin">
<link rel="stylesheet" href="../css/stylesheet.css">

<?php
    session_start();
    if(!isset($_SESSION['identifiant'])){
        header("Location : ../view/index.php");
    }
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js'></script>