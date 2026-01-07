<?php

use Filament\Facades\Filament;
use Filament\Tests\TestCase;

uses(TestCase::class);

it('doesnt have a robots meta tag by default', function () {
    $this->get(Filament::getLoginUrl())
        ->assertSuccessful()
        ->assertDontSeeHtml('<meta name="robots" content="noindex, nofollow" />');
});

it('can enable the meta robots tag', function () {
    $panel = Filament::getCurrentOrDefaultPanel();
    $panel->hideFromRobots();

    Filament::setCurrentPanel($panel);

    $this->get(Filament::getLoginUrl())
        ->assertSuccessful()
        ->assertSeeHtml('<meta name="robots" content="noindex, nofollow" />');
});
