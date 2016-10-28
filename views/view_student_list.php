    <?php 

    $students = $tpl_vars["students"];

    ?>

    <header>
        <h1>Students list</h1>
    </header>
    <table class="table">
    <?php foreach ($students as $student): ?>
    <tr>
        <td><?php echo $student['student_firstname'] ?></td>
        <td><?php echo $student['student_lastname'] ?></td>
        <td><?php echo $student['student_email'] ?></td>
        <td><button type="button" class="btn btn-primary" onclick="document.location='/?model=student&method=form&id=<?php echo $student['student_id'] ?>'">Edit</button>
            <button type="button" class="btn btn-danger">Delete</button></td>
    </tr>
    <?php endforeach ?>
    </table>

    <button type="button" class="btn btn-primary" onclick="document.location='/?model=student&method=form'">Add student</button>