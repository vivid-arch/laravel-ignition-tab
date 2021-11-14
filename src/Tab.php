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

    public function registerAssets(): void
    {
        $this->script('laravel-ignition-tab', __DIR__.'/../dist/js/tab.js');
    }

    public function meta(): array
    {
        $instance = $this->getVividInstance();
        $instance['jobs'] = $this->prepareData($instance['jobs']);

        if ($instance['controller'])
            $instance['controller_path'] = $this->preparePath($instance['controller']);

        if ($instance['feature'])
            $instance['feature_path'] = $this->preparePath($instance['feature']);

        return [
            'title' => $this->name(),
            'instance' => $instance,
        ];
    }

    protected function getVividInstance(): array
    {
        return resolve('Vivid\Foundation\Instance')->toArray();
    }

    public function prepareData(array $jobs): array
    {
        foreach ($jobs as $k => $v) {
            $jobs[$k]['json'] = json_encode($v['data']);
            $jobs[$k]['fqn_path'] = $this->preparePath($v['fqn']);
        }

        return $jobs;
    }

    /**
     * @return string|bool|null
     */
    public function preparePath(string $class)
    {
        try {
            return (new \ReflectionClass($class))->getFileName();
        } catch (\Exception $e) {
            return null;
        }
    }
}
