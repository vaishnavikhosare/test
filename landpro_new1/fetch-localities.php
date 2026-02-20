<?php
require 'aconnection.php';

$term = $_GET['term'] ?? '';

$stmt = $conn->prepare("SELECT localityID, localityName FROM localities WHERE localityName LIKE CONCAT('%', ?, '%') ORDER BY localityName ASC LIMIT 20");
$stmt->bind_param("s", $term);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = [
        "localityID" => $row["localityID"],
        "localityName" => $row["localityName"]
    ];
}
echo json_encode($data);

?>