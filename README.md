# ga4events
Google Analytics 4 Events helper objects.

Usage:
```php
<?php
require_once('vendor/autoload.php');

use DMT\GA4Events\GA4Helper;

// create an event
$searchEvent = GA4Helper::search(['search_term' => 'mret_hcraes']);

// output the event in different formats
$gtagParams = GA4Helper::toGtag($searchEvent);

print_r($gtagParams);

/*
Array
(
    [0] => event
    [1] => search
    [2] => Array
        (
            [search_term] => mret_hcraes
        )
)
*/

$gtagScript = GA4Helper::toGtagScript($searchEvent, $includeScriptTag = false);

echo $gtagScript;

/*
gtag("event","search",{"search_term":"mret_hcraes"});
*/

$dataLayerParams = GA4Helper::toDataLayer($searchEvent);

print_r($dataLayerParams);

/*
Array
(
    [event] => search
    [ecommerce] => Array
        (
            [search_term] => mret_hcraes
        )

)
*/

$dataLayerScript = GA4Helper::toDataLayerScript($searchEvent, $includeScriptTag = false);

echo $dataLayerScript;

/*
dataLayer.push({"event":"search","ecommerce":{"search_term":"mret_hcraes"}});
*/
```
