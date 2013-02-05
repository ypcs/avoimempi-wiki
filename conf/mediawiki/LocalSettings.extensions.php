<?php
/**
 * Load MediaWiki extensions
 *
 * @author Ville Korhonen <ville@xd.fi>
 * @version 1.0
 */

// TODO: Add debug information to extension loaders

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

/** 
 * Load specified $extension
 *
 * @param $extension extension to be loaded (Just extension name, $IP/extensions/$extension/$extension.php will be loaded if file_exists)
 * @return returns true if successful, otherwise false
 */
function load_extension($extension) {
	global $IP;
	$xt = basename($extension);
	$file = "$IP/extensions/$xt/$xt.php";

	if (file_exists($file)) {
		return require_once($file);
	}
	return false;
}

/**
 * Load all extensions specified in array
 *
 * @param $extension_array list of extension names to be loaded
 * @return returns true if successful, otherwise false
 */
function load_extensions($extension_array) {
	$results = array();

	if (is_array($extension_array)) {
		for ($i=0; $i<count($extension_array); $i++) {
			if (is_array($extension_array[$i])) {
				$results[] = load_extensions($extension_array[$i]);
			} else {
				$results[] = load_extension($extension_array[$i]);
			}
		}
	} else {
		$extensions = explode(',', $extension_array);
		$results[] = load_extensions($extensions);
	}

	if (count(array_unique($results)) == 1) {
		return current($results);
	}
	return false;
}



if (load_extension('WikiEditor')) {
	$wgDefaultUserOptions['wikieditor-preview'] = 1;
}



if (load_extension('Collection')) {
	$wgCollectionPODPartners = array();
}


if (load_extension('SemanticMediaWiki')) {
	enableSemantics('wiki.avoimempi.fi');
	load_extension('SemanticForms');
	if (load_extension('Maps')) {
		load_extension('SemanticMaps');
	}
}



if (load_extension('FlaggedRevs')) {
	$wgFlaggedRevsStatsAge = false;
	$wgSimpleFlaggedRevsUI = false;
	$wgFlaggedRevsLowProfile = true;
	$wgFlaggedRevsWhitelist = array('Etusivu');	
}

if (load_extension('googleAnalytics')) {
	$wgGoogleAnalyticsIgnoreSysops = false;
	$wgGoogleAnalyticsIgnoreBots = false;
	$wgGoogleAnalyticsAddASAC = false;	
}

// TODO: use $wgServerName
if (load_extension('ShortUrl')) {
	$wgShortUrlTemplate = "$wgServer/r/$1";
}

if (load_extension('Cite')) {
	$wgCiteEnablePopups = true;
}

$extensions = array(
	'TwitterFBLike',
	'ConfirmEdit',
	'Gadgets',
	'Nuke',
	'ParserFunctions',
	'Renameuser',
	'Vector',
	'Interwiki',
	'Validator',
	'CreateBox',
	'MagicNumberedHeadings',
	'NewestPages',
	'DiscussionThreading',
	'CategoryTree',
	'LookupUser',
	'PdfHandler',
	'UploadWizard',
	'ReCaptcha',
	'Facebook',
);
load_extensions($extensions);
