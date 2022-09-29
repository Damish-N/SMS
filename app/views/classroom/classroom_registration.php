<div id="content" class="col-11 col-md-8 col-lg-9 flex-col align-items-center justify-content-start">

    <?php 

        if(isset($info) && !empty($info)){
            echo "<p class='w-75 bg-green p-2 text-center'>";
            echo $info;
            echo "</p>";
        }
        if(isset($error) && !empty($error)){
            echo "<p class='w-75 bg-red p-2 text-center'>";
            echo $error;
            echo "</p>";
        }
     ?>

    <div class="mt-5  w-75 d-flex flex-col align-items-center">
        <?php if(isset($result) && !empty($result)){ ?>
            <h2 class="pt-3 pb-3">Classroom Update Form</h2>
        <?php }else{ ?>
            <h2 class="pt-3 pb-3">Classroom Registration Form</h2>
        <?php } ?>
        <hr class="topic-hr w-100">
    </div>

    <form  method="post" action="<?php if(isset($result)){echo set_url('classroom/update/'.$result['id']);}else{echo set_url('classroom/registration');} ?>" class="col-6">
        <fieldset class="p-4">
            <input name="section" type="hidden" value="secondary">
            <div class="form-group mt-1">
                <label>Grade</label>
                <select name="grade" id="grade" required="required" <?php if(isset($result) && !empty($result)){echo "disabled='disabled'"; }?>>
                    <option value="">select</option>
                    <option value="1">12</option>
                    <option value="2">13</option>
                </select> 
            </div>
                
            <div class="form-group mt-1">
                <label>Class</label>
                <input type="text" name="class" placeholder="Ex:- A, B, C..." value="<?php if(isset($result)){echo $result['class'];} ?>" required="required" <?php if(isset($result) && !empty($result)){echo "disabled='disabled'"; }?>>
            </div>

            <div class="form-group mt-1">
                <label>Stream</label>
                <select name="stream" id="stream" required="required" <?php if(isset($result) && !empty($result)){echo "disabled='disabled'"; }?>>
                    <option value="">select</option>
                    <option value="chemistry"  <?php if(isset($result) && $result['stream'] == "chemistry"){echo "selected='selected'";} ?>>Chemistry</option>
                    <option value="physics" <?php if(isset($result) && $result['stream'] == "physics"){echo "selected='selected'";} ?>>Physics</option>
                    <option value="maths" <?php if(isset($result) && $result['stream'] == "maths"){echo "selected='selected'";} ?>>Maths</option>
                    <option value="bio" <?php if(isset($result) && $result['stream'] == "bio"){echo "selected='selected'";} ?>>Bio</option>
                    <option value="ict" <?php if(isset($result) && $result['stream'] == "ict"){echo "selected='selected'";} ?>>ICT</option>
                </select> 
            </div>


            <div class="form-group mt-1">
                <label>Class Teacher</label>
                <select name="class_teacher" id="class_teacher">
                    <option value="">select</option>
                    <?php foreach ($teachers as $teacher) { ?>
                        <option value="<?php echo $teacher['id']; ?>" <?php if(isset($result) && $result['class_teacher_id'] === $teacher['id']){echo "selected='selected'";} ?>><?php echo $teacher['name_with_initials']; ?></option>
                    <?php } ?>
                </select> 
            </div>
            <div class="form-group w-90">
                <label for="description">Description</label>
                <textarea name="description" id="description"  class="w-100" rows="10"><?php if(isset($result)){echo $result['description'];} ?></textarea>
            </div>

            <div class="w-100 p-1"></div>

            <?php 
                if(isset($result)){
                    echo '<div class="form-group d-flex w-100 flex-row justify-content-end">
                            <button type="submit" name="update" class="btn btn-blue w-auto m-1">Update</button>
                            </div>';
                }else{
                    echo '<div class="form-group d-flex w-100 flex-row justify-content-end">
                            <button type="submit" name="submit" class="btn btn-blue w-auto m-1">SAVE</button>
                            </div>';
                }
             ?>
        </fieldset>
    </form>

    <form  id="upload_classrooms" class="col-12 d-flex justify-content-center" method="POST" enctype="multipart/form-data" action="<?php echo set_url("classroom/registration");?>">
    </form>
</div>  
