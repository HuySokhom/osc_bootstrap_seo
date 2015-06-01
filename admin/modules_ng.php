<?php
require('includes/application_top.php');
require(DIR_WS_INCLUDES . 'template_top.php');
?>
<!DOCTYPE html>
<html>
<body data-ng-app="main">
	<br/>
	<div data-ng-view=""></div>
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
	src="js/ng/app/modules/config/route.js"
></script>
<script 
	type="text/javascript" 
	src="js/ng/app/modules/controller/modules_ctrl.js"
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

</body>
</html>
<?php
require(DIR_WS_INCLUDES . 'template_bottom.php');
require(DIR_WS_INCLUDES . 'application_bottom.php');
?>