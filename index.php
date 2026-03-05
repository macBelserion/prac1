<?php
session_start();
require_once 'course.php';

if(!isset($_SESSION['sudlonan'])){
    $_SESSION['sudlonan'] = [];
}

// Save button
if(isset($_POST['save'])){
    $task = new Course($_POST['name'], $_POST['age'], $_POST['course']);

    $_SESSION['sudlonan'][] = [
        'name' => $task->getName(),
        'age' => $task->getAge(),
        'course' => $task->getCourse()
    ];
}

// Clear button
if(isset($_POST['clear'])){
    unset($_SESSION['sudlonan']);
    $_SESSION['sudlonan'] = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belat</title>
  
</head>
<body>
    <div class="formcontainer">
        <h2>Student Form</h2>
        <form method="post" action="">
            <label>Name</label>
            <input type="text" name="name" required>

            <label>Age</label>
            <input type="number" name="age" required>

            <label>Course</label>
            <input type="text" name="course" required>

            <button type="submit" name="save">Save Task</button>
            <button type="submit" name="clear">Clear</button>
        </form>
    </div>

    <table class="student-table">
        <thead>
            <tr>
                <th>Name Student</th>
                <th>Age</th>
                <th>Course</th>
            </tr>
        </thead>
        <tbody>
        <?php if (empty($_SESSION['sudlonan'])): ?>
            <tr>
                <td colspan="3">No students available</td>
            </tr>
        <?php else: ?>
            <?php foreach ($_SESSION['sudlonan'] as $student): ?>
            <tr>
                <td><?= htmlspecialchars($student['name']) ?></td>
                <td><?= htmlspecialchars($student['age']) ?></td>
                <td><?= htmlspecialchars($student['course']) ?></td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>


  <style>
        body{
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            background: #f0f0f0;
        }
        .formcontainer{
            width: 400px;
            margin: 40px auto;
            padding: 25px;
            background: #f8ec0b;
            border-radius: 8px;
        }
        label{
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input{
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        button{
            margin-top: 15px;
            padding: 10px;
            width: 100%;
            cursor: pointer;
            border: none;
            color: white;
            background: #3498db;
            font-weight: bold;
        }
        button[name="clear"]{
            background: #e74c3c;
        }
        /* Centered table */
        .student-table {
            width: 80%;
            margin: 20px auto; /* centers table horizontally */
            border-collapse: collapse;
            background: #fff;
            text-align: center;
            border-radius: 5px;
            overflow: hidden;
        }
        .student-table th, .student-table td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        .student-table th {
            background: #3498db;
            color: white;
        }
    </style>