<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $user = auth()->user();

        $statusOptions = [
            'draft' => 'Draft',
            'in_revision' => 'In Revision',
        ];
    
        if ($user && $user->papel == 'admin') {
            $statusOptions['publicado'] = 'Publicado';
        }

        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required()->maxLength(255),
                Forms\Components\TextInput::make('description')->required()->maxLength(255),
                Forms\Components\Textarea::make('body')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('author')
                    ->required()
                    ->maxLength(255)
                    ->default($user->name)
                    ->readonly(),
                Forms\Components\TextInput::make('category')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('tags')
                    ->options([
                        'tag1',
                        'tag2',
                        'tag3'
                    ])
                    ->multiple()
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options($statusOptions)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        $user = auth()->user();

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'in_revision' => 'warning',
                        'publicado' => 'success',
                        default => 'danger'
                    }),
                Tables\Columns\TextColumn::make('author'),
                Tables\Columns\TextColumn::make('category'),
                Tables\Columns\TextColumn::make('likes'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(fn ($record) => $user && ($user->papel == 'admin' || $user->papel == 'autor' && $record->status === 'draft')),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        
        $query = static::getModel()::query();
        $user = auth()->user();

        if ($user && $user->papel == 'autor') {
            $query->where('author', $user->name);
        }
        
        if (
            static::isScopedToTenant() &&
            ($tenant = Filament::getTenant())
        ) {
            static::scopeEloquentQueryToTenant($query, $tenant);
        }

        return $query;
    }
}
