<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestProjects extends TableWidget
{
    protected static ?string $heading = 'Poslední projekty';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Project::query()->latest()->limit(5))
            ->columns([
                TextColumn::make('title')
                    ->label('Název'),
                TextColumn::make('author_name')
                    ->label('Autor'),
                TextColumn::make('author_class')
                    ->label('Třída'),
                IconColumn::make('is_published')
                    ->label('Publikováno')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label('Vytvořeno')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->paginated(false);
    }
}
