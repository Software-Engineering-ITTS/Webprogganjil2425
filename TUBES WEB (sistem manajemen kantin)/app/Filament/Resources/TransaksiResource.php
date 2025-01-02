<?php

namespace App\Filament\Resources;

use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Customer;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\TransaksiResource\Pages;
use Filament\Forms\Get;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationGroup = 'Transaksi Makanan';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                // Pilih Customer dari daftar Customer yang ada
                Forms\Components\Select::make('customer_id')
                    ->label('Nama Customer')
                    ->options(Customer::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required()
                    ->reactive() // Menambahkan reactive agar bisa memantau perubahan customer_id
                    ->live()
                    ->afterStateUpdated(function (callable $set, $state) {
                        // Memperbarui nomor telepon setelah memilih customer
                        $customer = Customer::find($state);
                        if ($customer) {
                            $set('phone', $customer->phone); // Set phone sesuai dengan customer yang dipilih
                        }
                    }),

                // Nomor Telepon customer yang akan diupdate otomatis
                Forms\Components\TextInput::make('phone')
                    ->label('Nomor Telepon') // Menonaktifkan field karena akan terupdate otomatis
                    ->required(),

                Select::make('produk_id')
                    ->label('Produk')
                    ->relationship('produk', 'nama')
                    ->options(Produk::all()->pluck('nama', 'id'))
                    ->required()
                    ->searchable()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $produk = Produk::find($state);
                            if ($produk) {
                                $set('total_harga', $produk->harga);
                            }
                        }
                    }),

                TextInput::make('jumlah')
                    ->label('Jumlah')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->reactive()
                    ->rules([
                        'required',
                        'numeric',
                        'min:1',
                        function ($get) {
                            $produkId = $get('produk_id');
                            $produk = Produk::find($produkId);

                            if ($produk) {
                                return function ($attribute, $value, $fail) use ($produk) {
                                    if ($value > $produk->stok) {
                                        $fail("Stok tidak mencukupi. Stok tersedia: {$produk->stok}");
                                    }
                                };
                            }

                            return null;
                        }
                    ])
                    ->afterStateUpdated(function ($state, callable $set, Get $get) {
                        $produkId = $get('produk_id');
                        if ($produkId && $state) {
                            $produk = Produk::find($produkId);
                            if ($produk) {
                                $set('total_harga', $produk->harga * $state);
                            }
                        }
                    }),

                TextInput::make('total_harga')
                    ->label('Total Harga')
                    ->disabled()
                    ->required()
                    ->numeric()
                    ->default(0)
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('customer.name')->label('Nama Customer'),  // Tambahkan ini
                TextColumn::make('phone')->label('No. Telepon'),
                TextColumn::make('produk.nama')->label('Produk'),
                TextColumn::make('jumlah')->label('Jumlah'),
                TextColumn::make('total_harga')->label('Total Harga')->money('IDR'),
                TextColumn::make('created_at')->label('Tanggal Transaksi')->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
        ];
    }
}
