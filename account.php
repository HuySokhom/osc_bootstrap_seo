<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_ACCOUNT);

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));

  require(DIR_WS_INCLUDES . 'template_top.php');
?>
<link href="ext/css/product_post.css" rel="stylesheet">
<div class="page-header">
  <h3><?php echo HEADING_TITLE; ?></h3>
</div>

<?php
  if ($messageStack->size('account') > 0) {
    echo $messageStack->output('account');
  }
?>

<div 
	class="contentContainer"
	data-ng-app="main"
>
	<div class="row">
		<div class="col-md-12">
			<div class="panel with-nav-tabs panel-default">
				<div class="panel-heading">
					<ul class="nav nav-tabs">
						<li data-ui-sref-active="active">
							<a 
								data-ui-sref="/manage" 
								data-toggle="tab"
							>
								<span class="glyphicon glyphicon-folder-close"></span> 
								<?php echo MANAGE_POST; ?>
							</a>
						</li>
						<li data-ui-sref-active="active">
							<a 
								data-ui-sref="/account" 
								data-toggle="tab"
							>
								<span class="glyphicon glyphicon-user"></span> 
								<?php echo MY_ACCOUNT_TITLE; ?>
							</a>
						</li>
					</ul>
				</div>
				<div class="panel-body">
					<div class="tab-content">
						<div data-ui-view=""></div>
					</div>
				</div>
			</div>
		</div>
    <?php
    	// don't need to show
//    	 echo $oscTemplate->getContent('account');
    ?>
	</div>
</div>

<!-- lib -->
<script 
	type="text/javascript" 
	src="ext/underscore/1.7.0/underscore.js"
></script>
<script 
	type="text/javascript" 
	src="ext/ng/lib/angular/1.2.25/angular.js"
></script>
<script 
	type="text/javascript" 
	src="ext/ng/lib/angular-ui-route/angular-ui-router.js"
></script>
<script 
	type="text/javascript"
	src="ext/ng/lib/angular-ui-bootstrap/ui-bootstrap-tpls-0.12.0.js"
></script>
<script 
	type="text/javascript"
	src="ext/ng/lib/bootstrap-notify/bootstrap-notify.min.js"
></script>
<!-- custom file -->

<script 
	type="text/javascript"
	src="ext/ng/app/account/main.js"
></script>
<script 
	type="text/javascript"
	src="ext/ng/app/account/config/route.js"
></script>
<script 
	type="text/javascript"
	src="ext/ng/app/account/controller/account_ctrl.js"
></script>
<script 
	type="text/javascript"
	src="ext/ng/app/account/controller/manage_ctrl.js"
></script>
<script 
	type="text/javascript"
	src="ext/ng/app/core/restful/restful.js"
></script>
<script 
	type="text/javascript"
	src="ext/ng/app/account/services/services.js"
></script>
<script 
	type="text/javascript"
	src="ext/ng/app/account/directive/popup.js"
></script>
<script 
	type="text/javascript"
	src="ext/ng/app/account/directive/location.js"
></script>
<?php
  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
