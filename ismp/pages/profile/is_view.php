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
							 View record
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-9">
                    <span class="pull-left">
					
	
	<?php

$id=$_REQUEST['id'];


include "../../config.php";
	

		$result=mysqli_query($con,"SELECT t1.`name`, t1.category,t1.tracker,t1.front_end,t1.url,t1.cron,t1.last_va,t1.business_owner,t1.remarks,t1.training_url,t1.Api,t1.rdbms, t1.assigned_to, t1.access, 
		                             t2.`desc` as categoryname, 
		                             t3.`desc` as accessname,
		                             t4.group_id, t4.group_name,
		                             t5.`desc` as frontendname,
									 t6.`desc` as trackername,
									 t7.`desc` as rdbmsname 
									 
							FROM tbl_is as t1  
						    LEFT JOIN lib_category as t2 on t1.category = t2.id 
							LEFT JOIN lib_access as t3 on t1.access = t3.id
							LEFT JOIN ost_groups as t4 on t1.assigned_to = t4.group_id 
							LEFT JOIN lib_frontend as t5 on t1.front_end = t5.id
							LEFT JOIN lib_tracker as t6 on t1.tracker = t6.id
							LEFT JOIN lib_rdbms as t7 on t1.rdbms = t7.id ")
                          
?>


	<style type="text/css">

</style>	
<div class="panel-body">
 <div class="dataTable_wrapper"> 
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>   
 <tbody>


 <?php while ($row=mysqli_fetch_array($result)) { ?>

   <tr>
    <th>Name</th>
	<td><?php echo $row ['name'] ?></td>
	</tr>
	<tr>
	<th>Category</th>
	<td><?php echo $row['category']?> <?php echo $row['categoryname'] ?> </td>
	</tr>
	<tr>
	<th>Tracker</th>
	<td><?php echo $row['tracker'] ?><?php echo $row ['trackername']?></td>
	</tr>
	<tr>
	<th>Access</th>
    <td><?php echo $row['access'] ?><?php echo $row ['accessname']?></td>
	</tr>
	<tr>
	<th>Front_End</th>
    <td><?php echo $row['front_end'] ?> <?php echo $row['frontendname'] ?></td>
    </tr>
	<tr>
    <th>Rdbms</th>	
	<td><?php echo $row['rdbms'] ?><?php echo $row['rdbmsname']?></td>
	</tr>
	<tr>
	<th>Url</th>
	<td><?php echo $row['url'] ?></td>
	</tr>
	<tr>
	<th>Cron</th>
	<td><?php echo $row['cron'] ?></td>
	</tr>
	<tr>
	<th>Api</th>
    <td><?php echo $row['Api'] ?></td>
	</tr>
	<tr>
	<th>Training_url</th>
    <td><?php echo $row['training_url'] ?></td>
	</tr>
	<tr>
	<th>Last_Va</th>
    <td><?php echo $row['last_va'] ?></td>
    </tr>
	<tr>
	<th>Remarks</th>
	<td><?php echo $row['remarks'] ?></td>
	</tr>
	<tr>
	<th>Assigned_to</th>
	<td><?php echo $row['assigned_to']?><?php echo $row ['group_name']?></td>
	</tr>
	<tr>
	<th>Business_owner</th>
   <td><?php echo $row['business_owner']?></td>
   </tr>
    </thead>
     </table>
	
<td><a href="is_list.php"><button type=button class = "btn btn-success btn-xs">BACK</button></a></td>	
  </table>
 
  <ul class="pager">
    <li class="previous"><a href="#">Previous</a></li>
    <li class="next"><a href="#">Next</a></li>
  </ul>

<?php } ?>
<?php mysqli_close($con); ?>			
				
			</span>
                </div>
              </div>
            <!-- /.row -->
			
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

</body>
</html>