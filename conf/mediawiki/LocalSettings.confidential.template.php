<?php
# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

## Keys
$wgSecretKey = '';
$wgUpgradeKey = '';

## Database settings
$wgDBtype           = "";
$wgDBserver         = "";
$wgDBname           = "";
$wgDBuser           = "";
$wgDBpassword       = "";

## Google Analytics, Google Maps, Yahoo Maps
$wgGoogleAnalyticsAccount = "";
$egGoogleMapsKey = "";
$egYahooMapsKey = "";

## ReCaptcha private & public key
$recaptcha_private_key = '';	
$recaptcha_public_key = '';

## Facebook App Id & Secret Key
$wgFbAppId = '';
$wgFbSecret = '';