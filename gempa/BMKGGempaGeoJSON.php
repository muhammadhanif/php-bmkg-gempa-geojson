<?php

class BMKGGempaGeoJSON
{
    // creator
    private $_name;
    private $_homepage;
    private $_telegram;
    private $_github;

    // bmkg
    private $_bmkg;

    public function __construct()
    {
        // creator
        $this->_name           = "Muhammad Hanif";
        $this->_homepage       = "https://hanifmu.com";
        $this->_telegram       = "https://t.me/hanifmu";
        $this->_source_code    = "https://github.com/muhammadhanif/php-bmkg-gempa-geojson.git";

        // bmkg
        $this->_bmkg           = "BMKG (Badan Meteorologi, Klimatologi, dan Geofisika)";
    }

    public function getGempaTerkini()
    {
        $url    = 'https://data.bmkg.go.id/DataMKG/TEWS/autogempa.xml';
        $data   = 'Gempa Bumi Terkini';

        $bmkg   = $this->_data($url);

        // creator
        $result['creator']['name']          = $this->_name;
        $result['creator']['homepage']      = $this->_homepage;
        $result['creator']['telegram']      = $this->_telegram;
        $result['creator']['source_code']   = $this->_source_code;

        // BMKG
        $result['data_source']['institution']   = $this->_bmkg;
        $result['data_source']['data']          = $data;
        $result['data_source']['url']           = $url;

        // geojson
        $result['type']     = 'FeatureCollection';
        $result['features'] = array();

        if ($bmkg['success']) {
            // success
            $result['success'] = true;

            // type
            $result['features'][0]['type'] = 'Feature';

            //properties
            $result['features'][0]['properties']['tanggal']     = $bmkg['data']['gempa']['Tanggal'];
            $result['features'][0]['properties']['jam']         = $bmkg['data']['gempa']['Jam'];
            $result['features'][0]['properties']['lintang']     = $bmkg['data']['gempa']['Lintang'];
            $result['features'][0]['properties']['bujur']       = $bmkg['data']['gempa']['Bujur'];
            $result['features'][0]['properties']['magnitude']   = $bmkg['data']['gempa']['Magnitude'];
            $result['features'][0]['properties']['kedalaman']   = $bmkg['data']['gempa']['Kedalaman'];
            $result['features'][0]['properties']['wilayah']     = $bmkg['data']['gempa']['Wilayah'];
            $result['features'][0]['properties']['potensi']     = $bmkg['data']['gempa']['Potensi'];
            $result['features'][0]['properties']['shakemap']     = "https://data.bmkg.go.id/DataMKG/TEWS/" . $bmkg['data']['gempa']['Shakemap'];

            // geometry
            $coordinates = explode(',', $bmkg['data']['gempa']['point']['coordinates']);

            $result['features'][0]['geometry']['type']          = 'Point';
            $result['features'][0]['geometry']['coordinates']   = [floatval($coordinates[1]), floatval($coordinates[0])];
        } else {
            $result['success'] = false;
        }

        // header
        header('HTTP/1.1 200 OK');
        header('Content-Type: application/json');

        return json_encode($result);
    }

    public function getGempaM5()
    {
        $url    = 'https://data.bmkg.go.id/DataMKG/TEWS/gempaterkini.xml';
        $data   = 'Daftar 15 Gempa Bumi M 5.0+';

        $bmkg   = $this->_data($url);

        // creator
        $result['creator']['name']          = $this->_name;
        $result['creator']['homepage']      = $this->_homepage;
        $result['creator']['telegram']      = $this->_telegram;
        $result['creator']['source_code']   = $this->_source_code;

        // BMKG
        $result['data_source']['institution']   = $this->_bmkg;
        $result['data_source']['data']          = $data;
        $result['data_source']['url']           = $url;

        // geojson
        $result['type']     = 'FeatureCollection';
        $result['features'] = array();

        if ($bmkg['success']) {
            // success
            $result['success'] = true;

            for ($i = 0; $i < count($bmkg['data']['gempa']); $i++) {
                // type
                $gempa['type'] = 'Feature';

                //properties
                $gempa['properties']['tanggal']     = $bmkg['data']['gempa'][$i]['Tanggal'];
                $gempa['properties']['jam']         = $bmkg['data']['gempa'][$i]['Jam'];
                $gempa['properties']['lintang']     = $bmkg['data']['gempa'][$i]['Lintang'];
                $gempa['properties']['bujur']       = $bmkg['data']['gempa'][$i]['Bujur'];
                $gempa['properties']['magnitude']   = $bmkg['data']['gempa'][$i]['Magnitude'];
                $gempa['properties']['kedalaman']   = $bmkg['data']['gempa'][$i]['Kedalaman'];
                $gempa['properties']['wilayah']     = $bmkg['data']['gempa'][$i]['Wilayah'];

                // geometry
                $coordinates = explode(',', $bmkg['data']['gempa'][$i]['point']['coordinates']);

                $gempa['geometry']['type']          = 'Point';
                $gempa['geometry']['coordinates']   = [floatval($coordinates[1]), floatval($coordinates[0])];

                // tambahkan ke array $result['features']
                array_push($result['features'], $gempa);
            }
        } else {
            $result['success'] = false;
        }

        // header
        header('HTTP/1.1 200 OK');
        header('Content-Type: application/json');

        return json_encode($result);
    }

    public function getGempaDirasakan()
    {
        $url    = 'https://data.bmkg.go.id/DataMKG/TEWS/gempadirasakan.xml';
        $data   = 'Daftar 15 Gempa Bumi Dirasakan';

        $bmkg   = $this->_data($url);

        // creator
        $result['creator']['name']          = $this->_name;
        $result['creator']['homepage']      = $this->_homepage;
        $result['creator']['telegram']      = $this->_telegram;
        $result['creator']['source_code']   = $this->_source_code;

        // BMKG
        $result['data_source']['institution']   = $this->_bmkg;
        $result['data_source']['data']          = $data;
        $result['data_source']['url']           = $url;

        // geojson
        $result['type']     = 'FeatureCollection';
        $result['features'] = array();

        if ($bmkg['success']) {
            // success
            $result['success'] = true;

            for ($i = 0; $i < count($bmkg['data']['gempa']); $i++) {
                // type
                $gempa['type'] = 'Feature';

                //properties
                $gempa['properties']['tanggal']     = $bmkg['data']['gempa'][$i]['Tanggal'];
                $gempa['properties']['jam']         = $bmkg['data']['gempa'][$i]['Jam'];
                $gempa['properties']['lintang']     = $bmkg['data']['gempa'][$i]['Lintang'];
                $gempa['properties']['bujur']       = $bmkg['data']['gempa'][$i]['Bujur'];
                $gempa['properties']['magnitude']   = $bmkg['data']['gempa'][$i]['Magnitude'];
                $gempa['properties']['kedalaman']   = $bmkg['data']['gempa'][$i]['Kedalaman'];
                $gempa['properties']['dirasakan']   = $bmkg['data']['gempa'][$i]['Dirasakan'];
                $gempa['properties']['wilayah']   = $bmkg['data']['gempa'][$i]['Wilayah'];

                // geometry
                $coordinates = explode(',', $bmkg['data']['gempa'][$i]['point']['coordinates']);

                $gempa['geometry']['type']          = 'Point';
                $gempa['geometry']['coordinates']   = [floatval($coordinates[1]), floatval($coordinates[0])];

                // tambahkan ke array $result['features']
                array_push($result['features'], $gempa);
            }
        } else {
            $result['success'] = false;
        }


        // header
        header('HTTP/1.1 200 OK');
        header('Content-Type: application/json');

        return json_encode($result);
    }

    private function _curl($url)
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        return curl_exec($ch);

        curl_close($ch);
    }

    private function _data($url)
    {
        $curl  = $this->_curl($url);

        $result['data']     = array();

        // validation
        if (strpos($curl, "html") or $curl === false) {
            // error
            $result['success']  = false;
        } else {
            // success
            $result['success']  = true;
            $result['data']     = json_decode(json_encode(simplexml_load_string($curl)), TRUE);
        }

        return $result;
    }
}
