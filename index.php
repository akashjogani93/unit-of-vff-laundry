<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="icon" type="" href="images/favicon.ico" />
    <title></title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ropa+Sans&display=swap" rel="stylesheet">
   
    <!-- custome stylesheet -->
    <link href="./assets/css/custom.css" rel="stylesheet">
    <!-- custome stylesheet -->

    

    <style type="text/css">
    body {
        /* background-image: linear-gradient(to bottom , #248ea9 40%, #fafdcb 40%); Standard syntax (must be last) */
        background-image: url("assets/image/105267335-wicker-basket-with-clothes-on-ironing-board-at-dry-cleaner-s.webp");
        /* background-color: #946000; */
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
        overflow-y: hidden;
        font-family: 'Ropa Sans', sans-serif;
    }


    .container-fluid {
        height: 100%;

        padding-bottom: 129px;
    }

    .main {
        height: 400px;
        margin-top: 6em;
        background-color: rgba(33, 37, 41, 0.7);

    }

    .main label {
        color: #ffffff;
    }

    form {
        margin: 0px;
        padding: 0px;


    }

    h1 {
        color: white;
    }
    .m-4 {
    margin: 0.2rem!important;
}

.mt-2, .my-2 {
    margin-top: 2.5rem!important;
}


element.style {
}
.main {
    height: 400px;
    margin-top: 6em;
    background-color: white;
}
    </style>
</head>

<body>
    <div class="container-fluid" >
        <div class="container d-flex justify-content-center">
            <div class="col-md-3 form-control main">
                <div class="lobo text-center">
                    <img class="m-4" src="assets/image/vff.png" width="55">
                    <h1 style="color:black;">VFF Group</h1>
                    <hr style="color:black;" >
                </div>
                <form name="Login_Form" method="POST">
                    <div class="m-2">
                        <label for="username">Username</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Username" id="username"
                            name="username" required>
                    </div>
                    <div class="m-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-sm" placeholder="Password" id="password"
                            name="password" required>
                    </div>

                    <div class="m-2 text-center">
                        <button type="submit" name="login"
                            class="btn btn-sm col-md-8 mt-2 btn-outline-primary">log-In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
    session_start();
    if(isset($_POST['login']))
    {
        include('connect.php'); 
		$user=$_POST['username'];
		$pass=$_POST['password'];
		$query="SELECT * FROM `login` WHERE `username`='$user' AND `password`='$pass';";
		$confirm=mysqli_query($conn,$query) or die(mysqli_error());
		$result=mysqli_num_rows($confirm);
		if($result!=0)
		{   
            $out=mysqli_fetch_array($confirm);
            
            $id=$out['id'];
            $type=$out['user'];

            $_SESSION["type"]=$type;
            $_SESSION['id']=$id;
            //$_SESSION['idd']=$id;
        
            
            if($type=="admin")
            {
                $_SESSION['Is_Login']=true;
                echo "<script>window.location='dashboard.php';</script>";
            }
            else
                {
                    if($type=="Shop Keeper")
                    {
                        echo "<script>alert('login sucsessful');</script>";
                        echo "<script>window.location='shopkeeper/dashboard.php';</script>";
                       
                    }
                    else
                    { 
                            
                        if($type=="Delevery Boy")
                        {
                            echo "<script>alert('login sucsessful');</script>";
                            echo "<script>window.location='DeleveryBoy/dashboard.php';</script>";
                           
                        }
                        else
                        {
                            echo "<script>alert('login unsucsessful');</script>";
                               
                        }
                           
                    }
                }
            }
        else
        {
            echo "<script>alert('login unsucsessful');</script>";
        }
    }
?>