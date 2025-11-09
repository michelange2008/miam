<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public string $variant;
    public bool $disabled;
    public ?string $route;
    public array $params;
    public bool $newTab;
    public ?string $icon;
    public string $iconPosition;

    public function __construct(
        string $variant = 'gray',
        bool $disabled = false,
        ?string $route = null,
        array $params = [],
        bool $newTab = false,
        ?string $icon = null,
        string $iconPosition = 'left' // 'left' ou 'right'
    ) {
        $this->variant = $variant;
        $this->disabled = $disabled;
        $this->route = $route;
        $this->params = $params;
        $this->newTab = $newTab;
        $this->icon = $icon;
        $this->iconPosition = in_array($iconPosition, ['left','right']) ? $iconPosition : 'left';
    }

    public function render()
    {
        return view('components.button');
    }

    public function routeUrl(): ?string
    {
        return $this->route ? route($this->route, $this->params) : null;
    }
}
