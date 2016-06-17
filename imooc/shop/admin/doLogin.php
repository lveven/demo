<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/6/11
 * Time: 15:16
 */
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
