<?php

$wgGroupPermissions['sysop']['interwiki'] = true;

$wgGroupPermissions['patrollers']['patrol'] = true;
$wgGroupPermissions['patrollers']['autopatrol'] = true;
$wgGroupPermissions['*']['edit'] = false;

$wgGroupPermissions['*']['lookupuser'] = false;
$wgGroupPermissions['sysop']['lookupuser'] = true;