<?php

$conn = mysqli_connect('localhost', 'root', '', 'lastdrill');

if(!$conn) {
    die(mysqli_connect_error() . "koneksi gagal di sambungkan");
}