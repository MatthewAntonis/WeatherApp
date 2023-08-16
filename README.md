# Weather App
## Introduction

### This Weather App is a simple web application that allows users to enter the name of a city and fetch the current weather conditions for that location. The application is built using PHP, HTML, and CSS.

## Features
- Search by City Name: Users can search for the current weather conditions of a city by entering the name of the city.
- User-friendly Interface: The application has a clean and intuitive design, with a simple input field for the city name, a search button, and a display area for the weather results.
- Detailed Weather Information: Upon a successful search, the application displays detailed information including temperature (in Celsius), weather conditions, atmospheric pressure, wind speed, cloudiness, local sunrise time, and current local time of the city.
- Error Handling: The application handles errors gracefully – if the user enters an invalid city name, or if the API call fails, an error message is displayed to the user.

## How it Works
1. User Input:
  - The user is presented with a form that contains a single input field where they can enter a city name. There is a 'Search' button to submit the form.
2. API Request:
  - When the user submits the form with a city name, a PHP script is triggered which makes a GET request to the OpenWeatherMap API with the user's input as a query parameter.
3. Error Handling:
  - If the user leaves the input field empty, an error message "Sorry, Your Input Was Left Blank" is displayed.
  - If the API response indicates that the city name is invalid, or if the API call fails for some other reason (e.g., network failure, invalid API key), a user-friendly error message is displayed.
4. Parsing and Displaying the API Response:
  - If the API call is successful, the PHP script decodes the JSON response from the API and extracts various pieces of weather information.
  - It then generates HTML to display this information in a human-readable format.
  - This includes converting the temperature from Kelvin to Celsius and formatting the sunrise time and the local time of the city based on the timezone offset provided by the API.
5. Response Display:
  - The formatted weather information (or an error message if applicable) is injected into a div element in the HTML, which is then rendered to the user.
6. Date and Time Handling:
  - The PHP script uses the DateTime and DateTimeZone classes to handle the sunrise time and the local time of the city based on the timezone offset from the API response.

## Prerequisites
- PHP 7.x or higher
- A web server (e.g., Apache, Nginx, Liver Server Extension (VsCode)
- An API Key from OpenWeatherMap

## Setup and Usage
- Clone this repository to your web server.
- Replace YOUR_API_KEY in the PHP script with your actual OpenWeatherMap API key.
- Access the application through your web browser by navigating to the appropriate URL (e.g., http://yourserver/yourpath).

## Screenshot

<p align="center">
<img width="600" src="https://github.com/MatthewAntonis/WeatherApp/assets/122380719/c79d1e6d-ddf8-41a8-8535-c1edb5cfcafb">
<p/>
  
## Notes: 
- Created using Visual Studio Code

### Assignment Due Date: August 18th, 2023
### Mark Received: yet to be graded

