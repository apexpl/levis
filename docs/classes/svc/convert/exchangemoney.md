
# Convert::exchangeMoney 

### Usage

> ?mixed Convert::exchangeMoney(string | float $amount, string $from_currency, string $to_currency, [ ?DateTime $date = null ])

### Description

> Exchange money to another currency.

### Parameters

Parameter | Required | Type | Description
------------- |------------- |------------- |------------- 
amount | Yes | string | float |
from_currency | Yes | string | Three letter currency code of the amount being converted.
to_currency | Yes | string | Three letter currency code to convert amount to.
date | No | ?DateTime | Optional DateTIme, and if present will use exchange rate from that time.

### Return
> The converted amount.
### See Also

* [case()](case.md)
* [date()](date.md)
* [dateInterval()](dateinterval.md)
* [full_name()](full_name.md)
* [lastSeen()](lastseen.md)
* [money()](money.md)
* [tr()](tr.md)


