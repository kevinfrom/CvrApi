<?php
namespace CvrApi\Library;

use Cake\Http\Client;

class CvrApi
{
    /**
     * @var string $baseUrl
     * @var string $country
     * @var null|Client
     */
    private static $baseUrl = 'https://cvrapi.dk/api';
    private static $country = 'dk';
    private static $client;

    public function __construct($country = 'dk', $ssl = true)
    {
        self::setCountry($country);

        self::setClient(new Client([
            'scheme' => $ssl ? 'https' : 'http',
        ]));
    }

    /**
     * Gets country
     *
     * @return string
     */
    public function getCountry()
    {
        return self::$country;
    }

    /**
     * Sets country
     *
     * @param $country
     */
    public function setCountry($country)
    {
        self::$country = $country;
    }

    /**
     * Returns Client
     *
     * @return null|Client
     */
    public function getClient()
    {
        return self::$client;
    }

    /**
     * Sets Client
     *
     * @param Client $client
     */
    public function setClient(Client $client)
    {
        self::$client = $client;
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
        return self::getClient()->buildUrl(self::$baseUrl, [
            'country' => self::$country,
            $type     => $query,
        ]);
    }

    /**
     * Query search
     *
     * @param string $query
     *
     * @return array|null
     */
    public function search($query)
    {
        $url = self::getUrl($query);

        return self::getClient()->get($url)->getJson();
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

        return self::getClient()->get($url)->getJson();
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

        return self::getClient()->get($url)->getJson();
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

        return self::getClient()->get($url)->getJson();
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

        return self::getClient()->get($url)->getJson();
    }
}
