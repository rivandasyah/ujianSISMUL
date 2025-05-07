<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="<?= site_url('asset/font/material-icon/material-icons.css'); ?>" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?= site_url('asset/css/materialize.min.css'); ?>" media="screen,projection"/>
    <title>Mov5</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Mov5&display=swap" rel="stylesheet"> 

    <style>
        .create-btn {
            background-color: transparent;
            color: white;
            font-size: 20px; 
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .navbar-fixed {
            position: relative;
        }

        .nav-wrapper {
            background-color: #000;
        }

        .brand-logo {
            font-family: 'Mov5', sans-serif;
        }

        .sidenav-trigger {
            color: white;
        }

        .sidenav {
            background-color: white;
        }

        .sidenav a {
            color: white;
            
        }

        main.container {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <script type="text/javascript" src="<?= site_url('asset/js/materialize.min.js'); ?>"></script>

    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="<?= site_url(); ?>" class="brand-logo">Mov5</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="<?= base_url('index.php/welcome/create'); ?>" class="create-btn"><i class="material-icons">add</i></a></li>
                </ul>
            </div>
        </nav>
    </div>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="<?= site_url('index.php/welcome/create'); ?>">Create</a></li>
    </ul>

    <main class="container">
