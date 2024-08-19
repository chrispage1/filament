<?php

namespace Filament\Actions\Events;

use Filament\Actions\Exports\Models\Export;

class ExportCompleted
{
    public function __construct(public Export $export)
    {
        //
    }
}
