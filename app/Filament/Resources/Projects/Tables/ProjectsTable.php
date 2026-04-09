<?php

namespace App\Filament\Resources\Projects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use App\Enums\TaxonomyType;
use Filament\Actions\DeleteAction;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Název')
                    ->searchable(),
                TextColumn::make('slug')
                    ->label('URL slug')
                    ->searchable(),
                TextColumn::make('author_name')
                    ->label('Autor')
                    ->searchable(),
                TextColumn::make('author_class')
                    ->label('Třída')
                    ->searchable(),
                TextColumn::make('school_year')
                    ->label('Školní rok')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('author_email')
                    ->label('E-mail')
                    ->searchable(),
                IconColumn::make('is_published')
                    ->label('Publikováno')
                    ->boolean(),
                TextColumn::make('published_at')
                    ->label('Datum publikace')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('sort_order')
                    ->label('Pořadí')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Vytvořeno')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Upraveno')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('is_published')
                    ->label('Publikováno')
                    ->options([
                        true => 'Ano',
                        false => 'Ne',
                    ]),
                SelectFilter::make('taxonomies')
                    ->label('Ročník')
                    ->relationship('taxonomies', 'name', fn ($query) => $query->where('type', TaxonomyType::Year))
                    ->preload()
                    ->multiple(),
                SelectFilter::make('project_types')
                    ->label('Typ projektu')
                    ->relationship('taxonomies', 'name', fn ($query) => $query->where('type', TaxonomyType::PROJECT_TYPE))
                    ->preload()
                    ->multiple(),
                SelectFilter::make('work_types')
                    ->label('Typ práce')
                    ->relationship('taxonomies', 'name', fn ($query) => $query->where('type', TaxonomyType::WorkType))
                    ->preload()
                    ->multiple(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
