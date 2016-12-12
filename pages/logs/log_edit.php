<?php

/* 
connection to database (definition):
$host - define your host here, if using a remote host, specify the url of the hostname
$db_username - define your database username access here
$db_password - define your database password access here
$db_name - define the database name that will be accessed here
*/
$id=$_REQUEST['id'];

include "../../config.php";
// placeholder and query executor to get the values from the tables person and services, the results are
// then placed in $result which will be needed later below	
$result=mysqli_query($con,"SELECT * FROM tbl_is_log WHERE id = '$id'");

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
                        <li><a href="../../pages/login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <a href="../../pages/profile/is_list.php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="../../pages/docs/doc_list.php"><i class="fa fa-files-o fa-fw"></i> IS Documents</a>
                        </li>
                        <li>
                            <a href="../../pages/logs/log_list.php"><i class="fa fa-edit fa-fw"></i> IS Change Logs</a>
                        </li>
                        <li>
                            <a href="../../pages/login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
							>> View Record
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<form action="log_update.php" method="post" onsubmit="return formValidate()">
           
                                    
                                       <form action="log_post.php" method="post" onsubmit="return formValidate()"> <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Record
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
									    <?php while ($row=mysqli_fetch_array($result)) { ?>


<div class="form-group">
<input class="form-control" type="hidden" name="id"value="<?php echo $row['id']?>">
</input>
</div>
<div class="form-group">
<label>IS ID</label>
<input class="form-control"type="int" name="is_id"value="<?php echo $row['is_id']?>">
</input>
</div>
<div class="form-group">
<label>Log Name</label>
<input class="form-control" type="text" name="log_name"value="<?php echo $row['log_name']?>">
</input>
</div>
<div class="form-group">
<label>Log Type</label>
<input class="form-control" type="text" name="log_type"value="<?php echo $row['log_type']?>">
</input>
</div>
<div class="form-group">
<label>Log Description</label>
<textarea class="form-control" type="text" name="log_description" value="<?php echo $row['log_description']?>">
</textarea>
</div>
<div class="form-group">
<label>Date Uploaded</label>
<input class="form-control" type="date" name="date_uploaded"value="<?php echo $row['date_uploaded']?>">
</input></div>
<div class="form-group">
<label>Uploaded by</label><input class="form-control" type="text" name="uploaded_by"value="<?php echo $row['uploaded_by']?>">
</input>
</div>
<div class="form-group">
<label>Fix Description</label>
<textarea class="form-control" type="text" name="fix_description"value="<?php echo $row['fix_description']?>">
</textarea>
</div>

                                         <button type="submit" class="btn btn-info">Submit</button>
                                        <button type="reset" class="btn btn-success">Reset</button><?php } ?>
<?php mysqli_close($con); ?>
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
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Custom DatePicker -->
	<link rel="stylesheet" href="/js/jquery-ui.css">
	<script src="/js/jquery-1.12.4.js"></script>
	<script src="/js/jquery-ui.js"></script>
	<script>
	  $( function() {
		$( "#datepicker" ).datepicker();
	  } );
	</script>
</body>
</html>



