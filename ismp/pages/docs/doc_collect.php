<html>
<head> 
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Information Systems Management Portal</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- MetisMenu CSS -->
    <link" rel="stylesheet" href="../../bower_components/metisMenu/dist/metisMenu.min.css>

    <!-- Timeline CSS -->
    <link rel="stylesheet" href="../../dist/css/timeline.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../dist/css/sb-admin-2.css">

    <!-- Morris Charts CSS -->
    <link rel="stylesheet" href="../../bower_components/morrisjs/morris.css">

    <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css" href="../../bower_components/font-awesome/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

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
							>> Add
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                    <span class="pull-left"></span>
				
<?php 
$isId=$_REQUEST['is_id'];
$docName=$_REQUEST['name'];
$fileFormat=$_REQUEST['fileformat'];
$uploadedBy=$_REQUEST['uploadedby'];
$version=$_REQUEST['version'];
?>
<form name="form" action="doc_post.php" method="post">
<input type="hidden" name="id" value="<?php echo $id ?>">
<input type="hidden" name="is_id" value="<?php echo $isId ?>">
<input type="hidden" name="name" value="<?php echo $docName ?>">
<input type="hidden" name="fileformat" value="<?php echo $fileFormat ?>">
<input type="hidden" name="uploadedby" value="<?php echo $uploadedBy ?>">
<input type="hidden" name="version" value="<?php echo $version ?>">
<table class="table">
    <div class="row">
	<div class="col-lg-12">
	<tr>
	<th>IS ID</th>
	<td><?php echo $isId ?></td>
	</tr>
	</div>
	<div class="row">
	<tr>
	<th>Name</th>
	<td><?php echo $docName ?></td>
	</tr>
	</div>
	<div class="row">
	<tr>
	<th>File Format</th>
	<td><?php echo $fileFormat ?></td>
	</tr>
	</div>
	<div class="row">
	<tr>
	<th>Uploaded By</th>
	<td><?php echo $uploadedBy ?></td>
	</tr>
	</div>
	<div class="row">
	<tr>
	<th>Version</th>
	<td><?php echo $version ?><td>
	</tr>
	</div>
</table>
<button type="submit" class="btn btn-primary">Submit</button>
<a href="doc_add.php"><button type="button" class="btn btn-">Back</button></a>
</div>
</form>


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