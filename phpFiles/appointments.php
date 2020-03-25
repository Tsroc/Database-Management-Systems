<?php
//Send utf-8 header before any output
header('Content-Type: text/html; charset=utf-8'); 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Appointments</title>
	</head>	
    
	<body>
		<h4>APPOINTMENTS</h4>
			
		<table border="1">
			<tr>
				<td><h2>ID</h2></td>
				<td><h2>NAME</h2></td>
				<td><h2>TIME</h2></td>			
				<td><h2>DATE</h2></td>
				<td><h2>DETAILS</h2></td>
				<td><h2>SPECIALIST</h2></td>
				<td><h2>BILL </h2></td>	
				<td><h2>PAID</h2></td>					
				<td><h2>REMAINING</h2></td>	
				<td><h2>REMINDER SENT</h2></td>	
			</tr>

			<?php			
				$host = "localhost";
				$host1 = "http://localhost";
				$user = "root";
				$password = "";
				$database = "Dentist";				
				
				$query = "select a.id, p.name, a.time, a.date, t.details, IF(s.id=0, '', s.name) as specialist, b.total_due, b.total_paid, (b.total_due-b.total_paid)as bill_remaining, IF(a.reminder_sent=0, 'NO', 'YES') as reminder from appointment a INNER JOIN patient p ON p.id = a.patient_id INNER JOIN treatment t ON t.patient_id = a.patient_id INNER JOIN bill b ON b.treatment_id = t.id LEFT JOIN specialist s ON s.id = a.specialist_id ORDER BY a.id ASC";
				$connect = mysqli_connect($host,$user,$password,$database) or die("Problem connecting.");
				
				mysqli_query($connect,"SET NAMES utf8");
				$result = mysqli_query($connect,$query) or die("Bad Query.");
				mysqli_close($connect);

				while($row = $result->fetch_array()){				
					echo "<tr>";
					echo "<td><h4>" .$row['id'] . "</h4></td>";
					echo "<td><h4>" .$row['name'] . "</h4></td>";
					echo "<td><h4>" .$row['time'] . "</h4></td>";
					echo "<td><h4>" .$row['date'] . "</h4></td>";
					echo "<td><h4>" .$row['details'] . "</h4></td>";
					echo "<td><h4>" .$row['specialist'] . "</h4></td>";
					echo "<td><h4>" .$row['total_due'] . "</h4></td>";		
					echo "<td><h4>" .$row['total_paid'] . "</h4></td>";		
					echo "<td><h4>" .$row['bill_remaining'] . "</h4></td>";
					echo "<td><h4>" .$row['reminder'] . "</h4></td>";
				}
			?>

		<table>
	</body>
</html>