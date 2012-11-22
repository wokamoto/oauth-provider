=== OAuth Provider ===
Contributors: wokamoto, megumithemes
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=9S8AJCY7XB8F4&lc=JP&item_name=WordPress%20Plugins&item_number=wp%2dplugins&currency_code=JPY&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted
Tags: OAuth
Requires at least: 2.8
Tested up to: 3.4.1
Stable tag: 0.5.2

A plugin to allow WordPress to use an OAuth authenticator.

== Description ==

This plugin is experimental and is enable to make your site an OAuth provider.
Currently the plugin offers features as below:

* Registering applications (obtaining a Consumer Key).
* Issuing an Access Token.
* Using the obtained Consumer Key and the Access Token, you can register a method which is executed after connected.
* Using the obtained Consumer Key and the Access Token, you can execute the registered method.

**PHP5 Required.**

Special thx to [DigitalCube Co. Ltd.](http://www.digitalcube.jp/ "DigitalCube Co. Ltd.")!

Thx. Robert!
So, what I've noticed is that in this file one parameter is called "callbackurl" which should be called "oauth_callback", according to the rfc: http://tools.ietf.org/html/rfc5849

= Localization =
"OAuth Provider" has been translated into languages. Our thanks and appreciation must go to the following for their contributions:

* Japanese (ja) - [OKAMOTO Wataru](http://dogmap.jp/ "dogmap.jp") (plugin author)

If you have translated into your language, please let me know.

== Installation ==

1. Upload the entire `oauth-provider` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

The control panel of OAuth Provider is in 'OAuth Provider'.

After enabled this plugin, you can access URLs as below:
(suppose your WordPress's URL is `http://example.com/`)

* `http://example.com/oauth/request_token`	The URL to obtain a Request Token.
* `http://example.com/oauth/authorize`		The URL to obtain User authorization.
* `http://example.com/oauth/access_token`		The URL to issue an Access Token.
* `http://example.com/oauth/(method name)`		The URL to call a OAuth method using a Consumer key and an Access Token.


The OAuth method `sayHello`, which is implemented in this plugin for now, is simply returning a user name.

You can register a method using `add_oauth_method($name, $method)`.
You can use this function like `add_filter()`. 

You can easily add the sayHello method like below:
`add_oauth_method('sayHello', create_function('$request, $userid, $username', 'return "Hello {$username}!";'));`

To execute the registered sayHello method, access the URL below:
`http://example.com/oauth/sayHello`


== Frequently Asked Questions ==

none

== Changelog == 

**0.3.2 - August 17, 2012**
Parameter is called "callbackurl" which should be called "oauth_callback".

**0.3.1 - August 1, 2011**  
Minor bug fix.

**0.3.0 - July 27, 2011**  
Added login form.

**0.2.0 - July 27, 2011**  
Initial release.
