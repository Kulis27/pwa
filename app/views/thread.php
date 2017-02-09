<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PWA</title>

	<!-- CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
	<style>
		body 		{ padding-top:30px; }
		form 		{ padding-bottom:20px; }
		.comment 	{ padding-bottom:20px; }
	</style>

	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->

	<!-- ANGULAR -->
	<!-- all angular resources will be loaded from the /public folder -->
		<script src="__DIR__.’/../js/controllers/mainCtrl.js"></script> <!-- load our controller -->
		<script src="__DIR__.’/../js/services/commentService.js"></script> <!-- load our service -->
		<script src="__DIR__.’/../js/app.js"></script> <!-- load our application -->

</head>
<!-- declare our angular app and controller -->

<body class="container" ng-app="commentApp" ng-controller="mainController">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">PWA</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#">Domů</a></li>
      <li><a href="1">Sport</a></li>
      <li><a href="2">Kultura</a></li>
      <li><a href="3">Finance</a></li>
    </ul>
  </div>
</nav>
<div class="col-md-8 col-md-offset-2">

	<!-- PAGE TITLE -->
	<div class="page-header">
		<h2>Komentáře:</h2>

	</div>

	<!-- NEW COMMENT FORM -->
	<form ng-submit="submitComment()"> <!-- ng-submit will disable the default form action and use our function -->

		<!-- AUTHOR -->
		<div class="form-group">
			<input type="text" class="form-control input-sm" name="author" ng-model="commentData.author" placeholder="Jméno">
		</div>



		<!-- COMMENT TEXT -->
		<div class="form-group">
			<input type="text" class="form-control input-lg" name="comment" ng-model="commentData.text" placeholder="Komentář">
			<input name="thread_id" type="hidden" ng-model="commentData.thread_id" value="2">
		</div>

		<div class="form-group text-right" style="display: none;">	
			{{  commentData.thread_id = 1 }}
		</div>		

		<input type="hidden" class="form-control input-sm" name="thread_id" ng-model="commentData.thread_id">
	
		

		<!-- SUBMIT BUTTON -->
		<div class="form-group text-right">	
			<button type="submit" class="btn btn-primary btn-lg">Submit</button>
		</div>
	</form>


	<!-- LOADING ICON -->
	<!-- show loading icon if the loading variable is set to true -->
	<p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

	<!-- THE COMMENTS -->
	<!-- hide these comments if the loading variable is true -->
	<div class="comment" ng-hide="loading" ng-repeat="comment in comments">
		<h3> {{ comment.author }}</h3>
		<p>{{ comment.text }}</p>

		<p><a href="#" ng-click="deleteComment(comment.id)" class="text-muted">Delete</a></p>
	</div>

</div>
</body>
</html>
