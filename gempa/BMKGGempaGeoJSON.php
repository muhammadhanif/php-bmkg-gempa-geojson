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
        $this->_telegram       = "https://t.me/muhammad_hanif";
        $this->_source_code    = "https://github.com/muhammadhanif/codeigniter-bmkg-gempa-geojson";

        // bmkg
        $this->_bmkg           = "BMKG (Badan Meteorologi, Klimatologi, dan Geofisika)";
    }

    public function getGempaM5Terkini()
    {
        $url    = 'https://data.bmkg.go.id/autogempa.xml';
        $type   = 'Gempa M 5.0+ Terkini';

        $bmkg   = $this->_data($url, $type);

        // creator
        $result['creator']['name']          = $this->_name;
        $result['creator']['homepage']      = $this->_homepage;
        $result['creator']['telegram']      = $this->_telegram;
        $result['creator']['source_code']   = $this->_source_code;

        // BMKG
        $result['data_source']['institution']   = $this->_bmkg;
        $result['data_source']['type']          = 'Gempa M 5.0+ Terkini';
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
            $result['features'][0]['properties']['wilayah1']    = $bmkg['data']['gempa']['Wilayah1'];
            $result['features'][0]['properties']['wilayah2']    = $bmkg['data']['gempa']['Wilayah2'];
            $result['features'][0]['properties']['wilayah3']    = $bmkg['data']['gempa']['Wilayah3'];
            $result['features'][0]['properties']['wilayah4']    = $bmkg['data']['gempa']['Wilayah4'];
            $result['features'][0]['properties']['wilayah5']    = $bmkg['data']['gempa']['Wilayah5'];
            $result['features'][0]['properties']['potensi']     = $bmkg['data']['gempa']['Potensi'];
            $result['features'][0]['properties']['peta']        = 'https://data.bmkg.go.id/eqmap.gif';

            // geometry
            $coordinates = explode(',', $bmkg['data']['gempa']['point']['coordinates']);

            $result['features'][0]['geometry']['type']          = 'Point';
            $result['features'][0]['geometry']['coordinates']   = [floatval($coordinates[0]), floatval($coordinates[1])];
        } else {
            $result['success'] = false;
        }

        // header
        header('HTTP/1.1 200 OK');
        header('Content-Type: application/json');

        return json_encode($result);
    }

    public function getGempaBerpotensiTsunamiTerkini()
    {
        $url    = 'https://data.bmkg.go.id/lasttsunami.xml';
        $type   = 'Gempa Berpotensi Tsunami Terkini';

        $bmkg = json_decode(json_encode($this->_data($url, $type)), TRUE);

        // creator
        $result['creator']['name']          = $this->_name;
        $result['creator']['homepage']      = $this->_homepage;
        $result['creator']['telegram']      = $this->_telegram;
        $result['creator']['source_code']   = $this->_source_code;

        // BMKG
        $result['data_source']['institution']   = $this->_bmkg;
        $result['data_source']['type']          = 'Gempa Berpotensi Tsunami Terkini';
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
            $result['features'][0]['properties']['tanggal']     = $bmkg['data']['Gempa']['Tanggal'];
            $result['features'][0]['properties']['jam']         = $bmkg['data']['Gempa']['Jam'];
            $result['features'][0]['properties']['lintang']     = $bmkg['data']['Gempa']['Lintang'];
            $result['features'][0]['properties']['bujur']       = $bmkg['data']['Gempa']['Bujur'];
            $result['features'][0]['properties']['magnitude']   = $bmkg['data']['Gempa']['Magnitude'];
            $result['features'][0]['properties']['kedalaman']   = $bmkg['data']['Gempa']['Kedalaman'];
            $result['features'][0]['properties']['area']   = $bmkg['data']['Gempa']['Area'];
            $result['features'][0]['properties']['linkdetail']   = $bmkg['data']['Gempa']['Linkdetail'];

            // geometry
            $result['features'][0]['geometry']['type']          = 'Point';
            $result['features'][0]['geometry']['coordinates']   = [floatval($bmkg['data']['Gempa']['Bujur']), floatval($bmkg['data']['Gempa']['Lintang'])];
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
        $url    = 'https://data.bmkg.go.id/gempaterkini.xml';
        $type   = '60 Gempabumi M 5.0+';

        $bmkg   = $this->_data($url, $type);

        // creator
        $result['creator']['name']          = $this->_name;
        $result['creator']['homepage']      = $this->_homepage;
        $result['creator']['telegram']      = $this->_telegram;
        $result['creator']['source_code']   = $this->_source_code;

        // BMKG
        $result['data_source']['institution']   = $this->_bmkg;
        $result['data_source']['type']          = '60 Gempabumi M 5.0+';
        $result['data_source']['url']           =  $url;

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
                $gempa['geometry']['coordinates']   = [floatval($coordinates[0]), floatval($coordinates[1])];

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

    private function _data($url, $type)
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
