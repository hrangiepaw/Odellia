
<?php
// Retrieve the search query
$searchQuery = $_GET['search'];

// Establish a database connection (replace with your own database credentials)
include('connection.php');

$conn = new mysqli($condb);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL query to retrieve cheaper albums based on the search query
$stmt = $conn->prepare("SELECT * FROM album WHERE harga < (SELECT harga FROM album WHERE name = ?)");
$stmt->bind_param("s", $searchQuery);
$stmt->execute();

// Fetch the results and generate HTML markup for the album suggestions
$result = $stmt->get_result();
$html = "";
while ($row = $result->fetch_assoc()) {
    $html .= "<p>" . $row['nama_album'] . "</p>";
}

// Close the database connection
$stmt->close();
$conn->close();

// Return the album suggestions as the response
echo $html;
?>
