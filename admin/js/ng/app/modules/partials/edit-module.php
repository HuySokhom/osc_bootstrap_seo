<div 
	class="modal fade"
	id="edit-module" 
	data-keyboard="false"
	data-backdrop="static"
>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>
					<label>Edit Modules</label>
				</h4>
	      	</div>
			<div class="modal-body">
				<table
					data-ng-repeat="module in module_edit"
				>
					<tr>
						<td>
							<label>
								{{module.configuration_title}}
							</label>
						</td>
					</tr>
					<tr>
						<td>
							{{module.configuration_description}}
						</td>
					</tr>
					<tr>
						<td>
							{{module.configuration_value}}							
						</td>
					</tr>
				</table>
			</div>
			<div class="modal-footer">
				<button 
					class="btn btn-default" 
					data-dismiss="modal"
				>
					Close
				</button>
				<button 
					class="btn btn-primary" 
					data-ng-click="save();"
				>
					Yes
				</button>
			</div>
		</div>
	</div>
</div>



