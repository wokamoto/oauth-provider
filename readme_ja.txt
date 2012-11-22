=== OAuth Provider ===
Contributors: wokamoto, megumithemes
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=9S8AJCY7XB8F4&lc=JP&item_name=WordPress%20Plugins&item_number=wp%2dplugins&currency_code=JPY&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted
Tags: OAuth
Requires at least: 2.8
Tested up to: 3.4.1
Stable tag: 0.5.2

WordPress で OAuth 認証を使用できるようにするプラグインです。

== Description ==

これは実験的なプラグインで、あなたの WordPress サイトを OAuth プロバイダにすることができます。
現在、このプラグインで提供している機能は、以下の通りです。

* アプリケーションの登録 (Consumer キーの取得)
* Access キーの発行
* 発行された Consumer キー, Access トークンを使用して接続後に実行するメソッドを登録する
* 発行された Consumer キー, Access トークンを使用して接続し、登録されたメソッドを実行する

**PHP5 Required.**

= Localization =
"OAuth Provider" has been translated into languages. Our thanks and appreciation must go to the following for their contributions:

* Japanese (ja) - [OKAMOTO Wataru](http://dogmap.jp/ "dogmap.jp") (plugin author)

If you have translated into your language, please let me know.

== Installation ==

1. Upload the entire `oauth-provider` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

The control panel of OAuth Provider is in 'OAuth Provider'.

このプラグインを有効にすると以下の URL に対してアクセスできるようになります。
( WordPress サイトの URL が `http://example.com/` の場合 )

* `http://example.com/oauth/request_token`	Request トークン発行用のURL
* `http://example.com/oauth/authorize`		ユーザーによる承認用のURL
* `http://example.com/oauth/access_token`		Access トークン発行用のURL
* `http://example.com/oauth/(メソッド名)`		Consumer キー、Access トークンを使用して OAuth メソッドを呼び出すための URL

このプラグインで現在実装されている OAuth メソッド `sayHello` は、ユーザー名を返すだけの簡単なものです。

`add_oauth_method($name, $method)` を使用することで、メソッドを登録することができます。
この関数は `add_filter()` のように使用することができます。

以下のようにすることで `sayHello` というメソッドを簡単に追加することができます。
`add_oauth_method('sayHello', create_function('$request, $userid, $username', 'return "Hello {$username}!";'));`

登録された `sayHello` メソッドを実行するには、以下の URL にアクセスしてください。
`http://example.com/oauth/sayHello`


== Frequently Asked Questions ==

none

