<?php

namespace App\Filament\Pages;

use App\Models\InformasiSingkat;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManageInformasiSingkat extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationLabel = 'Informasi Singkat';

    protected static ?string $title = 'Informasi Singkat Angkatan Muda';

    protected static string $view = 'filament.pages.manage-informasi-singkat';

    protected static ?int $navigationSort = 2;

    public ?array $data = [];

    public function mount(): void
    {
        // Ambil atau buat record jika belum ada
        $record = InformasiSingkat::getRecord();
        
        $this->form->fill([
            'judul' => $record->judul,
            'deskripsi' => $record->deskripsi,
            'foto' => $record->foto,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Angkatan Muda')
                    ->description('Kelola informasi umum tentang Angkatan Muda (hanya 1 data)')
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Tentang Angkatan Muda'),

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
                                'codeBlock',
                                'undo',
                                'redo',
                            ])
                            ->placeholder('Tulis sejarah, visi-misi, dan narasi deskripsi Angkatan Muda...'),

                        Forms\Components\FileUpload::make('foto')
                            ->label('Foto (Opsional)')
                            ->image()
                            ->disk('public')
                            ->directory('informasi-singkat')
                            ->maxSize(2048) // 2MB
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->downloadable()
                            ->openable()
                            ->helperText('Upload foto untuk informasi Angkatan Muda (maksimal 2MB)'),
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

        $record = InformasiSingkat::first();

        if ($record) {
            $record->update($data);
        } else {
            InformasiSingkat::create($data);
        }

        Notification::make()
            ->success()
            ->title('Berhasil Disimpan')
            ->body('Informasi Singkat Angkatan Muda telah diperbarui.')
            ->send();
    }
}