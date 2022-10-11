<?php include("sidebar.php");

$update='true'; $unit=''; $kg=''; $iname=''; $title=''; $cate='';
?>
<style>
    
.form-controls {
    
    width: 100%;
    font-size: 1rem;
    font-weight: 400;
    color: #495057;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    
}
</style>

<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-between">
             <h2 class="" style=" font-weight: 600">Item Master</h2>
        </div>
        <hr style="margin: 0px;">
    </div>
</div>
                <?php
                    $id = 0;
                    $sql = "SELECT max(id) FROM item";
                    $retval = mysqli_query($conn, $sql );

                    if(! $retval ) {
                        die('Could not get data: ' . mysqli_error($conn));
                    }
                    while($row = mysqli_fetch_assoc($retval)) {
                        $id=$row['max(id)'];
                        $id++;
                    }
                ?>

                <?php
                    if(isset($_GET['edit']))
                    { 
                        $id=$_GET['edit'];
                        $qry="SELECT * FROM item WHERE id='$id'";
                        $exc=mysqli_query($conn,$qry);
                        while($row=mysqli_fetch_array($exc))
                        {
                            $id=$row['id'];
                            $iname=$row['iname'];
                            $unit=$row['p_unit'];
                            $title=$row['service'];
                            //$cate=$row['cate'];
                            //$kg=$row['pkg'];
                            $update="false";

                            
                        }

                    }
                ?>


<!-- sidebar-wrapper  -->
<main class="page-content">
    <div class="container">
        <!--<form action="item_submit.php" method="post" enctype="multipart/form-data">
            
            <div class="row mt-2">
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Item Id</label>
                    <input type="text" name="id" value="<?php echo $id; ?>" class="form-control form-control-sm" id="id" readonly required>
                </div>                           
                <div class="group-form col-md-5">
                    <label class="form_label" for="company_name">Item Name</label>
                    <input type="text" name="item" id="item" value="<?php echo $iname; ?>" class="form-control form-control-sm" placeholder="Add Item" required>
                </div>
                <div class="group-form col-md-2">
                <?php
                    if($update=='true') 
                    { ?>
                        <label class="form_label" for="company_name"></label>
                        <button type="submit" name="postSubmit" class="btn btn-sm btn-primary col-md-12">Submit</button>
                    <?php
                    }else
                    {?>
                        <label class="form_label" for="company_name"></label>
                        <button type="submit" name="postUpdate" class="btn btn-sm btn-danger col-md-12">Update</button>
                </div>
                <div class="group-form col-md-2" style="margin-top:20px;">
                        <a href="items.php" type="button" class="btn btn-sm btn-primary col-md-12">Back</a> 
                    <?php
                    }
                ?>
                </div>               
            </div>
        </form>-->
        <hr />
    

        <div class="table-responsive" style="overflow-y:scroll; height:580px; width:80% margin-left: 100px;">
            <table id="example" class="cell-border" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Item Name</th>
                        
                    </tr>
                </thead>
                <tbody id="mytable">
                    <?php                
                        $qry="select * from item";
                        $exc=mysqli_query($conn,$qry);
                        while($row=mysqli_fetch_array($exc))
                        {
                                
                        ?>          
                                <tr class="text-center">
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['iname'] ?></td>
                                    </tr>
                        <?php
                            }
                    ?>
            </tbody>
            </table>
        </div>
    </div>
</main>

<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>


<?php include("../footer.php"); ?>

