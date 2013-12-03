<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>People</title>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>jqgrid/themes/ui.jqgrid.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/style.css' ?>" />

	<script src="<?php echo base_url() ?>jqgrid/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>

</head>
<body>
   
	<?php echo $header ?>
        <div class="container" style="padding-top: 46px;">
            
            <div class="inner-container">
                <?php include "/grid-init.php" ?>

            </div>
        </div>
	<?php echo $footer ?>
</body>
</html>