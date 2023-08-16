<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta tags for proper rendering and touch zooming -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Link to the external CSS stylesheet -->
  <link rel="stylesheet" href="styles.css">
  <!-- Title of the web page -->
  <title>Weather App</title>
</head>
<body>
    <!-- Main container for the content -->
    <div class="container">
        <!-- Page title -->
        <h1> Search Current Global Weather </h1>
        <!-- Start of form, it uses GET method -->
        <form action="" method="GET">
            <!-- Label and input field for city name -->
            <label for="city">Enter City Name</label>
            <p><input type="text" name="city" id="city" placeholder="Tokyo"></p>
            <!-- Search button -->
            <button type="submit" name="submit" class="btn btn-success">Search</button>
            <!-- Placeholder for the output -->
            <div class="output"></div>
            
            <?php 
            // Initializing error and weather message
            $error = ""; 
            $weather = ""; 
            
            // Check if the form has been submitted
            if(array_key_exists('submit', $_GET)){
                // Check if the city input is empty
                if (!$_GET['city']) {
                    $error = "Sorry, Your Input Was Left Blank";
                }
                if ($_GET['city']){
                    // Get the API data, suppress warnings using '@'
                    $apiData = @file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&appid=14748306ad839a185ba134c15cba3e79");
                    
                    // Check if API call was successful
                    if ($apiData === FALSE) {
                        $error = "Invalid City Name, or API Call Failure";
                    } else {
                        $weatherArray = json_decode($apiData, true);
                        
                        // Check if the API response is valid
                        if ($weatherArray['cod'] == 200){
                            // Convert temperature to Celsius
                            $tempCelsius = $weatherArray['main']['temp'] - 273.15;
                            // Prepare and format the weather information to display

                            // City, Country and Temperature in Celsius
                            $weather = "<p>".$weatherArray['name'].", ".$weatherArray['sys']['country'].": ".intval($tempCelsius)."&deg;C</p>";

                            // Weather Conditions
                            $weather .= "<p>Weather Condition: " .$weatherArray['weather']['0']['description']."</p>";  
                            
                            // Atmosperic Pressure
                            $weather .="<p>Atmosperic Pressure : " .$weatherArray['main']['pressure']. "hPa </p>";

                            // Wind Speed
                            $weather .="<p>Wind Speed: " .$weatherArray['wind']['speed']. "meter/sec </p>";

                            // Cloudiness
                            $weather .="<p>Cloudiness: " .$weatherArray['clouds']['all']. "% </p>";

                            // Handle the sunrise time and timezone
                            $sunrise = $weatherArray['sys']['sunrise'];
                            $timezone = $weatherArray['timezone'];

                            // Create and configure DateTime objects for local time and sunrise time
                            $localTime = new DateTime('now');
                            $timezoneObject = new DateTimeZone("Etc/GMT" . ($timezone > 0 ? '-' : '+') . abs($timezone/3600));
                            $localTime->setTimezone($timezoneObject);
                            $sunriseTime = new DateTime('@' . $sunrise);
                            $sunriseTime->setTimezone($timezoneObject);

                            // Append the local sunrise time and current local time of the city to the weather info
                            $weather .= "<p>Local Sunrise: " . $sunriseTime->format("g:i a") . "</p>";
                            $weather .= "<p>Current Local Time: " . $localTime->format("g:i a") . "</p>";

                        } else {
                            $error = "City name not valid";
                        } 
                    }
                }
            }
            // Display the weather data if available
            if($weather) {
                echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
            }
            // Display an error message if there is an error
            if ($error) {
                echo '<div class="alert alert-failure" role="alert">' . $error . '</div>';
            }
            ?>
        </form>
    </div>
  </body>
</html>
