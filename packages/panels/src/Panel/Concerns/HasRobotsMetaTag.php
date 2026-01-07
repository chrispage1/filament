<?php

namespace Filament\Panel\Concerns;

use Closure;
use Filament\Livewire\Topbar;
use Livewire\Component;

trait HasRobotsMetaTag
{
    protected Closure | bool $hideFromRobots = false;

    public function hideFromRobots(bool | Closure $condition = true): static
    {
        $this->hideFromRobots = $condition;

        return $this;
    }

    public function shouldBeHiddenFromRobots(): bool
    {
        return (bool) $this->evaluate($this->hideFromRobots);
    }
}
