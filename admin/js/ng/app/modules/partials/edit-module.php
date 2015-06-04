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
						<td data-ng-if="module.configuration_value >= 0">
							<input type="text" data-ng-model="module.configuration_value"/>
							{{module.configuration_value}}							
						</td>
						<td>
							<div data-ng-if="module.configuration_value == 'True'">
								<select>
									
									<option data-ng-false-value="module.configuration_value">False</option>
									<option data-ng-true-value="module.configuration_value">True</option>
								</select>
								{{module.configuration_value}}
							</div>
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



