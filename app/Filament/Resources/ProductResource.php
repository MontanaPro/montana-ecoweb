<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    //Grouping Menu
    protected static ?string $navigationGroup = "Master Data";

    public static function getNavigationSort(): ?int
    {
    return 2;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //Komponen Form Product
                Forms\Components\Card::make()
                ->scheme(components: [
                    Forms\Components\FileUpload::make(name: 'image')
                    ->label(label: 'Upload Gambar Produk')
                    ->placeholder(placeholder: 'Uploads Gambar')
                    ->required(),

                    //Component Input Judul Produk
                    Forms\Components\TextInput::make(name: 'title')
                    ->label(label: 'Ketikkan Nama Produk')
                    ->placeholder(placeholder: 'nama produk')
                    ->required(),

                    //Component Kategori From Relation Table
                    Forms\Components\Grid::make(columns: 'category_id')
                    ->label(label: 'Nama Kategori')
                    ->relationship(name : 'category', condition: 'name')
                    ->require(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
