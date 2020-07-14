<?php

include_once("libs/modele.php"); 
include_once("libs/maLibUtils.php");
include_once("libs/maLibForms.php");
mkForm("controleur.php");


// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
  header("Location:../index.php");
  die("");
}



// Pose qq soucis avec certains serveurs...
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
?>

<script src="./bootstrap/js/bootstrap.js"></script>

<!DOCTYPE html>
<html>
<title>Webreathe_Le_Breton</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="templates/css/header.css">
<link rel="stylesheet" href="./bootstrap/css/bootstrap.css">

<header class="header">
  <img src="ressources/logo.png" alt="Logo Webreathe" class="header-logo">
  <h1 class="header-title">Modules</h1>
</header>

<body>

