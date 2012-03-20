<?php
if (!defined ("TYPO3_MODE")) die ("Access denied.");

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['additionalBackendItems']['cacheActions'][] = 'EXT:cooluriclearcache/class.tx_cooluriclearcache_cachemenu.php:&tx_cooluriclearcache_cachemenu';
$TYPO3_CONF_VARS['BE']['AJAX']['tx_cooluriclearcache::clear'] = 'EXT:cooluriclearcache/class.tx_cooluriclearcache.php:tx_cooluriclearcache->clear';

?>