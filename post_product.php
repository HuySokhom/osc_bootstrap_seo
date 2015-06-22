<?php
require('includes/application_top.php');

if (!tep_session_is_registered('customer_id')) {
	$navigation->set_snapshot();
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}
require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_POST_PRODUCT);
$breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_POST_PRODUCT, '', 'SSL'));
require(DIR_WS_INCLUDES . 'template_top.php');
?>
<div class="page-header">
  <h2><?php echo HEADING_TITLE; ?></h2>
</div>

<div class="contentContainer">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Product</h3>
			</div>
			<table class="table table-striped table-bordered">
				<tr>
					<td class="p_post">
						Category
						<span class="glyphicon glyphicon-star require"></span>
					</td>
					<td>
							
					</td>
				</tr>
				<tr>
					<td class="p_post">
						Title
						<span class="glyphicon glyphicon-star require"></span>
					</td>
					<td>
							
					</td>
				</tr>
				<tr>
					<td class="p_post">
						Price
						<span class="glyphicon glyphicon-star require"></span>
					</td>
					<td>
							
					</td>
				</tr>
				<tr>
					<td class="p_post">
						Description
						<span class="glyphicon glyphicon-star require"></span>
					</td>
					<td>
							
					</td>
				</tr>
			</table>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Detail</h3>
			</div>
			<table class="table table-striped table-bordered">
				<tr>
					<td class="p_post">
						Name
						<span class="glyphicon glyphicon-star require"></span>
					</td>
					<td>
						
					</td>
				</tr>
				<tr>
					<td class="p_post">
						Phone
						<span class="glyphicon glyphicon-star require"></span>
					</td>
					<td>
						
					</td>
				</tr>
				<tr>
					<td class="p_post">
						Email
						<span class="glyphicon glyphicon-star require"></span>
					</td>
					<td>
						
					</td>
				</tr>
				<tr>
					<td class="p_post">
						Address
						<span class="glyphicon glyphicon-star require"></span>
					</td>
					<td>
						
					</td>
				</tr>
			</table>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Photo</h3>
			</div>
			
		</div>
	</div>
</div>

<?php
  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
