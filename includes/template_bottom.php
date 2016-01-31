<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/
?>

      </div> <!-- bodyContent //-->

<?php
  if ($oscTemplate->hasBlocks('boxes_column_left')) {
?>

      <div id="columnLeft" class="col-md-<?php echo $oscTemplate->getGridColumnWidth(); ?>  col-md-pull-<?php echo $oscTemplate->getGridContentWidth(); ?>">
        <?php echo $oscTemplate->getBlocks('boxes_column_left'); ?>
      </div>

<?php
  }

  if ($oscTemplate->hasBlocks('boxes_column_right')) {
?>

      <div id="columnRight" class="col-md-<?php echo $oscTemplate->getGridColumnWidth(); ?>">
        <?php echo $oscTemplate->getBlocks('boxes_column_right'); ?>
      </div>

<?php
  }
?>
<div id="columnRight" class="col-md-3 ads">
    <a href="#">
        <img src="images/ads/advertise-here-a-748CTP.jpg" class="img-responsive" style="height: 170px;">
    </a>
</div>
<div id="columnRight" class="col-md-3 ads">
    <a href="#">
        <img src="images/ads/advertise-here-a-748CTP.jpg" class="img-responsive" style="height: 170px;">
    </a>
</div>
<div id="columnRight" class="col-md-3 ads">
    <a href="#">
        <img src="images/ads/advertise-here-a-748CTP.jpg" class="img-responsive" style="height: 170px;">
    </a>
</div>
<div id="columnRight" class="col-md-3 ads">
    <a href="#">
        <img src="images/ads/advertise-here-a-748CTP.jpg" class="img-responsive" style="height: 170px;">
    </a>
</div>
<div id="columnRight" class="col-md-3 ads">
    <a href="#">
        <img src="images/ads/advertise-here-a-748CTP.jpg" class="img-responsive" style="height: 170px;">
    </a>
</div>

    </div> <!-- row -->

  </div> <!-- bodyWrapper //-->
<div id="columnRight" class="col-md-12">
    <a href="#">
        <img src="images/ads/advertise-here-a-748CTP.jpg" class="img-responsive" style="height: 100px;width: 100%;">
    </a>
</div>
  <?php require(DIR_WS_INCLUDES . 'footer.php'); ?>

<script src="ext/bootstrap/js/bootstrap.min.js"></script>
<?php echo $oscTemplate->getBlocks('footer_scripts'); ?>

</body>
</html>