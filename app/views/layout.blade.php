<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>H-ART Makers Voting</title>
	<link rel="stylesheet" type="text/css" href="/css/ionic.css">
</head>
<body>
	<div class="bar bar-header bar-light">
		<h1 class="title">Kickoff 2013</h1>
	</div>

	@if (count($errors))
		<div class="bar bar-subheader bar-energized">
			<h2 class="title">You must select one project!</h2>
		</div>
	@else
		<div class="bar bar-subheader">
			<h2 class="title">Makers voting</h2>
		</div>
	@endif

	@yield('content')
</body>
</html>