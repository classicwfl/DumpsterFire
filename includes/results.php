<?php

require dirname(__FILE__) . '/vars.php';

class DumpsterFires 

{

    private $conn;

    public function __construct($conn) 

    {

        $this->conn = $conn;

    }

    public function getLatestAqi() 

    {

        // $query = "SELECT from where";

        // $result = $this->conn->query($query);

        // $Aqi = $result->fetch_all(MYSQLI_ASSOC);

        // return $Aqi;

    }

    public function addNewAqi() 

    {
        $googleAqiUrl = 'https://airquality.googleapis.com/v1/currentConditions:lookup?key=' . $_ENV['APIKEY'];
        $googleAqiQuery = [
            "location" => [
                "latitude" => 39.935490,
                "longitude" => -91.408241
            ],
            "extra_computations" => [
                "POLLUTANT_CONCENTRATION"
            ]
        ];

        $AqiQueryOpts = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($googleAqiQuery),
            ],
        ];

        $context = stream_context_create($AqiQueryOpts);
        $result = file_get_contents($googleAqiUrl, false, $context);

        if ($result === false) {
            /* Handle error */
            return "No results";
        }

        // Need to fetch latest AQI from API
        // POST https://airquality.googleapis.com/v1/currentConditions:lookup?key="$_ENV['APIKEY']"

        /*
        "location": {
            "latitude": 39.935490,
            "longitude": -91.408241
        },
        "extra_computations": [
            "POLLUTANT_CONCENTRATION",
        ],
        */

        // Insert into DB

        return json_decode($result);
    }

}

?>
