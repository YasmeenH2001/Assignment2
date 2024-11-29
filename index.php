<?php  
 $url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";  
  $response = file_get_contents($url); 
  $data = json_decode($response, true);  
     if(!$data || !isset($data["results"])){    
         die('error fetching the data from API'); } 
         $result = $data["results"]; 
         ?>
          <html> 
        <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">   
              <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"> 
                        

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #6c757d;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        h1 {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>UOB IT Bachelor's Students by Nationality</h1>
    <table>
        <thead>
            <tr> 
                <th>Year</th>
                <th>Semester</th>
                <th>Program</th>
                <th>Nationality</th>
                <th>College</th>
                <th>Number of Students</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($result as $student): ?>
                <tr>
                    <td><?php echo htmlspecialchars($student["year"]); ?></td>
                    <td><?php echo htmlspecialchars($student["semester"]); ?></td>
                    <td><?php echo htmlspecialchars($student["the_programs"]); ?></td>
                    <td><?php echo htmlspecialchars($student["nationality"]); ?></td>
                    <td><?php echo htmlspecialchars($student["colleges"]); ?></td>
                    <td><?php echo htmlspecialchars($student["number_of_students"]); ?></td>
                </tr>
            <?php endforeach; ?> 
        </tbody>
    </table>
</body>
</html>
