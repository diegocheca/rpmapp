<!DOCTYPE html>
<html>
<head>
	<title>User list - PDF</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<a href="{{ route('generate-pdf',['download'=>'pdf']) }}">Download PDF</a>
	<table class="table table-bordered">
		<thead>
			<th>Name</th>
			<th>Email</th>
		</thead>
		<tbody>
		

			<tr>
				<td>"juan"</td>
				<td>juan@gmail.com</td>
			</tr>

			<tr>
				<td>juliana</td>
				<td>juliana@gmail.com</td>
			</tr>
		</tbody>
	</table>
</div>
</body>
</html>