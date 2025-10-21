<?php
if (isset($_GET['city'])) {
    $city = urlencode($_GET['city']); // Εξασφάλιση σωστής κωδικοποίησης για τη διεύθυνση URL
    $endpoint = "https://www.metaweather.com/api/location/search/?query={$city}";

    // Κλήση στο API
    $response = file_get_contents($endpoint);
    if ($response === FALSE) {
        echo "Σφάλμα κατά την ανάκτηση των δεδομένων.";
        exit;
    }

    $locations = json_decode($response, true); // Μετατροπή JSON σε PHP array
    if (empty($locations)) {
        echo "Η πόλη δεν βρέθηκε!";
        exit;
    }
    $woeid = $locations[0]['woeid'];
    $weatherEndpoint = "https://www.metaweather.com/api/location/{$woeid}/";

    $weatherResponse = file_get_contents($weatherEndpoint);
    if ($weatherResponse === FALSE) {
        echo "Σφάλμα κατά την ανάκτηση δεδομένων καιρο
        exit;
    }

    $weatherData = json_decode($weatherResponse, true);
    $todayWeather = $weatherData['consolidated_weather'][0]; // Καιρός για σήμερα

    // Εμφάνιση αποτελεσμάτων
    echo "<h2>Καιρός για: {$weatherData['title']}</h2>";
    echo "<p>Ημερομηνία: {$todayWeather['applicable_date']}</p>";
    echo "<p>Κατάσταση: {$todayWeather['weather_state_name']}</p>";
    echo "<p>Θερμοκρασία: " . round($todayWeather['the_temp'], 1) . "°C</p>";
    echo "<p>Υγρασία: {$todayWeather['humidity']}%</p>";
}
?>
