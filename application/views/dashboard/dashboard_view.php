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
    <a href="<?php echo site_url(); ?>/dsbd/lo"> | Logout (<?php echo $details->name; ?>)</a>
    <div class="container">
        <?php echo validation_errors(); ?>
        <h1> Hi, <?php echo $details->name; ?> Welcome to dashboard</h1>
        <form class="form" action="<?php echo site_url(); ?>/dsbd/task" method="post">
            <label for="name">Task Name</label>
            <input class="form-control" type="text" name="tname" autofocus required>
            <label for="desc">Discription </label>
            <textarea class="form-control" rows="4" name="desc" autofocus required>
            </textarea>
            <br/>
            <input class="form-control btn btn-lg btn-primary" type="submit">
        </form>
    </div>

    <div class="clearfix"></div>
    <div class="container">   
        <h1>Your tasks list</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Task Name</th>
                    <th>Task Desc</th>
                    <th>Date of added</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sno = 1;
                foreach ($get_all_tasks->result() as $get_task) {
                    ?>
                    <tr>
                        <td><?php echo $sno; ?></td>
                        <td><?php echo $get_task->name; ?></td>
                        <td><?php echo $get_task->description; ?></td>
                        <td><?php echo $get_task->date_of_added; ?></td>
                        <td>
                            <a href="<?php echo site_url(); ?>/dsbd/ed/<?php echo $get_task->id; ?>">Edit</a> | 
                            <a href="<?php echo site_url(); ?>/dsbd/dl/<?php echo $get_task->id; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                    $sno++;
                }
                ?>
            </tbody>
        </table>
    </div>
