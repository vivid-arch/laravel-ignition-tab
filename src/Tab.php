<?php

namespace Vivid\Ignition;

use Facade\Ignition\Tabs\Tab as BaseTab;

class Tab extends BaseTab
{
    public function name(): string
    {
        return 'Vivid';
    }

    public function component(): string
    {
        return 'laravel-ignition-tab';
    }

    public function registerAssets()
    {
        $this->script('laravel-ignition-tab', __DIR__.'/../dist/js/tab.js');
    }

    public function meta(): array
    {
        return [
            'title' => $this->name(),
            'instance' => $this->getVividInstance(),
        ];
    }

    protected function getVividInstance()
    {
        return resolve('Vivid\Foundation\Instance')->toArray();
    }
}
