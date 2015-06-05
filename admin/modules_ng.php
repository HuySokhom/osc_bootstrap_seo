<?php
require('includes/application_top.php');

$set = (isset($HTTP_GET_VARS['set']) ? $HTTP_GET_VARS['set'] : '');

$modules = $cfgModules->getAll();

if (empty($set) || !$cfgModules->exists($set)) {
	$set = $modules[0]['code'];
}

$module_type = $cfgModules->get($set, 'code');
$module_directory = $cfgModules->get($set, 'directory');
$module_language_directory = $cfgModules->get($set, 'language_directory');
$module_key = $cfgModules->get($set, 'key');
define('HEADING_TITLE', $cfgModules->get($set, 'title'));
require(DIR_WS_INCLUDES . 'template_top.php');
?>
<!DOCTYPE html>
<html>
<body 
	data-ng-app="main"
	data-ng-controller="modules_ctrl"
>
	<span id="module" class="<?php echo $module_key;?>"></span>
	<span id="path" class="<?php echo $set;?>"></span>
	<span id="module_directory" class="<?php echo $module_directory;?>"></span>
	<button
		class="btn btn-primary"
		style="float: right;"
		data-toggle="modal" 
		data-ng-click="install();"
		data-target="#install-module"
	>
		<span class="glyphicon glyphicon-plus"></span>
		Install Modules ({{count}})
	</button>
	<h3><?php echo HEADING_TITLE;?></h3>
	<div
		class="alert alert-success message-remove"
	>
		<label>Info: </label>
		Remove Success.
	</div>
	<table class="table table-striped table-bordered">
		<tr>
			<th>
				Modules
			</th>
			<th>
				Sort Order
			</th>
			<th>
				Action
			</th>
		</tr>
		<tr
			data-ng-if="modules.length == 0 "
		>
			<td colspan="3">
				<div class="alert alert-warning">
					<label>warning: </label>
					No Module install				
				</div>
			</td>
		</tr>
		<tr
			data-ng-repeat="module in modules track by $index"
		>
			<td>
				{{module.title}}
			</td>
			<td>
				{{module.sort_order}} 
			</td>
			<td width="11%">
				<button
					class="btn btn-primary"
					title="Edit"
					data-ng-click="edit(module);"
					data-toggle="modal" 
					data-target="#edit-module"
				>
					Edit
				</button>
				<button
					class="btn btn-danger"
					title="Delete"
					data-ng-click="remove(module, $index);"				
				>
					Remove
				</button>
			</td>
		</tr>
	</table>
	<?php echo '<b>Module Directory: </b> ' . $module_directory; ?>
	<install-modules></install-modules>
	<edit:modules></edit:modules>
<script 
	type="text/javascript" 
	src="js/underscore/1.7.0/underscore.js"
></script>

<script 
	type="text/javascript" 
	src="js/ng/lib/angular/1.2.25/angular.js"
></script>
<script 
	type="text/javascript" 
	src="js/ng/lib/angular/1.2.25/angular-route.js"
></script>
<script 
	type="text/javascript" 
	src="js/ng/lib/angular/1.2.25/angular-resource.js"
></script>
<script 
	type="text/javascript" 
	src="js/ng/lib/bootstrap/bootstrap-modal.js"
></script>
<script 
	type="text/javascript" 
	src="js/ng/lib/angular-sanitize/sanitize.js"
></script>
<script 
	type="text/javascript"
	src="js/ng/lib/angular-ui-bootstrap/ui-bootstrap-tpls-0.12.0.js"
></script>

<script 
	type="text/javascript" 
	src="js/ng/app/modules/main.js"
></script>
<script 
	type="text/javascript" 
	src="js/ng/app/modules/controller/modules_ctrl.js"
></script>
<script 
	type="text/javascript" 
	src="js/ng/app/modules/controller/modules_install_ctrl.js"
></script>
<script 
	type="text/javascript" 
	src="js/ng/app/modules/controller/modules_edit_ctrl.js"
></script>
<script 
	type="text/javascript" 
	src="js/ng/app/modules/factory/factory.js"
></script>
<script 
	type="text/javascript" 
	src="js/ng/app/modules/services/services.js"
></script>
<script 
	type="text/javascript" 
	src="js/ng/app/modules/directive/install-modules.js"
></script>
<script 
	type="text/javascript" 
	src="js/ng/app/modules/directive/edit-modules.js"
></script>


</body>
</html>
<?php
require(DIR_WS_INCLUDES . 'template_bottom.php');
require(DIR_WS_INCLUDES . 'application_bottom.php');
?>