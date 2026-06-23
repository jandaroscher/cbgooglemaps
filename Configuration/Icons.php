<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

return [
    'ce-default-icon' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:cbgooglemaps/Resources/Public/Icons/ce_wiz.svg',
    ],
];
