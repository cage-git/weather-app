# Laravel Project

This is a Laravel project that provides a robust and scalable framework for building web applications.

## Table of Contents

* [Introduction](#introduction)
* [Features](#features)
* [Requirements](#requirements)
* [Installation](#installation)
* [Usage](#usage)
* [Contributing](#contributing)
* [License](#license)

## Introduction

This project is built using Laravel, a popular PHP framework that provides a robust set of tools and libraries for building web applications.

## Features

* This is a Laravel project based on Open weather api, which enables users to get current weather information for any location and save it inside the database.
* The project also provides a form to store the weather information in the database.
* The project also provides a page to view the stored weather information.
* The project does not feature api for getting weather data from a certain date range because the api does not allow it and demands subscription, to get those data we need to pay the price.

## Requirements

* PHP 8.2 or higher
* Laravel 11.31 or higher
* Composer

## Installation

1. Clone the repository using Git: `git clone https://github.com/cage-git/weather-app.git`
2. Install the dependencies using Composer: `composer install`
3. Make an api key for open weather api with rapid api and store it in .env 
4. Login to https://rapidapi.com/hub to signin and get your api key for OpenWeather Api
5. Create a db in your phpmyadmin and mention it in the .env file
6. Run the migrations: `php artisan migrate`
7. Start the development server: `php artisan serve`

## Usage

1. Go to http://localhost:8000/index
2. Enter a city name in the input field
3. Click the "Get Weather" button
4. The current weather information for the entered city will be displayed
5. Click the "Get Stored Data" button to view the stored weather information
6. Click the "Go to Weather Form" button to return to the weather form


## Contributing

Contributions are welcome! If you'd like to contribute to this project, please fork the repository and submit a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE file](LICENSE) for more information.