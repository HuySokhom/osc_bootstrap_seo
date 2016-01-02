<?php
//set_include_path('includes/application_top.php');
?>
<form data-ng-submit="save();">
<div 
	class="modal fade"
	id="product-popup"
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
					<label>Post Your Ad</label>
				</h4>
	      	</div>
			<div class="modal-body">
				<table class="table table-bordered">
					<tr>
						<td>
							Category
						</td>
						<td>
							<?php
								echo tep_draw_pull_down_menu(
									'categories_id',
									tep_get_categories(
										array(
											array('id' => '', 'text' => '--Select--')
										)
									),
									NULL,
									'id="entryCategories"'
								);
							?>
						</td>
					</tr>
					<tr>
						<td width="5%">
							Title:
						</td>
						<td>
							<input
								type="text"
								class="form-control"
								data-ng-model="title"
								required="required"
							/>
						</td>
					</tr>
					<tr>
						<td>
							Kind of
						</td>
						<td>
							<select
								class="form-control"
								data-ng-model="account.customers_location"
								data-ng-options="location.id as location.location_name for location in location.elements"
								data-ng-init="account.customers_location == location.id"
								data-ng-disabled="disabled"
							></select>
							<location:account></location:account>
						</td>
					</tr>
					<tr>
						<td>
							Price
						</td>
						<td>
							<input
								type="text"
								class="form-control"
								data-ng-model="price"
							/>
						</td>
					</tr>
					<tr>
						<td>
							Description
						</td>
						<td>
							<textarea
								class="form-control"
								rows="10"
								data-ng-model="description"
							>
							</textarea>
						</td>
					</tr>
					<tr>
						<td>
							Add Photo Main
						</td>
						<td>
							<input type="file" class="form-control"/>
						</td>
					</tr>
					<tr>
						<td>
							Add Photo Detail
						</td>
						<td>
							<input type="file" class="form-control"/>
							<input type="file" class="form-control"/>
							<input type="file" class="form-control"/>
							<input type="file" class="form-control"/>
							<input type="file" class="form-control"/>
							<input type="file" class="form-control"/>
							<input type="file" class="form-control"/>
							<input type="file" class="form-control"/>
							<input type="file" class="form-control"/>
							<input type="file" class="form-control"/>
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
				>
					Save
				</button>
			</div>
		</div>
	</div>
</div>
</form>


