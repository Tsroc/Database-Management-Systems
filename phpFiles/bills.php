<?php
//Send utf-8 header before any output
header('Content-Type: text/html; charset=utf-8'); 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Bill</title>
		
	</head>	

	<body>
		<h4>BILL</h4>
	
		<table border="1">
			
			<tr>
				<td><h2>ID</h2></td>
				<td><h2>NAME</h2></td>
				<td><h2>DUE</h2></td>
				<td><h2>PAID</h2></td>
			</tr>

			<?php			
				$host = "localhost";
				$host1 = "http://localhost";
				$user = "root";
				$password = "";
				$database = "Dentist";				
				
				$query = "Select b.id, p.name, b.total_due, b.total_paid from bill b INNER JOIN treatment t ON b.treatment_id = t.id INNER JOIN patient p ON t.patient_id = p.id ORDER BY b.id ASC";
				$connect = mysqli_connect($host,$user,$password,$database) or die("Problem connecting.");

				mysqli_query($connect,"SET NAMES utf8");
				$result = mysqli_query($connect,$query) or die("Bad Query.");
				mysqli_close($connect);

				while($row = $result->fetch_array()){
					echo "<tr>";
					echo "<td><h4>" .$row['id'] . "</h4></td>";
					echo "<td><h4>" .$row['name'] . "</h4></td>";
					echo "<td><h4>" .$row['total_due'] . "</h4></td>";
					echo "<td><h4>" .$row['total_paid'] . "</h4></td>";
				    echo "</tr>";
				}
			?>

		<table>
	</body>
</html>