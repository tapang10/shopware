<?php declare(strict_types=1);
namespace MinimalCartOffCanvas\Resources\config;

use Shopware\Core\System\SystemConfig\SystemConfigService;

class PluginConfig
{
    private $systemConfig;

    public function __construct(SystemConfigService $systemConfig)
    {
        $this->systemConfig = $systemConfig;
    }

    public function getCrossSellingGroupIndex()
    {
        return $this->systemConfig->get('MinimalCartOffCanvas.config.cross_selling_group_index');
    }
}
