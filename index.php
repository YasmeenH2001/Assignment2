<?php
// Include the fetch_data.php file to get the student data
include('fetch_data.php');
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
                    // Adjust the keys if needed based on the JSON structure
                    $year = isset($record['fields']['Year']) ? $record['fields']['Year'] : 'N/A';
                    $semester = isset($record['fields']['Semester']) ? $record['fields']['Semester'] : 'N/A';
                    $programs = isset($record['fields']['The Programs']) ? $record['fields']['The Programs'] : 'N/A';
                    $nationality = isset($record['fields']['Nationality']) ? $record['fields']['Nationality'] : 'N/A';
                    $colleges = isset($record['fields']['Colleges']) ? $record['fields']['Colleges'] : 'N/A';
                    $studentCount = isset($record['fields']['Number of Student:']) ? $record['fields']['Number of Student:'] : 'N/A';
                    echo "<tr>
                            <td>$year</td>
                            <td>$semester</td>
                            <td>$ programs</td>
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