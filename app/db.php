<?php


    session_start();
    /**
     * Database connection
     */

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'fb';

    $connection = new mysqli($host, $user, $pass, $db);

