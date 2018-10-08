<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
$this->load->helper('form');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ci site</title>
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
    </head>
    <a href="<?php echo site_url(); ?>/hm">Home</a>
    <div class="container">
        <?php echo validation_errors(); ?>
        <h1>Please register bellow </h1>
        <form class="form" action="<?php echo site_url(); ?>/rgstr/save" method="post">
            <label for="name">Name: </label>
            <input class="form-control" id="email" name="name" autofocus required>
            <label for="email">Email: </label>
            <input class="form-control" id="email" name="email" autofocus required>
            <label for="password">Password: </label>
            <input class="form-control" id="password" name="password" required>
            <br/>
            <input class="form-control btn btn-lg btn-primary" type="submit">
        </form>		
    </div>