<?php
require_once '../lib/securiter.php';
if(!isLogged()){
    header("Location: ..");
}
?>