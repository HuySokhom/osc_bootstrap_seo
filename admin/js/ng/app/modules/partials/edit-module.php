<div 
	class="modal fade"
	id="edit-module" 
	data-keyboard="false"
	data-backdrop="static"
>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button 
					type="button" 
					class="close" 
					data-dismiss="modal" 
				>
					<span>&times;</span>
				</button>
				<h4>
					<label data-ng-bind="header"></label>
				</h4>
	      	</div>
			<div class="modal-body">
				<span					
					id="element"
				>
				</span>
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



