<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2014 osCommerce

  Released under the GNU General Public License
*/

  $oscTemplate->buildBlocks();

  if (!$oscTemplate->hasBlocks('boxes_column_left')) {
    $oscTemplate->setGridContentWidth($oscTemplate->getGridContentWidth() + $oscTemplate->getGridColumnWidth());
  }

  if (!$oscTemplate->hasBlocks('boxes_column_right')) {
    $oscTemplate->setGridContentWidth($oscTemplate->getGridContentWidth() + $oscTemplate->getGridColumnWidth());
  }
?>
<!DOCTYPE html>
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta charset="<?php echo CHARSET; ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo tep_output_string_protected($oscTemplate->getTitle()); ?></title>
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
    <link rel="shortcut icon" href="images/banners/logo.ico">
<link href="ext/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="custom.css" rel="stylesheet">
<link href="user.css" rel="stylesheet">
<link href='ext/css/google_fonts.css' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
   <script src="ext/js/html5shiv.js"></script>
   <script src="ext/js/respond.min.js"></script>
   <script src="ext/js/excanvas.min.js"></script>
<![endif]-->
 
<script src="ext/jquery/jquery-1.11.1.min.js"></script>

<!-- font awesome -->
<link rel="stylesheet" href="ext/css/Font-Awesome-master/css/font-awesome.min.css">

<?php echo $oscTemplate->getBlocks('header_tags'); ?>
</head>
<body>

  <?php echo $oscTemplate->getContent('navigation'); ?>
  
  <div id="bodyWrapper" class="<?php echo BOOTSTRAP_CONTAINER; ?>">
    <div class="row" style="margin-top: 165px;">

      <?php require(DIR_WS_INCLUDES . 'header.php'); ?>
        <div class="col-md-12">
            <a href="#">
                <img
                    src="images/ads/advertise-here-a-748CTP.jpg"
                    class="img-responsive"
                    style="width: 100%;height:80px;margin-bottom: 20px;"
                />
            </a>
        </div>
      <div
          id="bodyContent"
          class="col-md-9 <?php echo $oscTemplate->getGridContentWidth(); ?> <?php echo ($oscTemplate->hasBlocks
          ('boxes_column_left') ? 'col-md-push-' . $oscTemplate->getGridColumnWidth() : ''); ?>"
          style=""
      >
