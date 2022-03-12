<?php include('inc/header.php');  ?>

<?php include('inc/nav.php');  ?>
 
<div class="container">
    <div class="row">

        <div class="col-md-12 my-5">
            <div class="page_header text-center">
                <!-- <h2>Shop - Account</h2>  -->
            </div>
        </div>


        <div class="col-md-12">
            <div class="row shop-login">
                <div class="col-md-6">
                    <div class="box-content">
                        <h3 class="heading text-center">Login Email & Password</h3>
                    <div class="clearfix space40"></div>

                <?php
                if(isset($_REQUEST['message'])){
                if($_GET['message'] == '1'){
                ?>

                <div class="alert alert-danger">Invalid Email or Password</div>

                <?php
                }
                }
                ?>

            <form class="logregform" action='loginProcess.php' method='post'>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Username or E-mail Address</label>
                            <input type="text" value="" class="form-control" name='email'>
                        </div>
                    </div>
                </div>

                <div class="clearfix space20"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <!-- <a class="pull-right text-white" href="#">(Lost Password?)</a> -->
                            <label>Password</label>
                            <input type="password" value="" class="form-control" name='password'>
                        </div>
                    </div>
                </div>

                <div class="clearfix space20"></div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" name='submit' class="btn btn-primary btn-md">Login</button>
                    </div>
                </div>
            </form>

        </div>
    </div>



    <div class="col-md-6">
        <div class="box-content">
            <h3 class="heading text-center">Register An Account</h3>
            <div class="clearfix space40"></div>

            <?php
                if(isset($_REQUEST['message'])){
                if($_GET['message'] == '2'){ 
            ?>

            <div class="alert alert-danger">Error Creating Account</div>

            <?php
            }
            }
            ?>

            <form class="logregform" action='registerprocess.php' method='post'>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>E-mail Address</label>
                            <input type="text" value="" class="form-control" name='email'>
                        </div>
                    </div>
                </div>

                
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Password</label>
                            <input type="password" value="" class="form-control" name='password'>
                        </div>
                        <div class="col-md-12">
                            <label>Re-enter Password</label>
                            <input type="password" value="" class="form-control" name='passwordAgain'>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="space20"></div>
                        <button type="submit"  name='submit' class="btn btn-primary btn-md pull-right">Register</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


</div>
</div>
</div>





<?php include('inc/footer.php');  ?>



