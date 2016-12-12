<?php


include "../../config.php";

$result_id=mysqli_query($con,"select * from tbl_is");	
$result=mysqli_query($con,"select * from lib_version");
$result_format=mysqli_query($con,"select * from lib_format");
$result_uploader=mysqli_query($con,"select * from lib_uploader");
?>
<?php include_once "../template/header.php" ?>

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
				

<form name="form" action="doc_collect.php" method="post" onsubmit="submitform()">
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">Add Record</div>
        <div class="panel body">
		<div class="row">
		<div class="col-md-12 col-sm-6 col-xs-12">
		<form role="form">
		<div class="form-group">
		<label>IS Id</label>
		<select id="isId" name="is_id" class="form-control" required>
		<option></option>
		<?php 
		while ($row=mysqli_fetch_array($result_id)) {
		?>
		<td name="is_id"><option value='<?php echo $row['id'] ?>-<?php echo $row['name'] ?>'><?php echo $row['id'] ?>-<?php echo $row['name'] ?></option></td>
		<?php } ?>
		</select>
		</div>
        <div class="form-group">
		<label class>Name</label>
		<input type="text" name="name" class="form-control" required>
		</div>
		<div class="form-group">
		<label>File Format</label>
		<select id="fileFormat" name="fileformat" class="form-control" required>
        <option></option>
		<?php
        while ($row=mysqli_fetch_array($result_format)) {
		?>
		<option value='<?php echo $row['desc'] ?>'><?php echo $row['desc'] ?></option>
		<?php } ?>
		</select>
		</div>
		<div class="form-group">
		<label>Uploaded By</label>
		<select id="uploadedBy" name="uploadedby" class="form-control" required>
		<option></option>
		<?php
		while ($row=mysqli_fetch_array($result_uploader)) {
		?>
		<option value='<?php echo $row ['desc'] ?>'><?php echo $row ['desc'] ?></option>
		<?php } ?>
		</select>
		</div>
		<div class="form-group">
        <label>Versions</label>
        <select id="Version" name="version" class="form-control" required>
        <option></option>						
		<?php
		while ($row=mysqli_fetch_array($result)) { 
		?>
		<option value='<?php echo $row['desc'] ?>'><?php echo $row['desc'] ?></option>												
		<?php } ?>										
        </select>
        </div>		
		<button type="submit" class="btn btn-primary">Submit</button>
		<button type="reset" class="btn btn-default">Reset</button>
		<text>Or      </text>
		<a href="doc_list.php"><button type="button" class="btn btn-">Go back</button></a><br>                 			
		</form>
		</div>
        </div>
		</div>
</div>
</div>
</div>
</form>
<script>
function submitform() {
  var f = document.getElementsByTagName('form')[0];
  if(f.checkValidity()) {
    f.submit();
  } else {
    alert(document.getElementById('example').validationMessage);
  }
  var e= document.getElementById("isId");
  var strUser = e.options[e.selectedIndex].value;
  
  var strUser = e.option[e.selectedIndex].text; 
  if(strUser==0)
  {
	  alert("Please select")
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