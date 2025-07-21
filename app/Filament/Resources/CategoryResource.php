<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;


class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    //Grouping Menu
    protected static ?string $navigationGroup = "Master Data";

    public static function getNavigationSort(): ?int
    {
    return 1;
    }

    public static function form(Form $form): Form
    {
    return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                    $set('slug', Str::slug($state));
                })
                ->maxLength(255),

            Forms\Components\TextInput::make('slug')
                ->required()
                ->disabled()
                ->unique(ignoreRecord: true)
                ->maxLength(255),

            Forms\Components\FileUpload::make('image')
                ->image()
                ->imagePreviewHeight('150')
                ->required(),
        ]);
    }



    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //Tambah Kolom Untuk Table
                Tables\Columns\ImageColumn::make( 'image')->circular(),
                Tables\Columns\TextColumn::make('name')->searchable(),

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
