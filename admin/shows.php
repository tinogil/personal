<?php
if(empty($_SESSION['iden']) || $_SESSION['iden']!=1){
     echo '<h1>PROHIBIDO</h1><p>No tiene permiso para ver esta página</p>';
 }else{
 echo '<div><h1>Shows</h1></div>';}