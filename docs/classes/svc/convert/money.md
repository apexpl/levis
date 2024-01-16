
# Convert::money 

### Usage

> string Convert::money(string | float $amount, [ string $currency = '' ], [ bool $include_abbr = true ], [ bool $is_crypto = false ])

### Description

> Format amount.

### Parameters

Parameter | Required | Type | Description
------------- |------------- |------------- |------------- 
amount | Yes | string | float |
currency | No | string | Currency code to format amount to.  If blank, will use authenticated user's profile currency.
include_abbr | No | bool | Whether or not to include the three letter currency code in result.
is_crypto | No | bool |

### Return
> The formatted amount.
### See Also

* [case()](case.md)
* [date()](date.md)
* [dateInterval()](dateinterval.md)
* [exchangeMoney()](exchangemoney.md)
* [full_name()](full_name.md)
* [lastSeen()](lastseen.md)
* [tr()](tr.md)


