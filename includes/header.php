<?php 
session_start();
if (!isset($_SESSION['conectado'])) {
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>cPanel - Constructora Yama</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- Libreria dateTable css -->
    <link rel="stylesheet" type="text/css" href="lib/dataTable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="lib/dataTable/responsive.dataTables.min.css">

</head>
