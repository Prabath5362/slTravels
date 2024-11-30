<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "bus_timetable";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id,departure_city,arrival_city,DATE_FORMAT(departure_time,'%H:%i') AS formatted_departure_time,DATE_FORMAT(arrival_time,'%H:%i') AS formatted_arrival_time,route From bus_schedule";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['departure_city']}</td>
                <td>{$row['arrival_city']}</td>
                <td>{$row['formatted_departure_time']}</td>
                <td>{$row['formatted_arrival_time']}</td>
                <td>{$row['route']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5' class='text-center'>No schedules available</td></tr>";
}

$conn->close();

?>
