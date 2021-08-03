<html>
 <title>Database</title>
  <body>

<?php
        define('HOST', 'localhost:3307');
		define('USERNAME', 'root');
		define('PASSWORD', '');
		define('DB', 'qr');

		$con = mysqli_connect(HOST, USERNAME, PASSWORD, DB);




// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM form");

echo "<table border='1'>
<tr>
<th>Name</th>
<th>Details_Field</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['Detail'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
</body>
</html>