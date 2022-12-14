<div id="content" class="col-11 col-md-8 col-lg-9 flex-col align-items-center justify-content-start">
	<div class="mt-5  w-75 d-flex flex-col align-items-center">
        <h2 class="pt-3 pb-3">Exam Result Center - Classroom List</h2>
        <hr class="topic-hr w-100">
    </div>

		<div class="d-flex justify-content-center align-items-center">
			<form action="<?php echo set_url('pages/attendance_classroom_list.php'); ?>" method="post" id="classroom_filter" class="d-flex align-items-center col-12">
				<div class="d-flex col-12 align-items-center justify-content-center">
					<div class="mt-5">
						<input type="reset" class="btn btn-blue" onclick="reset_form('classroom_filter', 'marks_classroom_search')" value="Reset">
					</div>
					<div class="ml-5">
						<label for="classroom-id">Classroom ID</label>
						<input type="text" name="classroom-id" id="classroom-id" placeholder="classroom ID" value="<?php if(isset($_POST['classroom-id'])){echo $_POST['classroom-id'];} ?>" oninput="marks_classroom_search()">
					</div>
					<div  class="  ml-5 align-items-center">
						<label for="grade" class="mr-3 d-normal">Grade : </label>
						<select name="grade" id="grade" style="width: 100px" onchange="marks_classroom_classes(this, 'class')">
							<option value="all" <?php if(isset($grade)){if($grade == "all"){echo 'selected="selected"';}}else{echo 'selected="selected"';} ?>>All</option>
							<option value="12" <?php if(isset($grade) && ($grade == "12")){echo 'selected="selected"';} ?> >12</option>
							<option value="13" <?php if(isset($grade) && ($grade == "13")){echo 'selected="selected"';} ?> >13</option>
						</select>
					</div>
					<div  class="  ml-5 align-items-center">
						<label for="class" class="mr-3 d-normal">Class:</label>
						<select name="class" id="class" onchange="marks_classroom_search()">
							<option value="all" <?php if(isset($class) && ($class == "all")){echo 'selected="selected"';} ?> >All</option>
						</select>				
					</div>
				</div>
			</form>
		</div>

		<div class="col-10 flex-col mt-5" style="position:relative;overflow-x: scroll;overflow-y: hidden;">
			<div class="loader hide-loader">
			 	<div class="col-12">
					<div id="one"><div></div></div>
					<div id="two"><div></div></div>
					<div id="three"><div></div></div>
					<div id="four"><div></div></div>
					<div id="five"></div>
			 	</div>
			</div>

		    <table class="table-strip-dark">
			    <thead>
				    <tr>
                        <th>Classroom ID</th>
                        <th>grade</th>
                        <th>class</th>
                        <th>class teacher</th>
                        <th>Marks</th>
				    </tr>
			    </thead>
			    
                <tbody id="tbody">

				<?php
				if(isset($result_set) && !empty($result_set)){
					$grade = 0;
					foreach ($result_set as $result) {
						if($grade !== 0 && $grade != $result['grade']){
                			echo "<tr><td colspan=8 class='text-center bg-gray'></td></tr>";
                		}
	                ?>

						<tr>
	                        <td><?php echo $result['id']; ?></td>
	                        <td class="text-center"><?php echo $result['grade']; ?></td>
	                        <td class="text-center"><?php echo $result['stream']; ?></td>
	                        <td><?php echo $result['class_teacher_id']; ?></td>
							<td class="text-center">
								<div>
	                				<a class="btn btn-blue" href="<?php echo set_url('marks/classroom/view/'.$result['id'].'/1'); ?>">View</a>
			    				</div>
							</td>
						</tr>

					<?php
					$grade = $result['grade'];
					}
				}else{
					echo "<tr><td colspan=8 class='text-center bg-red'>Classrooms not found...</td></tr>";
				}
                ?>
                 
                </tbody>
        
            </table>
		</div>  
		<div id="pagination" class="col-12">
			<span>Number of results found : <span id="row_count"><?php echo $count; ?></span></span>
			<div id="pagination_data" class="col-12">
				<?php require_once(INCLUDES."pagination.php"); ?>
				<?php display_pagination($count,$page,$per_page, "marks/classroom/list","marks_classroom_search"); ?>
			</div>
		</div> 
</div>