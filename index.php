<?php
// Database connection details
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "your_db_name";

// Create connection
$conn = new mysqli($servername, $username, $password , $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT Year, Semester, `The Programs`, Nationality, Colleges, `Number of Student:` FROM students";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    $records = [];
    while($row = $result->fetch_assoc()) {
        $records[] = $row;
    }
    $result = ['records' => $records];
} else {
    $result = ['records' => []];
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UOB Student Nationalities</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/picocss@1.6.3/dist/pico.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Link to custom stylesheet -->
</head>
<body>
    <div class="container">
        <h1>University of Bahrain Student Nationalities</h1>
        
        <?php
        // Check if the result data exists and is an array
        if (isset($result['records']) && is_array($result['records'])):
        ?>
        
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>The Programs</th>
                    <th>Nationality</th>
                    <th>Colleges</th>
                    <th>Number of Students</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through the records and display them in the table
                foreach ($result['records'] as $record):
                    $year = isset($record['Year']) ? $record['Year'] : 'N/A';
                    $semester = isset($record['Semester']) ? $record['Semester'] : 'N/A';
                    $programs = isset($record['The Programs']) ? $record['The Programs'] : 'N/A';
                    $nationality = isset($record['Nationality']) ? $record['Nationality'] : 'N/A';
                    $colleges = isset($record['Colleges']) ? $record['Colleges'] : 'N/A';
                    $studentCount = isset($record['Number of Student:']) ? $record['Number of Student:'] : 'N/A';
                    echo "<tr>
                            <td>$year</td>
                            <td>$semester</td>
                            <td>$programs</td>
                            <td>$nationality</td>
                            <td>$colleges</td>
                            <td>$studentCount</td>
                          </tr>";
                endforeach;
                ?>
            </tbody>
        </table>

        <?php
        else:
            echo '<p>No data available or error fetching data.</p>';
        endif;
        ?>
    </div>
</body>
</html>