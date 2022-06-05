<?php 
require_once '../dao/VagaDAO.php';

$id = $_GET['id'];
$vagaDAO = new VagaDAO($id);
$vagaDAO->desmarcar();

header('Location: painelAdministrativo.php');
?>