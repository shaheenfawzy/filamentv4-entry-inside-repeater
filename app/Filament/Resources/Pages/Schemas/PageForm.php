<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),

                // Entries work fine outside the repeater component
                TextEntry::make('meta_tags.0.name'),
                ImageEntry::make('meta_tags.0.image'),

                Repeater::make('meta_tags')
                    ->columnSpanFull()
                    ->columns(3)
                    ->schema([
                        // Those work
                        // TextInput::make('name'),
                        // TextInput::make('description'),
                        // FileUpload::make('image'),

                        // Those don't
                        TextEntry::make('name'),
                        TextEntry::make('description'),
                        ImageEntry::make('image'),
                    ]),
            ]);
    }
}
