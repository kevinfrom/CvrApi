# CvrApi php library

## Installation


Install through composer:
````
composer require kevinfrom/cvr-api
````

## PHP Examples
### Initializing the api
````
use \kevinfrom\CvrApi\CvrApi;

$cvrApi = new CvrApi();
````

### Country
By default, the API searches for Denmark, but you can change this if you would like:
````
$cvrApi = new CvrApi('de');
````

### SSL/HTTPS
By default, SSL/HTTPS is enabled for the API request, but you can disable this if you would like:
````
$cvrApi = new CvrApi('dk', true);
````

### Query search
Search using query:
````
$result = $cvrApi->search('Kevin From');
````

### Search by name
Seach by name:
````
$result = $cvrApi->searchByName('Kevin From');
````

### Search by VAT
Search by VAT (integer):
````
$result = $cvrApi->searchByVat(39090325);
````
or string:
````
$result = $cvrApi->searchByVat('39090325');
````

### Search by CVR
This is an alias to "Search by VAT".

Search by CVR (integer):
````
$result = $cvrApi->searchByCvr(39090325);
````
or string:
````
$result = $cvrApi->searchByCvr('39090325');
````

### Search by production unit
Search by production unit:
````
$result = $cvrApi->searchByProductionUnit(1025204855);
````

### Search by phone
Search by phone:
````
$result = $cvrApi->searchByPhone(51927117);
````
