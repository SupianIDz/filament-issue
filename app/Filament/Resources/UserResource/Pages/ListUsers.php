<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Closure;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function table(Table $table) : Table
    {
        return $table->columns([
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('email')->searchable()->sortable(),
            TextColumn::make('created_at')->searchable()->sortable(),
        ]);
    }

    /**
     * @return Closure|null
     */
    protected function getTableRecordActionUsing() : ?Closure
    {
        return fn() : \Filament\Tables\Actions\Action => \Filament\Tables\Actions\DeleteAction::make();
    }

    protected function getActions() : array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
