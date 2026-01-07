<?php

use Filament\Facades\Filament;
use Filament\Tests\TestCase;

uses(TestCase::class);

it('will have robots meta by default', function () {
    $this->get(Filament::getLoginUrl())
        ->assertSuccessful()
        ->assertSeeHtml('<meta name="robots" content="noindex,nofollow" />');
});

it('can toggle off meta robots tag', function () {
    $panel = Filament::getCurrentOrDefaultPanel();
    $panel->hideFromRobots(false);

    Filament::setCurrentPanel($panel);

    $this->get(Filament::getLoginUrl())
        ->assertSuccessful()
        ->assertDontSeeHtml('<meta name="robots" content="noindex,nofollow" />');
});
