<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InformasiAMResource\Pages;
use App\Models\InformasiAM;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class InformasiAMResource extends Resource
{
    protected static ?string $model = InformasiAM::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    protected static ?string $navigationLabel = 'Informasi AM';

    protected static ?string $modelLabel = 'Informasi AM';

    protected static ?string $pluralModelLabel = 'Informasi Angkatan Muda';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationGroup = 'Konten';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Utama')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('jenis')
                                    ->label('Jenis Informasi')
                                    ->options([
                                        'pengumuman' => '📢 Pengumuman',
                                        'berita' => '📰 Berita',
                                        'kegiatan' => '📅 Kegiatan',
                                    ])
                                    ->required()
                                    ->native(false)
                                    ->live()
                                    ->helperText('Pilih jenis informasi yang akan dipublikasikan'),

                                Forms\Components\Toggle::make('is_published')
                                    ->label('Publikasikan')
                                    ->default(true)
                                    ->helperText('Aktifkan untuk mempublikasikan informasi ini'),
                            ]),

                        Forms\Components\TextInput::make('judul')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->placeholder('Contoh: Pengumuman Ibadah Minggu Ini'),

                        Forms\Components\Textarea::make('ringkasan')
                            ->label('Ringkasan Singkat')
                            ->maxLength(500)
                            ->rows(3)
                            ->columnSpanFull()
                            ->placeholder('Tulis ringkasan singkat (opsional, max 500 karakter)')
                            ->helperText('Ringkasan akan ditampilkan di preview card'),
                    ]),

                Forms\Components\Section::make('Konten')
                    ->schema([
                        Forms\Components\RichEditor::make('isi')
                            ->label('Isi Konten')
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
                            ])
                            ->placeholder('Tulis konten lengkap di sini...'),
                    ]),

                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\FileUpload::make('banner')
                            ->label('Banner / Header Image')
                            ->image()
                            ->disk('public')
                            ->directory('informasi-am/banners')
                            ->maxSize(5120)
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '21:9',
                                '3:1',
                            ])
                            ->downloadable()
                            ->openable()
                            ->helperText('Upload banner untuk header (maksimal 5MB, rasio 16:9)'),

                        Forms\Components\FileUpload::make('thumbnail')
                            ->label('Thumbnail / Featured Image')
                            ->image()
                            ->disk('public')
                            ->directory('informasi-am/thumbnails')
                            ->maxSize(2048)
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->downloadable()
                            ->openable()
                            ->helperText('Upload thumbnail untuk preview card (maksimal 2MB)'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Detail Kegiatan')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\DatePicker::make('tanggal_kegiatan')
                                    ->label('Tanggal Kegiatan')
                                    ->native(false)
                                    ->displayFormat('d/m/Y')
                                    ->helperText('Khusus untuk jenis kegiatan'),

                                Forms\Components\TextInput::make('lokasi')
                                    ->label('Lokasi Kegiatan')
                                    ->maxLength(255)
                                    ->placeholder('Contoh: Gereja Ranting Razer')
                                    ->helperText('Khusus untuk jenis kegiatan'),
                            ]),
                    ])
                    ->visible(fn (Forms\Get $get) => $get('jenis') === 'kegiatan'),

                Forms\Components\Section::make('Pengaturan Tambahan')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Toggle::make('is_pinned')
                                    ->label('Pin di Atas')
                                    ->helperText('Informasi akan selalu muncul di bagian atas'),

                                Forms\Components\DateTimePicker::make('published_at')
                                    ->label('Tanggal Publikasi')
                                    ->native(false)
                                    ->displayFormat('d/m/Y H:i')
                                    ->helperText('Kosongkan untuk publikasi sekarang'),
                            ]),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->size(60)
                    ->defaultImageUrl(url('/images/default-placeholder.png')),

                Tables\Columns\TextColumn::make('jenis')
                    ->label('Jenis')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pengumuman' => '📢 Pengumuman',
                        'berita' => '📰 Berita',
                        'kegiatan' => '📅 Kegiatan',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'pengumuman' => 'warning',
                        'berita' => 'info',
                        'kegiatan' => 'success',
                        default => 'gray',
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->wrap()
                    ->description(fn (InformasiAM $record): string => $record->excerpt),

                Tables\Columns\TextColumn::make('tanggal_kegiatan')
                    ->label('Tgl Kegiatan')
                    ->date('d M Y')
                    ->sortable()
                    ->toggleable()
                    ->placeholder('-'),

                Tables\Columns\IconColumn::make('is_pinned')
                    ->label('Pin')
                    ->boolean()
                    ->trueIcon('heroicon-o-star')
                    ->falseIcon('heroicon-o-star')
                    ->trueColor('warning')
                    ->falseColor('gray')
                    ->alignCenter(),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean()
                    ->sortable()
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tanggal Publikasi')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('jenis')
                    ->label('Jenis')
                    ->options([
                        'pengumuman' => '📢 Pengumuman',
                        'berita' => '📰 Berita',
                        'kegiatan' => '📅 Kegiatan',
                    ]),

                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Status Publikasi')
                    ->placeholder('Semua')
                    ->trueLabel('Published')
                    ->falseLabel('Draft'),

                Tables\Filters\TernaryFilter::make('is_pinned')
                    ->label('Status Pin')
                    ->placeholder('Semua')
                    ->trueLabel('Pinned')
                    ->falseLabel('Normal'),
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
            ->defaultSort('is_pinned', 'desc')
            ->defaultSort('published_at', 'desc')
            ->emptyStateHeading('Belum ada informasi')
            ->emptyStateDescription('Silakan tambahkan pengumuman, berita, atau kegiatan')
            ->emptyStateIcon('heroicon-o-megaphone');
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
            'index' => Pages\ListInformasiAMS::route('/'),
            'create' => Pages\CreateInformasiAM::route('/create'),
            'edit' => Pages\EditInformasiAM::route('/{record}/edit'),
            'view' => Pages\ViewInformasiAM::route('/{record}'),
        ];
    }
}