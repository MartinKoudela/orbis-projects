<?php

namespace App\Filament\Resources\WorkTypes\Schemas;

use App\Enums\TaxonomyType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class WorkTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Základní info')
                    ->icon(Heroicon::Tag)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name')
                            ->label('Název')
                            ->required()
                            ->live(debounce: 300)
                            ->afterStateUpdated(fn($state, callable $set) => $set('slug', str($state)->slug())),
                        TextInput::make('slug')
                            ->label('URL slug')
                            ->required()
                            ->readOnly()
                            ->dehydrated()
                            ->helperText('Generuje se automaticky z názvu. Klikněte pro úpravu.')
                            ->extraInputAttributes(['onclick' => "this.readOnly = false; this.classList.remove('bg-gray-50')"]),
                    ])
            ]);
    }
}
