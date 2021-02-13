<?php
$con=mysqli_connect('localhost','root','','grade');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>grading system</title>
    <link rel="stylesheet" href="bootstrap.css" class="css">
</head>

<body class="bg-success">
    <nav class="navbar navbar-expand-lg bg-danger">
        <a href="" class="nav-brand">grade</a>

    </nav>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-3">

                <form action="index.php" method="post">
                    <div class="form-group">
                        <label>Flat</label>
                        <input type="number" name="flat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>ooad</label>
                        <input type="number" name="ooad" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>ppl</label>
                        <input type="number" name="ppl" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>wadad</label>
                        <input type="number" name="wadad" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>cd</label>
                        <input type="number" name="cd" class="form-control">
                    </div>

                    <input type="submit" name="send" class="btn btn-danger btn-block">
                </form>
                <?php
                if(isset($_POST['send'])){
                    $flat=$_POST['flat'];
                    $ooad=$_POST['ooad'];
                    $ppl=$_POST['ppl'];
                    $wadad=$_POST['wadad'];
                    $cd=$_POST['cd'];
                $q=mysqli_query($con,"INSERT into obtain(flat,ooad,ppl,wadad,cd)value('$flat','$ooad','$ppl','$wadad','$cd')");
                }
                ?>
            </div>
            <div class="col-lg-9">

                <table class="table table-border table-hover">
                    <tr>
                        <th>g_id</th>
                        <th>flat</th>
                        <th>ooad</th>
                        <th>ppl</th>
                        <th>wadad</th>
                        <th>cd</th>
                        <th>per</th>
                        <th>grade</th>

                    </tr>
                    <?php
            $call=mysqli_query($con,"SELECT * FROM obtain");
            while($row=mysqli_fetch_array($call)){
                ?>

                    <tr>
                        <td><?php echo $row['g_id'];?></td>
                        <td><?php echo $row['flat'];?></td>
                        <td><?php echo $row['ooad'];?></td>
                        <td><?php echo $row['ppl'];?></td>
                        <td><?php echo $row['wadad'];?></td>
                        <td><?php echo $row['cd'];?></td>
                        <td><?php echo $per=(($row['flat']+$row['ooad']+$row['ppl']+$row['wadad']+$row['cd'])/500)*100;?></td>
                        <td>
                            <?php
                if($per>=90)
                    echo "A+";
                
                elseif($per>=80 && $per<90)
                    echo "A";
                
                elseif($per>=70 && $per<80)
                    echo "B+";
                elseif($per>=60 && $per<70)
                    echo "B";
                elseif($per>=30 && $per<60)
                    echo "c";
                else
                    echo "study smart & try again !";?></td>

                    </tr>
                     <?php } ?>

                </table>

               
            </div>

        </div>
    </div>


</body>

</html>
