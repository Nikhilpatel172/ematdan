<?php
if(isset($_POST['signup_submit']))
{
    session_start();
    $_SESSION['Username']=$_POST['user'];
    $_SESSION['password']=$_POST['pass'];
    $_SESSION['authuser'] =  0;
    include ('declared.php');
    if(($_SESSION['Username']   == 'Nikhil') and ($_SESSION['password']  ==  'Nikhil123'))
        {$_SESSION['authuser']  = 1;}
    else{
        echo '<h1>Sorry you dont have a permision to view this page!!<h1>';
        ?>
        <script>
        alert("Invalid Login Credentials");
        window.location = "admin_login.php";
        </script>
        <?php
        exit();
    }
}
if(isset($_POST['signup_submit1']))
{
    include('db_connect.php');
	$c_name = $_POST['name'];
	$party = $_POST['cparty'];
	$image = $_POST['image'];
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

					if(! $conn ) {
						 die('Could not connect: ' . mysqli_error());
					}


					$sql = "SELECT * FROM users where name='$c_name';";//incommplete might be

					$retval =  mysqli_query( $conn , $sql);

					if(! $retval ) {
						 die('Could not enter data1: ' . mysqli_error($conn));
					}
					else{
						$row = mysqli_fetch_array($retval, MYSQL_ASSOC);
                        $VOTERID = $row['voterid'];
						$DOB = $row['dob'];
                        echo $c_name;
                        echo $party;
                        echo $image;
                        echo $party1;
                        echo $VOTERID;
                        echo $DOB;
						$sql1 = "INSERT into candidate(name,voterid,dob,image,party) values('".$c_name."','".$VOTERID."','".$DOB."','".$image."','".$party."');";
                        echo "<br>".$sql1;
						
						$retval =  mysqli_query( $conn , $sql1);
                        if(! $retval ) {
							 die('Could not enter data2: ' . mysqli_error($conn));
						}
						else{
                            $sql2 = "INSERT into result(name,winner,image,novotes,declared) values('$c_name','no','$image',0,'no');";
                            $retval2 = mysqli_query($conn, $sql2);
						}
					}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>e-Matdan</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/bootstrap.css" rel="stylesheet" />
    <link href="./assets/css/style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet">
</head>
<body class="index-page">
<!-- Navbar -->
    <nav class="navbar navbar-toggleable-md bg-primary fixed-top navbar-transparent " color-on-scroll="1">
        <div class="container">
            <div class="navbar-translate">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="#" rel="tooltip" title="Designed and Developed by Nikhil & Kushal" data-placement="bottom" target="_blank">
                    e-Matdan
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                            <p data-toggle="modal" data-target="#myModal">About Us</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php" target="">
                            <i class="now-ui-icons files_paper"></i>
                            <p>Home</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Modal Core -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Elections In India</h4>
      </div>
      <div class="modal-body">
        India is a Socialist, Secular, Democratic Republic and the largest democracy in the World. The modern Indian nation state came into existence on 15th of August 1947. Since then free and fair elections have been held at regular intervals as per the principles enshrined in the Constitution, Electoral Laws and System.
        <br>
        The Constitution of India has vested in the Election Commission of India the superintendence, direction and control of the entire process for conduct of elections to Parliament and Legislature of every State and to the offices of President and Vice-President of India.
        <br>
        Election Commission of India is a permanent Constitutional Body. The Election Commission was established in accordance with the Constitution on 25th January 1950. The Commission celebrated its Golden Jubilee in 2001.
        <br>
        Originally the commission had only a Chief Election Commissioner. It currently consists of Chief Election Commissioner and two Election Commissioners.<br>
        The Commission has a separate Secretariat at New Delhi, consisting of about 300 officials, in a hierarchical set up.


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info btn-simple">Save</button>
      </div>
    </div>
  </div>
</div>
    <!-- Main Part -->
    <div class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header clear-filter" filter-color="green">
                    <div class="page-header-image" data-parallax="false" style="background-image: url('./assets/img/header.jpg');">
                    </div>
                    <div class="container">


                            <div class="form-group" >
                                <div class="row" style="padding-top: 15%">

                                    <div class="col-lg-12"><h1>Admin Panel<br></h1></div>

                                    <div class="col-lg-2 col-md-2 col-sm-3" style="border: 1px white solid;border-radius: 50px;">
                                        <br><br>
                                        <h6>Add Voters</h6>
                                        <a href="voter_reg1.php"><input class="btn btn-primary btn-round round" type="submit" name="Declare" value="Add Voters" /></a>
                                        <br><br><br>
                                        <h6>Voter List</h6>
                                        <a href="voter_list.php"><input class="btn btn-primary btn-round" type="submit" name="View" value="Voter List" /></a>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-1"></div>
                                    <div class=" col-lg-4 col-md-5 col-sm-4" style="color: white">
                                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                                            <div class="content">
                                                <div class="input-group form-group-no-border input-lg">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" style="color:white">account_circle</i>
                                                    </span>
                                                    <input type="text" name="name" class="form-control" placeholder="Name...">
                                                </div>
                                                <div class="input-group form-group-no-border input-lg" >
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" style="color:white">lock</i>
                                                    </span>
                                                    <input type="text" name="image" class="form-control" placeholder="Image" />
                                                </div>
                                                <div class="input-group form-group-no-border input-lg" >
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" style="color:white">lock</i>
                                                    </span>
                                                    <input type="text" name="cparty" class="form-control" placeholder="Party" />
                                                </div>
                                            </div>
                                            <input type="submit" name="signup_submit1" class="btn btn-primary btn-round " value="Add Candidate" />
                                            </form>
                                        </div>
                                    <div class="col-lg-2 col-md-2 col-sm-1"></div>
                                    <div class="col-lg-2 col-md-2 col-sm-3" style="border: 1px white solid;;border-radius: 50px;">
                                        <br><br>
                                            <?php 
                                                    
                                                    include ('declared.php');
                                                    if($_SESSION['declared']=='YES')
                                                    {
                                                ?>
                                                    <h6>Start Election</h6>
                                                        <a href="start.php"><input class="btn btn-primary btn-round round" type="submit" name="Declare" value="Start Election" /></a>
                                                    
                                            <?php
                                                    }
                                                else{
                                                ?>
                                                    <h6>Declare Result</h6>
                                                        <a href="result.php"><input class="btn btn-primary btn-round round" type="submit" name="Declare" value="Declare Result" /></a>
                                                 <?php  
                                                    }

                                                ?>
                                        
                                        <br><br><br>
                                        <h6>Candidates List</h6>
                                        <a href="cand_list.php"><input class="btn btn-primary btn-round" type="submit" name="View" value="Candidate List" /></a>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="wrapper">
                </div>
            </div>
            <div class="col-sm-12">
                <footer class="footer">
                    <div class="container center-copyright">
                <nav>
                    <ul>
                        <li>Current Time : </li>
                        <a href="#"><li id="demo2"></li></a>

                    </ul>
                </nav>
                        <script>
                            var myVar=setInterval(function(){myTimer()},1000);
                            function myTimer() {
                                var d = new Date();
                                document.getElementById("demo2").innerHTML= d.toLocaleTimeString();

                                }
                        </script>
                        <div class="copyright">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script>, Designed and Coded by
                            <a href="#" target="_blank">Nikhil & Kushal</a>.
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="./assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="./assets/js/core/tether.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="./assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="./assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/now-ui-kit.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initSliders();
    });

</script>


</html>
