<?php 
require_once '../dao/VagaDAO.php';

$id = $_GET['id'];
$vagaDAO = new VagaDAO($id);
$vagaDAO->excluir();

header('Location: painelAdministrativo.php');
?>