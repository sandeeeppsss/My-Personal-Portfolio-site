<?php
$apiKey = "442acd5dfd02b656415de8b85ec7384f";
$city = "Puducherry"; // Replace with your actual city
$apiUrl = "https://api.openweathermap.org/data/2.5/weather?q={$city}&units=metric&appid={$apiKey}";

$response = @file_get_contents($apiUrl); // Suppress warnings and handle errors manually
if ($response === FALSE) {
    // Handle the error
    echo "Error: Unable to retrieve weather data. Please check the city name and API key.";
} else {
    $weatherData = json_decode($response, true);
    
    // Check if the required keys exist in the response data
    if (isset($weatherData['main']['temp'])) {
        $temperature = $weatherData['main']['temp'];
        echo "Puducherry: " . $temperature . "°C";
    } else {
        echo "Error: Unable to fetch weather details";
    }
}
?>
