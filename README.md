# Bulk URL Shortening - a YOURLS plugin

Plugin for [YOURLS](http://yourls.org)

* Plugin URI:       [https://github.com/kur4ge/bulk_api_bulkshortener](https://github.com/kur4ge/bulk_api_bulkshortener)
* Description:      A YOURLS plugin allowing the shortening of multiple URLs with one API request.
* Version:          1.1
* Release date:     2021-10-31
* Author:           Kur4ge
* Author URI:       [https://kur4ge.com](https://kur4ge.com)

## Installation

1. In `/user/plugins`, create a new folder named `bulk-shortener`.
2. Drop these files in that directory.

## Use

1. Add in your api request the parameter `action=bulkshortener`
2. Send the list of the URLs to be shortened using the parameter `urls[]`.
3. The response contains each shortened URL in a single line.

## Example
Request: 
* http://host:port/yourls-api.php?username=u&password=p&format=json&action=bulkshortener&urls[]=http://url1&urls[]=http://url2

Response:
* http://s.com/zy1071
* http://s.com/ha52ql

## History

* 2015-07-22, v1.0: Initial version.
  * on [github.com/tdakanalis/bulk_api_bulkshortener](https://github.com/tdakanalis/bulk_api_bulkshortener)

* 2021-10-31, v1.1
  * Add multiple formats to return.

## Finally...

I hope you find this plugin useful.
