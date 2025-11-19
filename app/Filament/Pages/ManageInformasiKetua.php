<?php

namespace App\Filament\Pages;

use App\Models\InformasiKetua;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManageInformasiKetua extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $navigationLabel = 'Informasi Ketua';

    protected static ?string $title = 'Informasi Ketua Ranting';

    protected static string $view = 'filament.pages.manage-informasi-ketua';

    protected static ?int $navigationSort = 3;

    public ?array $data = [];

    public function mount(): void
    {
        // Ambil atau buat record jika belum ada
        $record = InformasiKetua::getRecord();
        
        $this->form->fill([
            'nama' => $record->nama,
            'foto' => $record->foto,
            'umur' => $record->umur,
            'deskripsi' => $record->deskripsi,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Ketua Ranting')
                    ->description('Kelola informasi ketua ranting (hanya 1 data)')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('nama')
                                    ->label('Nama Lengkap')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('Contoh: John Doe'),

                                Forms\Components\TextInput::make('umur')
                                    ->label('Umur')
                                    ->required()
                                    ->numeric()
                                    ->minValue(1)
                                    ->maxValue(120)
                                    ->suffix('tahun')
                                    ->placeholder('25'),
                            ]),

                        Forms\Components\FileUpload::make('foto')
                            ->label('Foto Ketua')
                            ->image()
                            ->disk('public')
                            ->directory('ketua-ranting')
                            ->maxSize(2048) // 2MB
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '1:1',
                                '4:3',
                                '16:9',
                            ])
                            ->downloadable()
                            ->openable()
                            ->helperText('Upload foto ketua ranting (maksimal 2MB)'),

                        Forms\Components\RichEditor::make('deskripsi')
                            ->label('Deskripsi')
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
                                'undo',
                                'redo',
                            ])
                            ->placeholder('Tulis deskripsi singkat tentang ketua ranting...'),
                    ])
                    ->columns(1),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan Perubahan')
                ->color('primary')
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $record = InformasiKetua::first();

        if ($record) {
            $record->update($data);
        } else {
            InformasiKetua::create($data);
        }

        Notification::make()
            ->success()
            ->title('Berhasil Disimpan')
            ->body('Informasi Ketua Ranting telah diperbarui.')
            ->send();
    }
}