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
        <h1>Update your task </h1>
        <div class="container">
            <?php echo validation_errors(); ?>
            <form class="form" action="<?php echo site_url(); ?>/dsbd/ed_save/<?php echo $data->id;?>" method="post">
                <label for="name">Task Name</label>
                <input class="form-control" type="text" name="tname" autofocus required value="<?php echo $data->name;?>">
                <label for="desc">Discription </label>
                <textarea class="form-control" rows="4" name="desc" autofocus required><?php echo $data->description;?>
                </textarea>
                <br/>
                <input class="form-control btn btn-lg btn-primary" type="submit">
            </form>
        </div>    </div>