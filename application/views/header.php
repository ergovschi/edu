
<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Edu Shuffle</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css?v=2">
  <script src="<?php echo base_url(); ?>js/libs/modernizr-1.7.min.js"></script>

</head>
<body>   

<div id="topBar">
<?php
    if ($this->session->userdata('logged_in')) {
        echo 'Welcome '.$this->session->userdata('email').' ';
        
        if ($this->user_model->is_admin($this->session->userdata('email')))
            echo anchor('admin', 'Admin Panel');  
        echo ' ';
        echo anchor('user/logout', 'Logout');  
    }
    else
    {
        echo anchor('user', 'Login').' ';
        echo anchor('user/register', 'Register');
    }
?>
</div>

<div id="container">
    <div id="header">
        <h1 class="visuallyhidden" >edutain-me</h1> 
    </div>

<?php if($this->session->userdata('logged_in')): ?>

<div id="nav">
    <ul id="navContainer">
        <li class="shuffleBoardLink">
            <?php echo anchor('site/shuffle_board', 'Shuffle'); ?>
        </li>
        <li class="addSiteLink">
            <?php echo anchor('site/add_site', 'Add Website'); ?>
        </li>
    </ul>
</div>


<?php endif; ?>

<div id="content">
