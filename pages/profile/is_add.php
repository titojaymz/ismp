<?php 
//generate the unique id
$uniqid=substr(uniqid(rand(10,1000),false),rand(0,10),6); 
?>

<?php

/* 
connection to database (definition):
$host - define your host here, if using a remote host, specify the url of the hostname
$db_username - define your database username access here
$db_password - define your database password access here
$db_name - define the database name that will be accessed here
*/

include "../../config.php";

// placeholder and query executor to get the values from the tables person and services, the results are
// then placed in $result which will be needed later below	
$result=mysqli_query($con,"select * from lib_category");
$result_owner=mysqli_query($con,"select GroupCode, GroupName from lib_agency_group");
$result_assigned=mysqli_query($con,"select group_id, group_name from ost_groups");
$result_access=mysqli_query($con,"select * from lib_access");
$result_tracker=mysqli_query($con,"select * from lib_tracker");
$result_frontend=mysqli_query($con,"select * from lib_frontend");
$result_rdbms=mysqli_query($con,"select * from lib_rdbms");



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Information Systems Management Portal</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Information Systems Management Portal</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="/pages/login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="is_list.php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="doc_list.php"><i class="fa fa-files-o fa-fw"></i> IS Documents</a>
                        </li>
                        <li>
                            <a href="log_list.php"><i class="fa fa-edit fa-fw"></i> IS Change Logs</a>
                        </li>
                        <li>
                            <a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Info System
					<small>
						<i class="icon-double-angle-right"></i>
							>> Add record
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Record
                        </div>
					<form name="form" action="is_collect.php" method="post" onsubmit="return formValidate()">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <form role="form">
								<input type="hidden" name="id">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control " name = "category">
                                                <option></option>									
												<?php 
												// fetches the result from $result and be readied to be displayed in html
												// the format for while syntax is while (parameters) {actions..}
												while ($row=mysqli_fetch_array($result)) { 
												?>
												<option value='<?php echo $row['desc'] ?>'><?php echo $row['desc'] ?></option>												
												<?php } ?>										
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>IS Name</label>
                                            <input class ="form-control" name = "name">
                                        </div>                                        
                                        <div class="form-group" name = "desc">
                                            <label>IS Description</label>
                                            <textarea class="form-control"  name = "desc"rows="3"></textarea>
                                        </div>
										 <div class="form-group">
										 <label>Tracker</label>
                                            <select class="form-control "  name = "tracker">
                                                <option></option>									
												<?php 
												// fetches the result from $result and be readied to be displayed in html
												// the format for while syntax is while (parameters) {actions..}
												while ($row=mysqli_fetch_array($result_tracker)) { 
												?>
												<option value='<?php echo $row['desc'] ?>'><?php echo $row['desc'] ?></option>												
												<?php } ?>	
                                                 </select>	
    											</div> 
										 <div class="form-group">
										 <label>Access</label>
                                            <select class="form-control" name = "access">
                                                <option></option>									
												<?php 
												// fetches the result from $result and be readied to be displayed in html
												// the format for while syntax is while (parameters) {actions..}
												while ($row=mysqli_fetch_array($result_access)) { 
												?>
												<option value='<?php echo $row['desc'] ?>'><?php echo $row['desc'] ?></option>												
												<?php } ?>	
                                                 </select>	
    											</div> 
										 <div class="form-group">
										 <label>Front End</label>
                                            <select class="form-control" name = "front_end">
                                                <option></option>									
												<?php 
												// fetches the result from $result and be readied to be displayed in html
												// the format for while syntax is while (parameters) {actions..}
												while ($row=mysqli_fetch_array($result_frontend)) { 
												?>
												<option value='<?php echo $row['desc'] ?>'><?php echo $row['desc'] ?></option>												
												<?php } ?>	
                                                 </select>	
    											</div> 
										 <div class="form-group">
										 <label>RDBMS</label>
                                            <select class="form-control" name = "rdbms">
                                                <option></option>									
												<?php 
												// fetches the result from $result and be readied to be displayed in html
												// the format for while syntax is while (parameters) {actions..}
												while ($row=mysqli_fetch_array($result_rdbms)) { 
												?>
												<option value='<?php echo $row['desc'] ?>'><?php echo $row['desc'] ?></option>												
												<?php } ?>	
                                                 </select>	
    											</div> 
                                            <div class="form-group">
                                            <label>URL</label>
                                            <input class="form-control" name = "url">
											</div>
											<div class="form-group">
                                            <label>CRON Scripts</label>
                                            <input class="form-control" name = "cron">
											</div>
                                            <div class="form-group" name = "api">
                                            <label>API URL</label>
                                            <input class="form-control" name = "api">
											</div> 
											<div class="form-group">
                                            <label>Training URL</label>
                                            <input class="form-control" name = "training_url">
											</div>
										<div class="form-group">
											<label for="disabledSelect">Last VA</label>
											<input class="form-control" type="date"  name = "last_va">
										</div>
										<div class="form-group">
                                            <label>Remarks</label>
                                            <textarea class="form-control" name = "remarks" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Assigned To</label>
                                            <select class="form-control" name = "assigned_to">
                                                <option></option>									
												<?php 
												// fetches the result from $result and be readied to be displayed in html
												// the format for while syntax is while (parameters) {actions..}
												while ($row_assigned=mysqli_fetch_array($result_assigned)) { 
												?>
												<option value='<?php echo $row_assigned['group_name'] ?>'><?php echo $row_assigned['group_name'] ?></option>												
												<?php } ?>										
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Business Owner</label>
                                            <select class="form-control" name = "business_owner">
                                                <option></option>									
												<?php 
												// fetches the result from $result and be readied to be displayed in html
												// the format for while syntax is while (parameters) {actions..}
												while ($row_owner=mysqli_fetch_array($result_owner)) { 
												?>
												<option value='<?php echo $row_owner['GroupName'] ?>'><?php echo $row_owner['GroupName'] ?></option>												
												<?php } ?>										
                                            </select>
                                        </div>											
                                         <a href="is_list.php?id=<?php echo $row['id']?>"><button type="submit" class="btn btn-default">Submit</button>
                                        <a href="is_add.php?id=<?php echo $row['id']?>"><button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->		
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../../bower_components/raphael/raphael-min.js"></script>
    <script src="../../bower_components/morrisjs/morris.min.js"></script>
    <script src="../../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>

    <!-- Custom DatePicker -->
	<link rel="stylesheet" href="/js/jquery-ui.css">
	<script src="../../js/jquery-1.12.4.js"></script>
	<script src="../../js/jquery-ui.js"></script>
	<script>
	  $( function() {
		$( "#datepicker" ).datepicker();
	  } );
	</script>
</body>
</html>


