<?php
session_start();

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    echo "Entrou na area restrita";
} else {
    header("Location: login.php");
}
?>