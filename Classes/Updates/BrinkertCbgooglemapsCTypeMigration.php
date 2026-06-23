<?php

declare(strict_types=1);

namespace Brinkert\Cbgooglemaps\Updates;

use TYPO3\CMS\Core\Attribute\UpgradeWizard;
use TYPO3\CMS\Core\Upgrades\AbstractListTypeToCTypeUpdate;

#[UpgradeWizard('brinkertCbgooglemapsCTypeMigration')]
final class BrinkertCbgooglemapsCTypeMigration extends AbstractListTypeToCTypeUpdate
{
    public function getTitle(): string
    {
        return 'Migrate "Brinkert Cbgooglemaps" plugins to content elements.';
    }

    public function getDescription(): string
    {
        return 'The "Brinkert Cbgooglemaps" plugins are now registered as content element. Update migrates existing records and backend user permissions.';
    }

    /**
     * This must return an array containing the "list_type" to "CType" mapping
     *
     *  Example:
     *
     *  [
     *      'pi_plugin1' => 'pi_plugin1',
     *      'pi_plugin2' => 'new_content_element',
     *  ]
     *
     * @return array<string, string>
     */
    protected function getListTypeToCTypeMapping(): array
    {
        return [
            // Legacy Extbase plugin sub type (tt_content.CType="list",
            // list_type="cbgooglemaps_quickgooglemap") -> dedicated v14 CType.
            // The CType identifier is unchanged (<extkey>_<pluginname>), so the
            // migration only rewrites CType/list_type on existing records.
            'cbgooglemaps_quickgooglemap' => 'cbgooglemaps_quickgooglemap',
        ];
    }
}
