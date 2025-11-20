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
            'facebook' => $record->facebook,
            'instagram' => $record->instagram,
            'whatsapp' => $record->whatsapp,
            'tiktok' => $record->tiktok,
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

                // SECTION SOSIAL MEDIA BARU
                Forms\Components\Section::make('Media Sosial')
                    ->description('Link media sosial untuk ditampilkan di footer website')
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('facebook')
                                    ->label('Facebook')
                                    ->placeholder('https://facebook.com/username')
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-m-globe-alt')
                                    ->helperText('Masukkan URL lengkap Facebook')
                                    ->columnSpan(1),

                                Forms\Components\TextInput::make('instagram')
                                    ->label('Instagram')
                                    ->placeholder('https://instagram.com/username')
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-m-camera')
                                    ->helperText('Masukkan URL lengkap Instagram')
                                    ->columnSpan(1),
                            ])
                            ->columns(2),

                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('whatsapp')
                                    ->label('WhatsApp')
                                    ->placeholder('6281234567890')
                                    ->maxLength(20)
                                    ->prefixIcon('heroicon-m-chat-bubble-left-right')
                                    ->helperText('Masukkan nomor WhatsApp (contoh: 6281234567890)')
                                    ->columnSpan(1),

                                Forms\Components\TextInput::make('tiktok')
                                    ->label('TikTok')
                                    ->placeholder('https://tiktok.com/@username')
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-m-musical-note')
                                    ->helperText('Masukkan URL lengkap TikTok')
                                    ->columnSpan(1),
                            ])
                            ->columns(2),

                        // Preview Sosial Media
                        Forms\Components\Placeholder::make('social_preview')
                            ->label('Preview Media Sosial')
                            ->content(function ($get) {
                                $socials = [];
                                
                                if ($get('facebook')) {
                                    $socials[] = '🔵 Facebook: ' . $get('facebook');
                                }
                                if ($get('instagram')) {
                                    $socials[] = '📷 Instagram: ' . $get('instagram');
                                }
                                if ($get('whatsapp')) {
                                    $socials[] = '💚 WhatsApp: ' . $get('whatsapp');
                                }
                                if ($get('tiktok')) {
                                    $socials[] = '🎵 TikTok: ' . $get('tiktok');
                                }

                                if (empty($socials)) {
                                    return 'Belum ada media sosial yang diatur. Link akan ditampilkan di footer website.';
                                }

                                return implode('\n', $socials);
                            })
                            ->helperText('Preview bagaimana link media sosial akan ditampilkan di website.')
                            ->columnSpanFull(),
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
            ->body('Pengaturan website dan media sosial telah diperbarui.')
            ->send();
    }
}