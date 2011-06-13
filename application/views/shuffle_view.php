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

  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css?v=2">
  <script src="<?php echo base_url(); ?>js/libs/modernizr-1.7.min.js"></script>

</head>
<body>                  
<div class="shuffleMenu">
<?php echo form_open('site/shuffle'); ?>
<div class="topBarShuffleView">
    <?php echo form_submit('submit', 'Shuffle'); ?>
    <?php echo anchor('site/shuffle_board', '  Back to Panel', 'class="backToPanelLink"'); ?>
    <a href="#" class="toggleMenu">View Categories</a>
    <a href="#" class="toggleMenu">View Domains</a>
    <a href="#" class="thisIsEdu <?php if($user_edu) echo 'alreadyVoted';?>" onClick="userThinks(<?php echo $site->id ?>, 'edu', <?php echo $user_edu; ?>);">
        <span><?php echo $site->educative; ?></span> +Edu </a>
    <a href="#" class="thisIsFun <?php if($user_ent) echo 'alreadyVoted';?>" onClick="userThinks(<?php echo $site->id ?>, 'fun', <?php echo $user_ent; ?>);">
         +Fun <span><?php echo $site->entertainment; ?></span></a>
</div>
<div class="shMenuContainer">
    <div class="shMenu">
        <p>
        Hello <?php echo $this->session->userdata('email');?>!
        </p>
        <p>
        Please select your interests from the list -> 
        </p>
    </div>
    <div class="shMenu">
        <label for='category'>Category: </label>
        <?php echo form_multiselect('category[]', $categories, $cats); ?>
    </div>
    <div class="shMenu">
        <label for='domain'>Domain: </label>
        <?php echo form_multiselect('domain[]', $domains, $doms); ?>
    </div>
</div>

<?php echo form_close(); ?>
</div>
<iframe src="<?php echo $site->url; ?>" frameborder="0" noresize="noresize" id="shuffleCont" style="background: transparent; position: absolute; top: 30px; height: 100%; width: 100%; padding: 0px; z-index: 1;"></iframe>
	
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
    <script>window.jQuery || document.write("<script src='<?php echo base_url(); ?>js/libs/jquery-1.5.1.min.js'>\x3C/script>")</script>


  <!-- scripts concatenated and minified via ant build script-->
<script src="<?php echo base_url(); ?>js/plugins.js"></script>
<script src="<?php echo base_url(); ?>js/script.js"></script>
<!-- end scripts-->


<!--[if lt IE 7 ]>
<script src="js/libs/dd_belatedpng.js"></script>
<script>DD_belatedPNG.fix("img, .png_bg");</script>
<![endif]-->



<script>
var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]]; // Change UA-XXXXX-X to be your site's ID 
(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
s.parentNode.insertBefore(g,s)}(document,"script"));
</script>

</body>
</html>
