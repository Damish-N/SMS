<div id="content" class="col-11 col-md-8 col-lg-9 flex-col align-items-center justify-content-start">
	<div class="admissions-header mt-5  w-75 d-flex flex-col align-items-center">
		<h2 class="fs-30">Pending Registration List</h2>
		<hr class="topic-hr w-100">
	</div> <!-- .admission-header -->
	<div id="all-admission-table"  class="admissions-table">
		<div class="d-flex justify-content-center align-items-center">
			<form action="<?php echo set_url('interviewpanel/list'); ?>" method="POST" class="d-flex align-items-center">

				<div class="d-flex align-items-center">
					<label for="" class="mr-3 d-normal">Grade : </label>
					<select name="interview-panel-grade" id="interview-panel-grade" style="width: 100px">
						<option value="all" <?php if(isset($_POST['interview-panel-grade'])){if($_POST['interview-panel-grade'] == "all"){echo 'selected="selected"';}}else{echo 'selected="selected"';} ?>>All</option>
						<option value="12" <?php if(isset($_POST['interview-panel-grade']) && ($_POST['interview-panel-grade'] == "12")){echo 'selected="selected"';} ?> >12</option>
						<option value="13" <?php if(isset($_POST['interview-panel-grade']) && ($_POST['interview-panel-grade'] == "13")){echo 'selected="selected"';} ?> >13</option>
					</select>
				</div>
				<input type="submit" class="btn btn-blue ml-3" value="Show">
			</form>
		</div>
		<div class="col-12 flex-col" style="overflow-x: scroll;overflow-y: hidden;">
			
			<?php 
				$table = "<table class=\"table-strip-dark\">";
				$table .= "<caption class=\"p-5\">";
				if(isset($_GET['interview-panel-grade'])){
					 $table .= "Grade ".ucfirst($_GET['interview-panel-grade']);
				} 
				$table .= "interview panels</caption>";

				$table .= "<thead>
							<tr>
								<th>Panel ID</th>
								<th>Panel Name</th>
								<th>Grade</th>
								<th>View</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>";

				echo $table;
				if($result_set){
					foreach ($result_set as $result) {
						$row ="<tr>";
						$row .= "<td class='text-center'>".$result['id']."</td>";
						$row .= "<td class='text-center'>".$result['name']."</td>";
						$row .= "<td class='text-center'>".$result['grade']."</td>";

						$row .= "<td class='text-center'><a class='btn t-d-none p-1' href='".set_url('interviewpanel/view/').$result['id']."'><i title='view' class='view-button far fa-eye'></i></a></td>";

						$row .= "<td class='text-center'><a class='btn t-d-none p-1' href=". set_url('interviewpanel/delete/'.$result['id'])." onclick=\" show_dialog(this,'Delete message','Are you sure to delete?')\"><i class='fas fa-trash delete-button'></a>";
						$row .= "</tr>";
						echo $row;
					}
				}else{
					echo "<tr><td colspan=5 class='text-center bg-red'>Panels not found...</td></tr>";
				}
				echo "</tbody>";
				echo "</table>";
			?>
		</div>
	</div>
</div>