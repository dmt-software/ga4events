# ga4events
Google Analytics 4 Events helper objects.

Usage:
```php
use DmtSoftware\GA4Events\GA4Helper;

// create an event
$searchEvent = GA4Helper::search(['search_term' => 'mret_hcraes']);

// output the event in different formats
$gtagParams = GA4Helper::toGtag($searchEvent);
$gtagScript = GA4Helper::toGtagScript($searchEvent, $includeScriptTag = false);
$dataLayerParams = GA4Helper::toDataLayer($searchEvent);
$dataLayerScript = GA4Helper::toDataLayer($searchEvent, $includeScriptTag = false);
```
