<?php

namespace App\Filament\Resources\ProjectTypes;

use App\Enums\TaxonomyType;
use App\Filament\Resources\ProjectTypes\Pages\CreateProjectType;
use App\Filament\Resources\ProjectTypes\Pages\EditProjectType;
use App\Filament\Resources\ProjectTypes\Pages\ListProjectTypes;
use App\Filament\Resources\ProjectTypes\Schemas\ProjectTypeForm;
use App\Filament\Resources\ProjectTypes\Tables\ProjectTypesTable;
use App\Models\Taxonomy;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ProjectTypeResource extends Resource
{
    protected static ?string $model = Taxonomy::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCube;

    protected static ?string $navigationLabel = 'Typy projektů';

    protected static ?string $modelLabel = 'Typ projektu';

    protected static ?string $pluralModelLabel = 'Typy projektů';

    protected static string|null|\UnitEnum $navigationGroup = 'Taxonomie';

    protected static ?string $slug = 'project-types';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('type', TaxonomyType::PROJECT_TYPE);
    }

    public static function form(Schema $schema): Schema
    {
        return ProjectTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProjectTypesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProjectTypes::route('/'),
            'create' => CreateProjectType::route('/create'),
            'edit' => EditProjectType::route('/{record}/edit'),
        ];
    }
}
