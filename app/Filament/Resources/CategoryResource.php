<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\FormsComponent;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->lazy()
                    ->required()
                    ->minLength(1)
                    ->maxLength(150)
                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                        if ($operation === 'edit') {
                            return;
                        }

                        $set('slug', Str::slug($state));
                    }),

                TextInput::make('slug')
                    ->required()
                    ->minLength(1)
                    ->unique(ignoreRecord: true),

                Select::make('text_color')
                    ->label('Tekstin väri')
                    ->options([
                        'gray' => 'Harmaa',
                        'red' => 'Punainen',
                        'blue' => 'Sininen',
                        'yellow' => 'Keltainen',
                        'orange' => 'Oranssi',
                        'purple' => 'Violetti',
                        'pink' => 'Vaaleanpunainen',
                        'green' => 'Vihreä',
                    ])
                    ->nullable()
                    ->searchable(),

                Select::make('bg_color')
                    ->label('Taustaväri')
                    ->options([
                        'gray' => 'Harmaa',
                        'red' => 'Punainen',
                        'blue' => 'Sininen',
                        'yellow' => 'Keltainen',
                        'orange' => 'Oranssi',
                        'purple' => 'Violetti',
                        'pink' => 'Vaaleanpunainen',
                        'green' => 'Vihreä',
                    ])
                    ->nullable()
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('slug')->sortable()->searchable(),
                TextColumn::make('text_color')->sortable()->searchable(),
                TextColumn::make('bg_color')->sortable()->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
