<?php
//Send utf-8 header before any output
header('Content-Type: text/html; charset=utf-8'); 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Treatment</title>
	</head>	

	<body>
		<h4>TREATMENT</h4>
	
		<table border="1">
			<tr>
				<td><h2>ID</h2></td>
				<td><h2>NAME</h2></td>
				<td><h2>DETAILS</h2></td>
				<td><h2>XRAY PHP</h2></td>
				<td><h2>XRAY PATH</h2></td>
			</tr>

			<?php			
				$host = "localhost";
				$host1 = "http://localhost";
				$user = "root";
				$password = "";
				$database = "Dentist";				
				
				$query = "Select t.id, p.name, t.details, t.xray, t.xray_path from treatment t INNER JOIN patient p ON t.patient_id = p.id";
				$connect = mysqli_connect($host,$user,$password,$database) or die("Problem connecting.");
				
				mysqli_query($connect,"SET NAMES utf8");
				$result = mysqli_query($connect,$query) or die("Bad Query.");
				mysqli_close($connect);

				while($row = $result->fetch_array()){
					echo "<tr>";
					echo "<td><h4>" .$row['id'] . "</h4></td>";
					echo "<td><h4>" .$row['name'] . "</h4></td>";
					echo "<td><h4>" .$row['details'] . "</h4></td>";
					echo "<td><h4><img src=image_blobs.php?id=".$row['id']." width=200 height=150/></h4></td>";
					echo "<td><h4><img src=".$host1.$row['xray_path'] . " width=80 height=80/></h4></td>";
				    echo "</tr>";
				}
			?>

		<table>
	</body>
</html>