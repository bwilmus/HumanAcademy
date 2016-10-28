<?php 

    $student = $tpl_vars["student"];
    $message = $tpl_vars["message"];

?>



<div class="row">
  <div class="col-xs-6 col-md-2">
    <img src = "images/default.png">
  </div>
  <div class="col-xs-12 col-sm-6 col-md-10">
    
    <form method = "POST" action = "">
      <input type = "hidden" name = "form_id" value = "student_form">
      <input type = "hidden" name = "student_id" value = "<?php echo $student["student_id"]; ?>">
      <div class="form-group">
        <label for="student_firstname">Firstname</label>
        <input type="text" class="form-control" name="student_firstname" id="student_firstname" placeholder="Jean" value = "<?php echo $student["student_firstname"]; ?>">
      </div>
        <div class="form-group">
        <label for="student_latname">Lastname</label>
        <input type="text" class="form-control" name = "student_lastname" id="student_lastname" placeholder="Dupond" value = "<?php echo $student["student_lastname"];  ?>">
      </div>
      <div class="form-group">
        <label for="student_email">Email address</label>
        <input type="email" class="form-control" name="student_email" id="student_email" placeholder="jean.dupont@gmail.com" value = "<?php echo $student["student_email"];  ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputFile">Picture</label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">Modify picture here</p>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
<?php if($message): ?>
  <div class="alert alert-success" role="alert"><?php echo $message;  ?>
  </div>
<?php endif ?>

  </div>
 
</div>
