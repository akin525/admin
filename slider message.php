<?php include ("menubar.php"); ?>
<?php include ("include/database.php"); ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="content-wrapper">
            <div class="container-fluid">

                <!-- Title & Breadcrumbs-->
                <div class="row page-breadcrumbs">
                    <div class="col-md-12 align-self-center">
<!--                        <h4 class="theme-cl">Update Message</h4>-->
                    </div>
                </div>
                <!-- Title & Breadcrumbs-->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="row">
                                <!-- col-md-6 -->
                                <div class="col-md-12 col-12">

                                </div>




                                <div class="col-md-12">
                                    <?php

                                    if($_SERVER['REQUEST_METHOD'] == 'POST' )
                                    {

                                        $status="OK";
// Collect the data from post method of form submission // 
                                        $name=mysqli_real_escape_string($con,$_POST['name']);
//                                            $contr=mysqli_real_escape_string($con,$_POST['country']);

//collection ends
                                        $query=mysqli_query($con,"update `mg` set `message`='$name' ");


                                        echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-ban-circle'></i><strong>Success : </br></strong>Your profile has been updated.</div>"; //printing error if found in validation

                                    }


                                    $query="SELECT * FROM  `mg`";


                                    $result = mysqli_query($con,$query);
                                    $i=0;
                                    while($row = mysqli_fetch_array($result))
                                    {
//                                            $picture="$row[profilepix]";
                                        $glname="$row[message]";
//
                                    }
                                    ?>
                                    <form action="" method="post">


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Slider</label>
                                                <input type="text" name="name" class="form-control" value="<?php echo $glname; ?>">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-rounded btn-outline-success btn-block">Update Slide.</button>
                                    </form>
                                </div>
                            </div>


                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>

</div>