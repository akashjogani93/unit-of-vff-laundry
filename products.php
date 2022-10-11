<?php include("connect.php"); ?>

<?php
    $typ=$_POST['typ'];
    $ser=$_POST['ser'];
            
    $sid=$row['sid'];
    $qry1="SELECT `sid` FROM `services` WHERE `title`='$ser'";
    $exc1=mysqli_query($conn,$qry1);
    while($out=mysqli_fetch_array($exc1))
    {
        $sid=$out['sid'];
        $qry="SELECT * FROM `item` WHERE `sid`='$sid'";
        $exc=mysqli_query($conn,$qry);
        while($row=mysqli_fetch_array($exc))
        {
            ?>
                <tr class="text-center">  
                    <td><?php echo $row['iname']; ?></td>
                    <td class="text-center">
                    <a href="items.php?edit=<?php echo $row['id']; ?>"><button class="btn btn-sm btn-primary">Add</button> </a></td>
                </tr>
            <?php

        }
    }
?>