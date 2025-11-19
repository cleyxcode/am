<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManageSettings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Pengaturan';

    protected static ?string $title = 'Pengaturan Website';

    protected static string $view = 'filament.pages.manage-settings';

    protected static ?int $navigationSort = 99;

    protected static ?string $navigationGroup = 'Pengaturan';

    public ?array $data = [];

    public function mount(): void
    {
        // Ambil atau buat record jika belum ada
        $record = Setting::getRecord();
        
        $this->form->fill([
            'ranting_nama' => $record->ranting_nama,
            'logo' => $record->logo,
            'banner_desa' => $record->banner_desa,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Ranting')
                    ->description('Pengaturan umum website (hanya 1 data)')
                    ->schema([
                        Forms\Components\TextInput::make('ranting_nama')
                            ->label('Nama Ranting')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Angkatan Muda Desa XXX'),

                        Forms\Components\FileUpload::make('logo')
                            ->label('Logo Ranting')
                            ->image()
                            ->disk('public')
                            ->directory('settings')
                            ->maxSize(1024) // 1MB
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '1:1',
                            ])
                            ->downloadable()
                            ->openable()
                            ->helperText('Upload logo ranting (maksimal 1MB, disarankan 1:1)'),

                        Forms\Components\FileUpload::make('banner_desa')
                            ->label('Banner Desa')
                            ->image()
                            ->disk('public')
                            ->directory('settings')
                            ->maxSize(2048) // 2MB
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '21:9',
                            ])
                            ->downloadable()
                            ->openable()
                            ->helperText('Upload banner desa (maksimal 2MB, disarankan 16:9)'),
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

        $record = Setting::first();

        if ($record) {
            $record->update($data);
        } else {
            Setting::create($data);
        }

        Notification::make()
            ->success()
            ->title('Berhasil Disimpan')
            ->body('Pengaturan website telah diperbarui.')
            ->send();
    }
}