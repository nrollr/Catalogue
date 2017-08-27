<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/bootstrap-style.css">
	<link rel="stylesheet" href="assets/css/bootstrap-treeview.css">
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
					<li><a href="index.php">Upload</a></li>
					<li class="active"><a href="view.php">View</a></li>
				</ul>
			</div> 
		</div>
	</nav>
	<br>
	<br>
	<br>
	<br>
	<br>
	<!-- Content -->
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<br>
				<!-- Search -->
				<div class="form-group">
					<label for="input-search" class="sr-only">Search Tree:</label>
					<input type="input" class="form-control input-sm" id="input-search" placeholder="Type to search..." value="">
					<input class="hidden" id="chk-ignore-case" value="false" checked>
					<input class="hidden" id="chk-reveal-results" value="false" checked>
				</div>
				<button type="button" class="btn btn-default btn-sm" id="btn-search">Search</button>
				<button type="button" class="btn btn-clear btn-sm" id="btn-clear-search">Clear</button>
			</div>
			<!-- Treeview -->
			<div class="col-sm-6">
				<br>
				<div id="treeview-searchable" class=""></div>
			</div>
		</div>
	</div>

	<!-- javascript libraries -->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.js"></script>

	<script src="assets/js/bootstrap-treeview.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var treeData;
			$.ajax({
				type: "GET",  
				url: "fetch.php",
				dataType: "json",       
				success: function(response)  
				{
					initTree(response)
				}   
			});
			function initTree(treeData) {
				var $searchableTree = $('#treeview-searchable').treeview({
					levels: 2, 
					data: treeData
				});

				var search = function(e) {
					var pattern = $('#input-search').val();
					var options = {
						ignoreCase: $('#chk-ignore-case').is(':checked'),
						exactMatch: $('#chk-exact-match').is(':checked'),
						revealResults: $('#chk-reveal-results').is(':checked')
					};

					var results = $searchableTree.treeview('search', [ pattern, options ]);
					var output = '<p>' + results.length + ' matches found</p>';
					$.each(results, function (index, result) {
						output += '<p>- ' + result.text + '</p>';
					});
					$('#search-output').html(output);
				}
				$('#btn-search').on('click', search);
				$('#input-search').on('keyup', search);
				$('#btn-clear-search').on('click', function (e) {
					$searchableTree.treeview('clearSearch');
					$('#input-search').val('');
					$('#search-output').html('');
				});
			}
		});
	</script>

</body>
</html>





