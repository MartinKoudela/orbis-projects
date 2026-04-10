<?php

namespace App\Filament\Resources\Projects\Schemas;

use App\Enums\TaxonomyType;
use App\Models\Taxonomy;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Repeater;
use App\Enums\LinkType;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Schemas\Components\Section;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\RichEditor;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Základní info')
                    ->icon(Heroicon::InformationCircle)
                    ->collapsible()
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('title')
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
                        SpatieMediaLibraryFileUpload::make('thumbnail')
                            ->label('Náhledový obrázek')
                            ->collection('thumbnail')
                            ->disk('public')
                            ->image()
                            ->imageEditor()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Section::make('Zařazení')
                    ->columnSpanFull()
                    ->collapsible()
                    ->icon(Heroicon::Tag)
                    ->schema([
                        Select::make('taxonomies')
                            ->label('Ročník')
                            ->multiple()
                            ->relationship('taxonomies', 'name', fn($query) => $query->where('type', TaxonomyType::YEAR))
                            ->preload(),
                        Select::make('school_year')
                            ->label('Školní rok')
                            ->options(function () {
                                $current = (int) date('Y');
                                $options = [];
                                for ($y = $current - 5; $y <= $current + 1; $y++) {
                                    $label = $y . '/' . substr($y + 1, 2);
                                    $options[$label] = $label;
                                }
                                return $options;
                            }),
                        Select::make('project_types')
                            ->label('Typ projektu')
                            ->multiple()
                            ->relationship('taxonomies', 'name', fn($query) => $query->where('type', TaxonomyType::PROJECT_TYPE))
                            ->preload(),
                        Select::make('work_types')
                            ->label('Typ práce')
                            ->multiple()
                            ->relationship('taxonomies', 'name', fn($query) => $query->where('type', TaxonomyType::WORK_TYPE))
                            ->preload(),
                    ])
                    ->columns(4),
                Section::make('Další info')
                    ->collapsible()
                    ->icon(Heroicon::ChatBubbleBottomCenterText)
                    ->columnSpanFull()
                    ->schema([
                        Textarea::make('excerpt')
                            ->label('Krátký popis')
                            ->columnSpanFull(),
                        RichEditor::make('description')
                            ->extraAttributes(['style' => 'min-height: 200px'])
                            ->label('Dlouhý popis')
                            ->columnSpanFull()

                    ]),
                Section::make('Odkazy')
                    ->icon(Heroicon::Link)
                    ->columnSpanFull()
                    ->collapsible()
                    ->schema([
                        Repeater::make('links')
                            ->hiddenLabel()
                            ->relationship()
                            ->schema([
                                Select::make('type')
                                    ->label('Typ')
                                    ->options(collect(LinkType::cases())->mapWithKeys(fn($type) => [$type->value => $type->label()]))
                                    ->required(),
                                TextInput::make('url')
                                    ->label('URL')
                                    ->url()
                                    ->required(),
                                TextInput::make('label')
                                    ->label('Popisek'),
                            ])
                            ->columns(3)
                            ->columnSpanFull()
                            ->addActionLabel('Přidat odkaz')
                            ->defaultItems(0),
                    ]),
                Section::make('Autor')
                    ->icon(Heroicon::User)
                    ->columnSpanFull()
                    ->collapsible()
                    ->schema([
                        TextInput::make('author_name')
                            ->label('Jméno autora'),
                        Select::make('school_class')
                            ->label('Třída')
                            ->multiple()
                            ->relationship('taxonomies', 'name', fn($query) => $query->where('type', TaxonomyType::SCHOOL_CLASS))
                            ->preload(),
                        TextInput::make('author_email')
                            ->label('E-mail autora')
                            ->email(),
                    ])
                    ->columns(3),
                Section::make('Publikace')
                    ->icon(Heroicon::Eye)
                    ->columnSpanFull()
                    ->collapsible()
                    ->schema([
                        Toggle::make('is_published')
                            ->label('Publikováno'),
                        DateTimePicker::make('published_at')
                            ->label('Datum publikace'),
                        TextInput::make('sort_order')
                            ->label('Pořadí')
                            ->numeric()
                            ->default(0)
                            ->helperText('Nechte prázdné pro automatické zařazení na konec'),
                    ])
                    ->columns(3),
            ]);
    }
}
