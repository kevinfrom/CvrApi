# CvrApi plugin for CakePHP

## Installation


Install through composer:
````
composer require kevinfrom/cvr-api
````

## PHP Examples
### Initializing the api
````
use \CvrApi\CvrApi;

$cvrApi = new CvrApi();
````

### Country
By default, the API searches for Denmark, but you can change this if you would like:
````
$cvrApi->setCountry('de');
````
or during initialization:
````
$cvrApi = new CvrApi('de');
````

### SSL/HTTPS
By default, SSL/HTTPS is enabled for the API request, but you can disable this if you would like:
````
$cvrApi = new CvrApi('dk', true);
````

### Http Client
The API uses Cakephp's Http Client. If you would like the Http Client object, you can get it:
````
$client = $cvrApi->getClient();
````

### Query search
Search using query:
````
$result = $cvrApi->search('Vestjysk Marketing');
````

### Search by name
Seach by name:
````
$result = $cvrApi->searchByName('Vestjysk Marketing');
````

### Search by VAT
Search by VAT (integer):
````
$result = $cvrApi->searchByVat(10029155);
````
or string:
````
$result = $cvrApi->searchByVat('10029155');
````

### Search by CVR
This is an alias to "Search by VAT".

Search by CVR (integer):
````
$result = $cvrApi->searchByCvr(10029155);
````
or string:
````
$result = $cvrApi->searchByCvr('10029155');
````

### Search by production unit
Search by production unit:
````
$result = $cvrApi->searchByProductionUnit(1007740219);
````

### Search by phone
Search by phone:
````
$result = $cvrApi->searchByPhone(97320108);
````

## Todo
- ~~Php class~~
- ~~Js class~~
- Create Cakephp view helper
