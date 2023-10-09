<?php
// error_reporting(E_ALL);
// ini_set('display_errors',1);

require dirname(__FILE__) . '/vars.php';

use Azuyalabs\WAQI\WAQI;

class DumpsterFires 

{

    private $conn;

    public function __construct($conn) 

    {

        $this->conn = $conn;

    }

    public function getLatestAqi() 

    {
        $query = "SELECT AQI, DATE_FORMAT(CurrentDateTime, '%Y-%m-%d %H:%i:%s') AS LatestDate FROM Aqi ORDER BY CurrentDateTime DESC LIMIT 1";

        $result = $this->conn->query($query);

        $Aqi = $result->fetch_all(MYSQLI_ASSOC);

        $current = new DateTime();

        $older = new DateTime($Aqi[0]['LatestDate']);

        // Here's where we compare the date/time to know if we need to grab a new AQI value
        $interval = $current->diff($older);

        if ($interval->h >= 1 || $interval->days > 0) {
            $AqiReturn = self::addNewAqi();
        } else {
            $AqiReturn = $Aqi[0]['AQI'];
        }

        return $AqiReturn;
    }

    public function addNewAqi() 

    {
        // Get the WAQI value here

        $waqi = new WAQI($_ENV['APIKEY']);

        $waqi->getObservationByStation($_ENV['STATION']);

        $result = $waqi->getAQI();

        $aqi = $result['aqi'];

        // Insert into DB

        $sql = "INSERT INTO Aqi (AQI) VALUES (" . $aqi .  ")";

        $dbresult = $this->conn->query($sql);

        if ($dbresult == TRUE) {
            $AqiResult = $aqi;
        } else {
            $AqiResult = 0;
        }

        return $AqiResult;
    }
}

?>
