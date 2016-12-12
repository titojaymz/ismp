<?php
echo $_SESSION['sees_username'] . ' ' . $_SESSION['sees_password'];
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
$result=mysqli_query($con,"select t1.id, t1.`name`, t1.category, t1.url, t1.assigned_to, t1.access, t2.`desc` as categoryname, t3.`desc` as accessname, t4.group_id, t4.group_name
							from tbl_is as t1 
							LEFT JOIN lib_category as t2 on t1.category = t2.id 
							LEFT JOIN lib_access as t3 on t1.access = t3.id
							LEFT JOIN ost_groups as t4 on t1.assigned_to = t4.group_id");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Timeline CSS -->
    <link href="../../dist/css/timeline.css" rel="stylesheet">
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
                <div class="sidebar-nav navbar-collapse">`
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
                            <a href=".log_list.php"><i class="fa fa-edit fa-fw"></i> IS Change Logs</a>
                        </li>
                        <li>
                            <a href="login.php><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
							 List
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Results for "Latest Recorded Information System" 
							<a href="../../pages/profile/is_add.php"><button href="" type="button" class="btn btn-primary btn-xs pull-right">Add New Record</button></a>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Info System Name</th>
                                            <th>Category</th>
                                            <th>URL</th>
                                            <th>Assigned Team/Person</th>
                                            <th>Access</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
										// fetches the result from $result and be readied to be displayed in html
										// the format for while syntax is while (parameters) {actions..}
										while ($row=mysqli_fetch_array($result)) { 
										?>
										<tr>
											<td>
											    <a href="is_view.php?id=<?php echo $row['id']  ?>"><button type=button class = "btn btn-info btn-xs">VIEW</button></a>
												<a href="is_edit.php?id=<?php echo $row['id'] ?>"><button type=button class = "btn btn-success btn-xs">EDIT</button></a>
	                                            <a href="is_delete.php?id=<?php echo $row['id']  ?>" onclick="return confirm('are you sure?');"><button type=button class = "btn btn-danger btn-xs">DELETE</button></a>
												 	
											</td>
											<td><?php echo $row['name'] ?></td>
											<td><?php echo $row['category'] ?><?php echo $row['categoryname']?></td>
											<td><?php echo $row['url'] ?></td>
											<td><?php echo $row['assigned_to'] ?><?php echo $row['group_name']?></td>
											<td><?php echo $row['access'] ?><?php echo $row ['accessname']?></td>
										</tr>
										<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
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

    <!-- DataTables JavaScript -->
    <script src="../../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>

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