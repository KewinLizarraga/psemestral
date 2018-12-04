<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../model/producto.php';

$name = mysqli_real_escape_string($_POST['name']);

$age = mysqli_query("SELECT nombre FROM producto WHERE nombre='$name'");
$age_num_rows = mysqli_num_rows($age);

echo $age_num_rows;