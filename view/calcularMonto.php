<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$suma=0;
for($i=0;$i<count($_SESSION['monto']);$i++)
{
    $suma=$suma+$_SESSION['monto'][$i];
}

echo $suma;