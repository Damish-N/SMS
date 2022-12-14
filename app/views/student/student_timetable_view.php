<div id="content" class="col-11 col-md-8 col-lg-9 flex-col align-items-center justify-content-start">

	<?php 
		if(isset($error)){
			echo "<p class='bg-red p-3 w-75 text-center fg-white'>";
			echo $error;
			echo "</p>";
		}
	 ?>
	<div class="mt-5  w-75 d-flex flex-col align-items-center">
		<h2><?php if(isset($grade) && !empty($grade)){echo "{$grade}-{$class}";} ?> Student Timetable</h2>
		<hr class="topic-hr w-100">
	</div>
	<div class="col-12 d-flex flex-col mt-5">
		<hr class="w-100">
		<div class="p-5">
			<form action="">
				<table class="w-100 table-strip-dark">
					<thead>
						<tr>
							<th style="width: 16%;">Time\Day</th>
							<th style="width: 12%;">Mon</th>
							<th style="width: 12%;">Tue</th>
							<th style="width: 12%;">Wed</th>
							<th style="width: 12%;">Thu</th>
							<th style="width: 12%;">Fri</th>
							<th style="width: 12%;">Sat</th>
							<th style="width: 12%;">Sun</th>
						</tr>
					</thead>
					<tbody>
						

				<?php 

					if(isset($timetable_data) && !empty($timetable_data)){
						for ($i=1; $i <= 9; $i++) { 

							if($i == 5){
								// echo "<tr><th colspan='6' class='text-center bg-gray fg-white'>Interval</th></tr>";
								continue;
							}
							$period = $i > 5 ? $i-1 : $i;

							$row = "<tr>";
							$row .= "<th>".$time_map[$period]."</th>";
							for ($j=1; $j <=7 ; $j++) { 
								$row .= "<td class='text-center'>";
								$row .= $timetable_data[$day_map[$j]][$period];
								$row .= "</td>";
							}
						$row .= "</tr>";
						echo $row;
						}
					}else{
						echo "<tr><td colspan=7 class='text-center bg-red'>Timetable Not Found...</td></tr>";
						echo "</tbody>";
						echo "</table>";
					}
				 ?>
					</tbody>
				</table>
	
			</form>
			<br>
		    <div class="float-right">
                <a class="btn btn-blue" onClick="window.print()">Download as a PDF</a>
	        </div>
		</div>
	</div>
</div>