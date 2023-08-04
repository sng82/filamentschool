<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                         ->required()
                         ->minLength(3)
                         ->maxLength(255),
                TextInput::make('student_id')
                         ->required()
                         ->maxLength(10),
                TextInput::make('address_1')
                         ->required()
                         ->maxLength(255),
                TextInput::make('address_2')
                         ->maxLength(255),
                Select::make('standard_id')
                      ->required()
                      ->relationship('standard', 'name')
                      ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
//            ->columns([
//                Split::make([
//                    TextColumn::make('name')
//                              ->sortable()
//                              ->searchable(),
//                    TextColumn::make('created_at')
//                              ->dateTime()
//                              ->sortable(),
//                ]),
//                Panel::make([
//                    TextColumn::make('address_1')
//                              ->sortable()
//                              ->searchable(),
//                    TextColumn::make('address_2')
//                              ->sortable()
//                              ->searchable(),
//                ])->collapsed(true),
//
//            ])
            ->columns([
                TextColumn::make('name')
                          ->sortable()
                          ->searchable(),

//                TextColumn::make('address_1')
//                          ->label('Country')
//                          ->sortable()
//                          ->searchable(),
//                TextColumn::make('address_2')
//                          ->sortable()
//                          ->searchable(),
                TextColumn::make('standard.name')
                          ->searchable(),
                TextColumn::make('created_at')
                          ->dateTime()
                          ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([

                // Checkbox to filter 1 specific value
//                Filter::make('Std 1')
//                      ->label('Std 1')
//                      ->query(fn (Builder $query): Builder => $query->where('standard_id', 1)),

                // Select box with only the options I want to make available
//                SelectFilter::make('standard_id')
//                            ->label('Some Standards')
//                            ->options([
//                                1 => 'Standard 1',
//                                2 => 'Standard 2',
//                                3 => 'Standard 3',
//                                4 => 'Standard 4',
//                                5 => 'Standard 5',
//                                6 => 'Standard 6',
//                            ]),

                // Select box with all options
                SelectFilter::make('Standard')
                            ->label('Standard')
                            ->relationship('standard','name')
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
