<br><br><br>
<form action="" method="post">
            <select name='Course' onchange='this.form.submit()'>
                <option value='0'>Select a particular semester</option>
                <option value='fall1'>Fall semester-2020</option>
                <option value='win'>Winter semester-2020</option>
                <option value='fall'>Fall semester-2021</option>
           </select>
</form>
<?php
error_reporting(E_ERROR | E_PARSE);
$sem=$_POST['Course'];
$user = 'root';
$password = ''; 
$database = 'da';
$servername='localhost';
$mysqli = new mysqli($servername, $user,$password, $database);
if ($mysqli->connect_error) {
    die('Connect Error (' . 
    $mysqli->connect_errno . ') '. 
    $mysqli->connect_error);
}

$sql = "SELECT * FROM ";
$sql = $sql.$sem;
$result = $mysqli->query($sql);
$mysqli->close(); 
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <title>Course Details-    
    </title>
    <style>
        body{
        text-align: center;}
        form{
            
            display: inline-block;
        }
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
  
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
  
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
  
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
        }
    </style>
</head>
  
<body>
    <section><br><br><br>
        <h1>Course Details-
        <?php 
    if($sem=='fall')
        echo "Fall semester-2021";
    else 
        if($sem=='fall1')
            echo "Fall semester-2020";
    else
        echo "Winter semester-2020";
    ?>
        </h1>
        <table>
            <tr>
                <th>Course</th>
                <th>Slot</th>
                <th>Faculty</th>
                <th>Cridit</th>
            </tr>
            <?php   
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <td><?php echo $rows['Course'];?></td>
                <td><?php echo $rows['Slot'];?></td>
                <td><?php echo $rows['Faculty'];?></td>
                <td><?php echo $rows['Cridit'];?></td>
            </tr>
            <?php
                }
             ?>
        </table>
    </section>
</body>
  