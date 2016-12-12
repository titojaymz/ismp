<?php


include "../../config.php";

$result_id=mysqli_query($con,"select * from tbl_is");	
$result_version=mysqli_query($con,"select * from lib_version");
$result_format=mysqli_query($con,"select * from lib_format");
$result_uploader=mysqli_query($con,"select * from lib_uploader");
?><!DOCTYPE html>
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
                            <a href="../../pages/profile/is_list.php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="doc_list.php"><i class="fa fa-files-o fa-fw"></i> IS Documents</a>
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
                    <h1 class="page-header">IS Documents
						<small>
						<i class="icon-double-angle-right"></i>
							>> Edit
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                    <span class="pull-left"></span>
<?php 
$id=$_REQUEST['id'];
?>
<?php


$result=mysqli_query($con,"SELECT * FROM tbl_is_doc WHERE id = '$id'");
if($result == FALSE){
	die("Error");
}
?>
<form name="form" action="doc_update.php" method="post" onsubmit="submitform()">
<input type="hidden" name="id" <?php echo $id?>>
<div class="row">
<div class="col-md-12 col-sm-6 col-xs-12">
<div class="panel panel-default">
<div class="panel-heading clearfix">
<i class="icon-calendar"></i>
<h3 class="panel-title">Edit Record</h3>
</div>
<?php while ($row=mysqli_fetch_array($result)) { ?>

		<div class="panel body">
		<form class="form-horizontal row-border">
		<div class="form-group">
		<label class="col-md-6 control-label">IS Id</label>
		<input type="text" name="is_id" placeholder="is_id" class="form-control" value="<?php echo $row['is_id'] ?>" disabled>
		</div>
        <div class="form-group">
		<label class="col-md-6 control-label">Name</label>
		<input type="text" name="name" placeholder="name" class="form-control" value="<?php echo $row['name'] ?>" required>
		</div>
		<div class="form-group">
		<label class="col-md-6 control-label">File Format</label>
		<select id="fileFormat" name="fileformat" placeholder="fileformat" class="form-control" value="<?php echo $row['fileformat'] ?>" required>
		<option></option>
		<?php
        while ($row=mysqli_fetch_array($result_format)) {
		?>
		<option value='<?php echo $row['desc'] ?>'><?php echo $row['desc'] ?></option>
		<?php } ?>
		</select>
		</div>
		<div class="form-group">
		<label class="col-md-6 control-label">Uploaded By</label>
		<select id="uploadedBy" name="uploadedby" placeholder="uploadedby" class="form-control" value="<?php echo $row['uploadedby'] ?>" required>
		<option></option>
		<?php
		while ($row=mysqli_fetch_array($result_uploader)) {
		?>
		<option value='<?php echo $row['desc'] ?>'><?php echo $row ['desc'] ?></option>
		<?php } ?>
		</select>
		</div>
		<div class="form-group">
        <label>Version</label>
        <select id="Version" name="version" placeholder="version" class="form-control" value="<?php echo $row['version'] ?>" required>
        <option></option>						
		<?php
		while ($row=mysqli_fetch_array($result_version)) { 
		?>
		<option value='<?php echo $row['desc'] ?>'><?php echo $row['desc'] ?></option>												
		<?php } ?>										
        </select>
        </div>		
        <div class="form-group">
		<button type="submit" class="btn btn-default">Submit</button>
		<button type="reset" class="btn btn-default">Reset</button>
		<text>Or      </text>
		<a href="doc_list.php"><button type="button" class="btn btn-"><span class="glyphicon glyphicon-list">Go back</span></button></a><br>                 			
		</form>
		</div>
</div>
</div>
</div>
</div>
</form>
<?php } ?>
<?php mysqli_close($con);
?>
<script>
function submitform() {
  var f = document.getElementsByTagName('form')[0];
  if(f.checkValidity()) {
    f.submit();
  } else {
    alert(document.getElementById('example').validationMessage);
  }
  var e= document.getElementById("fileFormat");
  var strUser = e.options[e.selectedIndex].value;
  
  var strUser = e.option[e.selectedIndex].text; 
  if(strUser==0)
  {
	  alert("Please select")
  }	  
  var e= document.getElementById("uploadedBy");
  var strUser = e.options[e.selectedIndex].value;
  
  var strUser = e.option[e.selectedIndex].text; 
  if(strUser==0)
  {
	  alert("Please select")
  }	
  var e= document.getElementById("Version");
  var strUser = e.options[e.selectedIndex].value;
  
  var strUser = e.option[e.selectedIndex].text; 
  if(strUser==0)
  {
	  alert("Please select")
  }	    
  }
}
</script>
            <!-- /.row -->
			<div class="row">
			</div>
			<!-- /.row -->			
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="/bower_components/raphael/raphael-min.js"></script>
    <script src="/bower_components/morrisjs/morris.min.js"></script>
    <script src="/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	
	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>
</html>