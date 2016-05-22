<!DOCTYPE html>
<html>
<head>
	<script src="jquery.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/bootstrap.min.js"></script>
	<script src="todo.js"></script>
	<title></title>

<style>
.message_success{
	color:green;
}
.pannel-listing {
	width: 100%
}

.pannel-listing h4{
	text-align: center;
	float:left;
	padding: 2px;
	margin: 2px;
}
.pannel-listing a:hover{
	color:red;
}
.pannel-listing a{
	float:right;
	margin-top: 10px;
}
.clear{
	clear: both;
}
.list-group
{
	padding: 0px;
	margin:0px;
}
.list-group-item
{
	padding: 0px;
	margin: 0px;
}


</style>
</head>
<body align="center">
<h1><strong style="text-align: center; font-size: 100px;">Todos</strong></h1>
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
	
			<form method="post" action="add" class="add_form">
				<input type="text" placeholder="type your to do here" name="title" class="form-control">
				
			</form>
		</div>
	</div>

	@yield('content')
	@yield('new_content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="/">All</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			<a href="show_active">Active</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			<a href="show_completed">Completed</a>
		</div>
	</div>
</div>

	
</body>
</html>