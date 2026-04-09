<?php

namespace App\Filament\Resources\WorkTypes;

use App\Enums\TaxonomyType;
use App\Filament\Resources\WorkTypes\Pages\CreateWorkType;
use App\Filament\Resources\WorkTypes\Pages\EditWorkType;
use App\Filament\Resources\WorkTypes\Pages\ListWorkTypes;
use App\Filament\Resources\WorkTypes\Schemas\WorkTypeForm;
use App\Filament\Resources\WorkTypes\Tables\WorkTypesTable;
use App\Models\Taxonomy;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;


class WorkTypeResource extends Resource
{
    protected static ?string $model = Taxonomy::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?string $navigationLabel = 'Typy prací';

    protected static ?string $modelLabel = 'Typ práce';

    protected static ?string $pluralModelLabel = 'Typy prací';

    protected static string|null|\UnitEnum $navigationGroup = 'Taxonomie';

    protected static ?string $slug = 'work-types';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('type', TaxonomyType::WorkType);
    }

    public static function form(Schema $schema): Schema
    {
        return WorkTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WorkTypesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWorkTypes::route('/'),
            'create' => CreateWorkType::route('/create'),
            'edit' => EditWorkType::route('/{record}/edit'),
        ];
    }
}
