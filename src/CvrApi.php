<?php
namespace kevinfrom\CvrApi;

class CvrApi
{
    /**
     * @var string $baseUrl
     * @var string $country
     */
    private static $baseUrl = 'cvrapi.dk/api';
    private static $country = 'dk';
    private static $ssl;

    public function __construct($country = 'dk', $ssl = true)
    {
        self::$country = $country;
        self::$ssl     = $ssl ? 'https://' : 'http://';
    }

    /**
     * Gets url for request
     *
     * @param string $query
     * @param string $type
     *
     * @return string
     */
    private function getUrl($query, $type = 'search')
    {
        return self::$ssl . self::$baseUrl . '?' . $type . '=' . urlencode($query) . '&country=' . self::$country;
    }

    /**
     * Gets result from the query and returns as JSON
     *
     * @param $url
     *
     * @return false|string
     */
    private function getResult($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'https://github.com/kevinfrom/cvr-api');

        $result = curl_exec($ch);

        curl_close($ch);

        return json_encode($result);
    }

    /**
     * Query search
     *
     * @param string $query
     *
     * @return false|string
     */
    public function search($query)
    {
        $url = self::getUrl($query);

        return self::getResult($url);
    }

    /**
     * Searches by name
     *
     * @param $name
     *
     * @return array|null
     */
    public function searchByName($name)
    {
        $url = self::getUrl($name, 'name');

        return self::getResult($url);
    }

    /**
     * Search by VAT
     *
     * @param $vat
     *
     * @return array|null
     */
    public function searchByVat($vat)
    {
        $url = self::getUrl($vat, 'vat');

        return self::getResult($url);
    }

    /**
     * Alias for searchByVat
     *
     * @param $vat
     *
     * @return array|null
     */
    public function searchByCvr($vat)
    {
        return self::searchByVat($vat);
    }

    /**
     * Search by production unit
     *
     * @param $productionUnit
     *
     * @return array|null
     */
    public function searchByProductionUnit($productionUnit)
    {
        $url = self::getUrl($productionUnit, 'produ');

        return self::getResult($url);
    }

    /**
     * Search by phone
     *
     * @param $phone
     *
     * @return array|null
     */
    public function searchByPhone($phone)
    {
        $url = self::getUrl($phone, 'phone');

        return self::getResult($url);
    }
}
