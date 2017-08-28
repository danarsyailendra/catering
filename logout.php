<?php
session_start();
session_destroy();
header("Location:http://" . $_SERVER['SERVER_NAME'] . "/catering/");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

