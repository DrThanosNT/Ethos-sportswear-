<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Καιρός</title>
</head>
<body>
  <h1>Εύρεση Καιρού</h1>
  
  
  <form method="GET" action="">
  
    <label for="latitude">Latitude:</label>
    
    <input type="text" id="latitude" name="latitude" placeholder="Enter latitude" >
    <label for="longitude">Longitude:</label>
    <input type="text" id="longitude" name="longitude" placeholder="Enter longitude" >
    <button type="submit">Αναζήτηση</button>
  </form>
  
  <div>
    <?php
    
    
    
    
    if (isset($_GET['latitude']) != null && isset($_GET['longitude'])) {
        $latitude = urlencode($_GET['latitude']);   
        $longitude = urlencode($_GET['longitude']);
        
       
        $endpoint = "https://api.open-meteo.com/v1/forecast?latitude={$latitude}&longitude={$longitude}&hourly=temperature_2m";

        
        $response = @file_get_contents($endpoint);

        if ($response === FALSE) {
            echo "<p>Σφάλμα κατά την ανάκτηση των δεδομένων.</p>";
            exit;
        }

        $data = json_decode($response, true); 

       
        if (isset($data['hourly']['temperature_2m'])) {
            echo "<h2>Hourly Temperatures:</h2>";
            foreach ($data['hourly']['temperature_2m'] as $hour => $temperature) {
                echo "<p>Hour {$hour}: {$temperature}°C</p>";
            }
        } else {
            echo "<p>Δεν βρέθηκαν δεδομένα θερμοκρασίας.</p>";
        }
    }
    ?>
  </div>
</body>
</html>
