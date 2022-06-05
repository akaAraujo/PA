<?php 
require_once '../dao/VagaDAO.php';

$id = $_GET['id'];
$vagaDAO = new VagaDAO($id);
$vagaDAO->confirmar();

header('Location: painelAdministrativo.php');
?>