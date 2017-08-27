<?php
// Connect to the database
include 'include/connect.php';

if(!empty($_GET['status'])){
	switch($_GET['status']){
		case 'succ':
		$statusMsgClass = 'alert-success';
		$statusMsg = '<b>Done!</b> Data inserted successfully.';
		break;
		case 'err':
		$statusMsgClass = 'alert-danger';
		$statusMsg = 'Some problem occurred, please try again.';
		break;
		case 'invalid_file':
		$statusMsgClass = 'alert-danger';
		$statusMsg = '<b>Warning!</b> Please upload a valid CSV file.';
		break;
		default:
		$statusMsgClass = '';
		$statusMsg = '';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/bootstrap-style.css">
	<link rel="stylesheet" href="assets/css/font-awesome.css">

</head>
<body>
	<!-- Navigation menubar -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">
					<i class="fa fa-sitemap" aria-hidden="true"></i><span class="title">Catalogue structure</span>
				</a>
			</div>
			<!-- Sitemap -->
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="index.php">Upload</a></li>
					<li><a href="view.php">View</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Content -->
	<div class="container">
		<br>
		<br>
		<br>
		<br>
		<!-- Select file section -->
		<div class="file">
			<i class="fa fa-upload" aria-hidden="true"></i>&nbsp;&nbsp;File Upload 
		</div>
		<p class="comment">csv file format only</p>
		<br>
		<div class="row">
			<div class="col-sm-8">
				<form class="form-inline" action="process.php" method="post" enctype="multipart/form-data" id="importFrm">
					<div class="form-group">
						<div class="input-group">
							<label class="input-group-btn">
								<span class="btn btn-default btn-sm">Browse...
									<input type="file" name="file" style="display: none;">
								</span>
							</label>
							<input type="text" class="form-control input-sm" readonly>
						</div>
					</div>
					<button type="submit" class="btn btn-default btn-sm" name="importSubmit">Upload</button>
				</form>
			</div>
		</div>  
		<br>
		<br>
		<!-- Database table section -->
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">Database content</div>
					<div class="panel-body">
						<table class="table table-condensed table-hover">
							<thead>
								<tr>
									<th class="hdr">id</th>
									<th class="hdr">label</th>
									<!-- <th class="hdr">hash</th> -->
								</tr>
							</thead>
							<tbody>
								<?php
// Get content from database
$query = $conn->query("SELECT * FROM content ORDER BY id ASC");   //table aanpassen
if($query->num_rows > 0){ 
	while($row = $query->fetch_assoc()){
		?>
		<tr>
			<td class="col-md-1 id"><?php echo $row['id']; ?></td>
			<td class="col-md-4 name"><?php echo $row['text']; ?></td>
		</tr>
		<?php } }else{ ?>
		<tr><td colspan="5">No database entries found...</td></tr>
		<?php } ?>
	</tbody>
</table>
</div>
</div>
</div>
</div>    
<!-- Clear table content -->
<form class="form-inline" action="include/flush.php" method="post">
	<button class="btn btn-flush btn-sm" type="submit">Flush table</button>
</form>  
<br>
<br>
<?php 
if(!empty($statusMsg)) { 
	echo '<div class="alert alert-dismissible '.$statusMsgClass.'">'.$statusMsg.'';
	echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>';
	echo '</div>'; 
} ?>
</div>

<!-- javascript libraries -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/input.js"></script>
<script src="assets/js/bootstrap.js"></script>

</body>
</html>