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
                <tr><th>Nationality</th><th>Student Count</th></tr>
            </thead>
            <tbody>
                <?php
                // Loop through the records and display them in the table
                foreach ($result['records'] as $record):
                    // Adjust the keys if needed based on the JSON structure
                    $nationality = isset($record['fields']['nationality']) ? $record['fields']['nationality'] : 'N/A';
                    $student_count = isset($record['fields']['student_count']) ? $record['fields']['student_count'] : 'N/A';
                    echo "<tr><td>$nationality</td><td>$student_count</td></tr>";
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

