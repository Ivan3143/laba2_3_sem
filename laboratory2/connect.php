<?php

    $connect = mysqli_connect('localhost', 'root', '', 'posts');
    mysqli_set_charset($connect, 'utf8');

    if (!$connect) {
        die('Error connect to DataBase');
    }