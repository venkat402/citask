<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ci site</title>
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
</head>
<body>
    <h1>Welcome to ci site page</h1>
    <a href="<?php echo site_url('lg') ?>">Login here | </a>
    <a href="<?php echo site_url('rgstr') ?>">Register here</a>
    
</body>
</html>