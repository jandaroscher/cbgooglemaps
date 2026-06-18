<?php

// Prevent script from being called directly
defined('TYPO3') or die();

// encapsulate all locally defined variables
(static function () {
    // Register the plugin as a dedicated CType.
    //
    // Since TYPO3 v13.4 the legacy "list_type" plugin sub types are deprecated and
    // they were removed in TYPO3 v14. registerPlugin() therefore registers the
    // plugin as its own content type (CType). The resulting CType identifier is
    // "<extensionkey>_<pluginname>" (lower-cased), i.e. "cbgooglemaps_quickgooglemap",
    // which is the same identifier the extension already used as the former sub type.
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'cbgooglemaps',
        'Quickgooglemap',
        'LLL:EXT:cbgooglemaps/Resources/Private/Language/locallang.xlf:pluginWizardTitle',
        'ce-default-icon',
        'plugins',
        'LLL:EXT:cbgooglemaps/Resources/Private/Language/locallang.xlf:pluginWizardDescription'
    );

    $cType = 'cbgooglemaps_quickgooglemap';

    // Add the FlexForm field to the showitem list of the new CType.
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'tt_content',
        'pi_flexform',
        $cType,
        'after:palette:general'
    );

    // Register the FlexForm data structure for the new CType via static TCA.
    // This replaces the deprecated ExtensionManagementUtility::addPiFlexFormValue()
    // (deprecated in v14, removed in v15) and works in both TYPO3 v13.4 and v14.
    $GLOBALS['TCA']['tt_content']['columnsOverrides'][$cType]['pi_flexform']['config']['ds'] = [
        'default' => 'FILE:EXT:cbgooglemaps/Configuration/FlexForms/flexform_quickgooglemap.xml',
    ];
})();
