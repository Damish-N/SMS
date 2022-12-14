<div id="content" class="col-9 flex-col align-items-center justify-content-start fs-14">
  
<div class="mt-5  w-75 d-flex flex-col align-items-center">
    <h2 class="pt-3 pb-3">Student Exam Report</h2>
    <hr class="topic-hr w-100">
</div>

  <table  class="w-100 mt-5 table table-strip-dark text-center">

    <thead class="bg-navyblue1 fs-white">

      <tr>
      	<td colspan="18"><div class="fs-16"><b>Student Report Card</b></td>
      </tr>

      <tr>
        <td colspan="18">
            <div style="float: left;" align="left" >
              <b>
                Student name &nbsp:  <?php if(isset($student['name_with_initials'])){echo $student['name_with_initials'];}?><br>
                Student Id &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php if(isset($student['id'])){echo "".$student['id'];}?>
              </b>
            </div> 

            <div style="float: center;" align="center">
              <b>
                Grade &nbsp&nbsp&nbsp:  <?php if(isset($student['grade'])){echo $student['grade'];}?><br>
                Class &nbsp&nbsp&nbsp:  <?php if(isset($student['class'])){echo $student['class'];}?>&nbsp
              </b>
            </div>

            <div style="float: right;" align="right">
              <b>
                Year &nbsp&nbsp&nbsp:  <?php if(isset($y)){echo $y;}?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              </b>
            </div>


        </td>
      </tr>

      <tr>
        <td colspan="3" rowspan="2"><b>Subjects</b> </td>
        <td colspan="2"><b> Exam-01</b> </td>
        <td colspan="2"><b> Exam-02</b> </td>
        <td colspan="2"><b> Exam-03</b> </td>
        <td colspan="2"><b> Exam-04</b> </td>
        <td colspan="2"><b> Exam-05</b> </td>
        <td colspan="2"><b> Exam-06</b> </td>
      </tr>

      <tr>
        
        
        <td ><b> Marks</b> </td>
        <td ><b> Grade</b> </td>
        <td ><b> Marks</b> </td>
        <td ><b>Grade</b> </td>
        <td ><b> Marks</b> </td>
        <td ><b> Grade </b></td>
        <td ><b> Marks</b> </td>
        <td ><b> Grade</b> </td>
        <td ><b> Marks</b> </td>
        <td ><b>Grade</b> </td>
        <td ><b> Marks</b> </td>
        <td ><b> Grade </b></td>
      </tr>
    </thead>
    
    <tbody>
    <?php 
        if(isset($subject_list) && !empty($subject_list)){
           foreach ($subject_list as $subject) {
           	?>
           		<tr>
	                
	                <td colspan="3"><b><?php echo $subject['name']; ?></b></td>
	                <td><b><?php if(isset($student_marks[$y.'-'.'1'.'-'.$subject['id']])){echo $student_marks[$y.'-'.'1'.'-'.$subject['id']]; }?></td>
	                <td><b><?php if(isset($student_grades[$y.'-'.'1'.'-'.$subject['id']])){echo $student_grades[$y.'-'.'1'.'-'.$subject['id']]; }?></td>
	                <td><b><?php if(isset($student_marks[$y.'-'.'2'.'-'.$subject['id']])){ echo $student_marks[$y.'-'.'2'.'-'.$subject['id']]; }?></td>
	                <td><b><?php if(isset($student_grades[$y.'-'.'2'.'-'.$subject['id']])){echo $student_grades[$y.'-'.'2'.'-'.$subject['id']]; }?></td>
	                <td><b><?php if(isset($student_marks[$y.'-'.'3'.'-'.$subject['id']])){ echo $student_marks[$y.'-'.'3'.'-'.$subject['id']]; }?></td>
	                <td><b><?php if(isset($student_grades[$y.'-'.'3'.'-'.$subject['id']])){echo $student_grades[$y.'-'.'3'.'-'.$subject['id']]; }?></td>
                  <td><b><?php if(isset($student_marks[$y.'-'.'4'.'-'.$subject['id']])){echo $student_marks[$y.'-'.'4'.'-'.$subject['id']]; }?></td>
	                <td><b><?php if(isset($student_grades[$y.'-'.'5'.'-'.$subject['id']])){echo $student_grades[$y.'-'.'4'.'-'.$subject['id']]; }?></td>
	                <td><b><?php if(isset($student_marks[$y.'-'.'5'.'-'.$subject['id']])){ echo $student_marks[$y.'-'.'5'.'-'.$subject['id']]; }?></td>
	                <td><b><?php if(isset($student_grades[$y.'-'.'5'.'-'.$subject['id']])){echo $student_grades[$y.'-'.'5'.'-'.$subject['id']]; }?></td>
	                <td><b><?php if(isset($student_marks[$y.'-'.'6'.'-'.$subject['id']])){ echo $student_marks[$y.'-'.'6'.'-'.$subject['id']]; }?></td>
	                <td><b><?php if(isset($student_grades[$y.'-'.'6'.'-'.$subject['id']])){echo $student_grades[$y.'-'.'6'.'-'.$subject['id']]; }?></td>
            	</tr>
            <?php 
            }
        }else{
            echo "<tr><td colspan=20 class='text-center bg-red'>Not found...</td></tr>";
        }
           ?>  
    
    </tbody>


    <tfoot class="fs-white" style="background-color: #008080;">

      <tr>
        <td colspan="3" class="footer"><b>Total</td>
        <td colspan="2" ><b><?php if(isset($marks_total[$y.'-1'])){echo $marks_total[$y.'-1']; } ?> </td>
        <td colspan="2"><b> <?php if(isset($marks_total[$y.'-2'])){echo $marks_total[$y.'-2']; } ?></td>
        <td colspan="2"><b><?php if(isset($marks_total[$y.'-3'])){echo $marks_total[$y.'-3']; } ?> </td>
        <td colspan="2" ><b><?php if(isset($marks_total[$y.'-4'])){echo $marks_total[$y.'-4']; } ?> </td>
        <td colspan="2"><b> <?php if(isset($marks_total[$y.'-5'])){echo $marks_total[$y.'-5']; } ?></td>
        <td colspan="2"><b><?php if(isset($marks_total[$y.'-6'])){echo $marks_total[$y.'-6']; } ?> </td>
      </tr>

      <tr>
        <td colspan="3" class="footer"><b>Average</td>
        <td colspan="2" <?php if(isset($marks_bgcolor[$y.'-1'])){echo $marks_bgcolor[$y.'-1']; } ?>><b><?php if(isset($marks_average[$y.'-1'])){echo $marks_average[$y.'-1']; } ?></td>
        <td colspan="2" <?php if(isset($marks_bgcolor[$y.'-2'])){echo $marks_bgcolor[$y.'-2']; } ?>><b><?php if(isset($marks_average[$y.'-2'])){echo $marks_average[$y.'-2']; } ?></td>
        <td colspan="2" <?php if(isset($marks_bgcolor[$y.'-3'])){echo $marks_bgcolor[$y.'-3']; } ?>><b><?php if(isset($marks_average[$y.'-3'])){echo $marks_average[$y.'-3']; } ?></td>
        <td colspan="2" <?php if(isset($marks_bgcolor[$y.'-4'])){echo $marks_bgcolor[$y.'-4']; } ?>><b><?php if(isset($marks_average[$y.'-4'])){echo $marks_average[$y.'-4']; } ?></td>
        <td colspan="2" <?php if(isset($marks_bgcolor[$y.'-5'])){echo $marks_bgcolor[$y.'-5']; } ?>><b><?php if(isset($marks_average[$y.'-5'])){echo $marks_average[$y.'-5']; } ?></td>
        <td colspan="2" <?php if(isset($marks_bgcolor[$y.'-6'])){echo $marks_bgcolor[$y.'-6']; } ?>><b><?php if(isset($marks_average[$y.'-6'])){echo $marks_average[$y.'-6']; } ?></td>
      </tr>

      <tr>
        <td colspan="3" class="footer"><b>Rank</td>
        <td colspan="2"><b><?php if(isset($student_rank['exam-1'])){echo $student_rank['exam-1'];}  ?></td>
        <td colspan="2"><b><?php if(isset($student_rank['exam-2'])){echo $student_rank['exam-2'];}  ?></td>
        <td colspan="2"><b><?php if(isset($student_rank['exam-3'])){echo $student_rank['exam-3'];}  ?></td>
        <td colspan="2"><b><?php if(isset($student_rank['exam-4'])){echo $student_rank['exam-4'];}  ?></td>
        <td colspan="2"><b><?php if(isset($student_rank['exam-5'])){echo $student_rank['exam-5'];}  ?></td>
        <td colspan="2"><b><?php if(isset($student_rank['exam-6'])){echo $student_rank['exam-6'];}  ?></td>
      </tr>

  </table>



  		<div class="form-group">

      <div class="row justify-content-end align-items-end fs-16">

			 <input type="submit" value="Download as PDF" class="m-2 btn btn-blue" onclick="window.print()">

		  </div>

      </div>
</div>

