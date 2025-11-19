<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TataKebaktianResource\Pages;
use App\Models\TataKebaktian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class TataKebaktianResource extends Resource
{
    protected static ?string $model = TataKebaktian::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationLabel = 'Tata Kebaktian';

    protected static ?string $modelLabel = 'Tata Kebaktian';

    protected static ?string $pluralModelLabel = 'Tata Kebaktian';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Tata Kebaktian')
                    ->schema([
                        Forms\Components\Select::make('model')
                            ->label('Model Kebaktian')
                            ->options([
                                'A' => 'Model A',
                                'B' => 'Model B',
                                'C' => 'Model C',
                                'D' => 'Model D',
                                'E' => 'Model E',
                            ])
                            ->required()
                            ->native(false)
                            ->searchable(),

                        Forms\Components\TextInput::make('judul')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Tata Ibadah Minggu I'),

                        Forms\Components\RichEditor::make('isi')
                            ->label('Isi Liturgi')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'link',
                                'heading',
                                'bulletList',
                                'orderedList',
                                'blockquote',
                                'codeBlock',
                                'undo',
                                'redo',
                            ]),

                        Forms\Components\FileUpload::make('file_pdf')
                            ->label('File PDF (Opsional)')
                            ->disk('public')
                            ->directory('tata-kebaktian')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(5120) // 5MB
                            ->downloadable()
                            ->openable()
                            ->helperText('Upload file PDF liturgi (maksimal 5MB)'),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('model')
                    ->label('Model')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'A' => 'success',
                        'B' => 'info',
                        'C' => 'warning',
                        'D' => 'danger',
                        'E' => 'gray',
                        default => 'gray',
                    })
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->wrap(),

                Tables\Columns\TextColumn::make('file_pdf')
                    ->label('PDF')
                    ->formatStateUsing(function ($state, $record) {
                        if ($state) {
                            $url = asset('storage/' . $state);
                            return new HtmlString(
                                '<a href="' . $url . '" target="_blank" class="text-primary-600 hover:text-primary-700 underline flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                    Download
                                </a>'
                            );
                        }
                        return new HtmlString('<span class="text-gray-400">-</span>');
                    })
                    ->html(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('model')
                    ->label('Filter Model')
                    ->options([
                        'A' => 'Model A',
                        'B' => 'Model B',
                        'C' => 'Model C',
                        'D' => 'Model D',
                        'E' => 'Model E',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListTataKebaktians::route('/'),
            'create' => Pages\CreateTataKebaktian::route('/create'),
            'edit' => Pages\EditTataKebaktian::route('/{record}/edit'),
        ];
    }
}