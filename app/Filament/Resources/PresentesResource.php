<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PresentesResource\Pages;
use App\Filament\Resources\PresentesResource\RelationManagers;
use App\Models\Presentes;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PresentesResource extends Resource
{
    protected static ?string $model = Presentes::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('nome')->required(),
                        TextInput::make('categoria')->required(),
                        RichEditor::make('descricao')->required(),
                       // FileUpload::make('imagem')->imagem(),
                        //Toggle::make('Cadastrar')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->searchable(),
                TextColumn::make('nome')->limit(20)->sortable()->searchable(),
                TextColumn::make('categoria')->limit(50)->sortable()->searchable(),
                TextColumn::make('descricao')->limit(250)->sortable()->searchable(),
                ImageColumn::make('imagem'),
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
            'index' => Pages\ListPresentes::route('/'),
            'create' => Pages\CreatePresentes::route('/create'),
            'edit' => Pages\EditPresentes::route('/{record}/edit'),
        ];
    }
}
