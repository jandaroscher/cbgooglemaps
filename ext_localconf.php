<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use Brinkert\Cbgooglemaps\Controller\MapController;
use Brinkert\Cbgooglemaps\Form\Element\PreviewButtonElement;
use Brinkert\Cbgooglemaps\Form\Element\JsLibrariesElement;
use Brinkert\Cbgooglemaps\Form\Element\GeoCodingButtonElement;
// Prevent script from being called directly
defined('TYPO3') or die();

// encapsulate all locally defined variables
(static function() {
    ExtensionUtility::configurePlugin(
        'cbgooglemaps',
        'Quickgooglemap',
        [
            MapController::class => 'index',
        ],
        // non-cacheable actions
        [],
        // Register as a content element (CType). list_type plugin sub types were
        // removed in TYPO3 v14 (#105538); passing this explicitly is the documented
        // v14 form (omitting it defaults to the same "CType" internally).
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    $tStamp = (new Datetime("now"))->getTimestamp();
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][$tStamp] = [
        'nodeName' => 'previewButtonElement',
        'priority' => 40,
        'class' => PreviewButtonElement::class,
    ];
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][($tStamp + 1)] = [
        'nodeName' => 'jsLibrariesElement',
        'priority' => 40,
        'class' => JsLibrariesElement::class,
    ];
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][($tStamp + 2)] = [
        'nodeName' => 'geoCodingButtonElement',
        'priority' => 40,
        'class' => GeoCodingButtonElement::class,
    ];
})();
