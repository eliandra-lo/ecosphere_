<?php
// Set response type to JSON
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'ecosphere'; 
$username = 'root';
$password = '';

// Establish database connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check for connection errors
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

// Query to fetch species data with locations
$sql = "
    SELECT 
        species.common_name, 
        species.scientific_name, 
        species.conservation_status, 
        species.habitat, 
        species.primary_threat, 
        locations.latitude, 
        locations.longitude 
    FROM species
    JOIN locations ON species.id = locations.species_id
";

// Execute the query
$result = $conn->query($sql);

// Check query result
if (!$result) {
    http_response_code(500);
    echo json_encode(['error' => 'Query execution failed: ' . $conn->error]);
    $conn->close();
    exit;
}

// Prepare data for JSON response
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close the connection
$conn->close();

// Return the JSON response
echo json_encode($data, JSON_PRETTY_PRINT);
?>
