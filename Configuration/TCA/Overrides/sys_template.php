<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
// Prevent script from being called directly
defined('TYPO3') or die();

// encapsulate all locally defined variables
(static function() {
    ExtensionManagementUtility::addStaticFile(
        'cbgooglemaps',
        'Configuration/TypoScript',
        'Quick Maps'
    );
})();
