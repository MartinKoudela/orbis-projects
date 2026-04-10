<?php

namespace App\Filament\Resources\Years;

use App\Enums\TaxonomyType;
use App\Filament\Resources\Years\Pages\CreateYear;
use App\Filament\Resources\Years\Pages\EditYear;
use App\Filament\Resources\Years\Pages\ListYears;
use App\Filament\Resources\Years\Schemas\YearForm;
use App\Filament\Resources\Years\Tables\YearsTable;
use App\Models\Taxonomy;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class YearResource extends Resource
{
    protected static ?string $model = Taxonomy::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendar;

    protected static ?string $navigationLabel = 'Ročníky';

    protected static ?string $modelLabel = 'Ročník';

    protected static ?string $pluralModelLabel = 'Ročníky';

    protected static string|null|\UnitEnum $navigationGroup = 'Taxonomie';

    protected static ?string $slug = 'year';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('type', TaxonomyType::YEAR);
    }

    public static function form(Schema $schema): Schema
    {
        return YearForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return YearsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListYears::route('/'),
            'create' => CreateYear::route('/create'),
            'edit' => EditYear::route('/{record}/edit'),
        ];
    }
}
