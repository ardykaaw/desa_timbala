<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Kartu Tanda Penduduk (KTP)',
                'description' => 'Pembuatan dan perpanjangan Kartu Tanda Penduduk untuk warga Desa Timbala',
                'category' => 'kependudukan',
                'type' => 'online',
                'icon' => 'id-card',
                'requirements' => 'Fotokopi KK, Pas foto 3x4 (2 lembar), Surat pengantar RT/RW',
                'procedures' => '1. Mengisi form pengajuan online\n2. Upload dokumen persyaratan\n3. Menunggu verifikasi admin\n4. Mengambil KTP di kantor desa',
                'processing_days' => 3,
                'fee' => 0,
                'is_active' => true
            ],
            [
                'name' => 'Kartu Keluarga (KK)',
                'description' => 'Pembuatan dan perubahan Kartu Keluarga untuk keluarga di Desa Timbala',
                'category' => 'kependudukan',
                'type' => 'online',
                'icon' => 'home',
                'requirements' => 'Fotokopi KTP kepala keluarga, Surat pengantar RT/RW, Surat keterangan domisili',
                'procedures' => '1. Mengisi form pengajuan online\n2. Upload dokumen persyaratan\n3. Verifikasi data keluarga\n4. Mengambil KK di kantor desa',
                'processing_days' => 5,
                'fee' => 0,
                'is_active' => true
            ],
            [
                'name' => 'Surat Keterangan Domisili',
                'description' => 'Pembuatan surat keterangan domisili untuk keperluan administrasi',
                'category' => 'administrasi',
                'type' => 'online',
                'icon' => 'file-alt',
                'requirements' => 'Fotokopi KTP, Fotokopi KK, Surat pengantar RT/RW',
                'procedures' => '1. Mengisi form pengajuan online\n2. Upload dokumen persyaratan\n3. Verifikasi data domisili\n4. Mengambil surat di kantor desa',
                'processing_days' => 2,
                'fee' => 0,
                'is_active' => true
            ],
            [
                'name' => 'Surat Keterangan Usaha',
                'description' => 'Pembuatan surat keterangan usaha untuk keperluan perizinan',
                'category' => 'administrasi',
                'type' => 'online',
                'icon' => 'briefcase',
                'requirements' => 'Fotokopi KTP, Fotokopi KK, Surat pengantar RT/RW, Bukti usaha',
                'procedures' => '1. Mengisi form pengajuan online\n2. Upload dokumen persyaratan\n3. Verifikasi lokasi usaha\n4. Mengambil surat di kantor desa',
                'processing_days' => 3,
                'fee' => 0,
                'is_active' => true
            ],
            [
                'name' => 'Surat Keterangan Belum Menikah',
                'description' => 'Pembuatan surat keterangan belum menikah untuk keperluan administrasi',
                'category' => 'administrasi',
                'type' => 'online',
                'icon' => 'heart',
                'requirements' => 'Fotokopi KTP, Fotokopi KK, Surat pengantar RT/RW',
                'procedures' => '1. Mengisi form pengajuan online\n2. Upload dokumen persyaratan\n3. Verifikasi status pernikahan\n4. Mengambil surat di kantor desa',
                'processing_days' => 2,
                'fee' => 0,
                'is_active' => true
            ],
            [
                'name' => 'Surat Keterangan Penghasilan',
                'description' => 'Pembuatan surat keterangan penghasilan untuk keperluan administrasi',
                'category' => 'administrasi',
                'type' => 'online',
                'icon' => 'money-bill-wave',
                'requirements' => 'Fotokopi KTP, Fotokopi KK, Surat pengantar RT/RW, Bukti penghasilan',
                'procedures' => '1. Mengisi form pengajuan online\n2. Upload dokumen persyaratan\n3. Verifikasi data penghasilan\n4. Mengambil surat di kantor desa',
                'processing_days' => 3,
                'fee' => 0,
                'is_active' => true
            ],
            [
                'name' => 'Surat Izin Keramaian',
                'description' => 'Pembuatan surat izin keramaian untuk acara dan kegiatan',
                'category' => 'administrasi',
                'type' => 'offline',
                'icon' => 'users',
                'requirements' => 'Fotokopi KTP, Surat pengantar RT/RW, Proposal acara, Surat pernyataan',
                'procedures' => '1. Mengajukan permohonan ke kantor desa\n2. Melengkapi dokumen persyaratan\n3. Verifikasi lokasi dan waktu acara\n4. Mengambil surat izin di kantor desa',
                'processing_days' => 5,
                'fee' => 0,
                'is_active' => true
            ],
            [
                'name' => 'Surat Izin Bepergian',
                'description' => 'Pembuatan surat izin bepergian untuk keperluan perjalanan',
                'category' => 'administrasi',
                'type' => 'online',
                'icon' => 'plane',
                'requirements' => 'Fotokopi KTP, Fotokopi KK, Surat pengantar RT/RW, Tujuan perjalanan',
                'procedures' => '1. Mengisi form pengajuan online\n2. Upload dokumen persyaratan\n3. Verifikasi tujuan perjalanan\n4. Mengambil surat di kantor desa',
                'processing_days' => 2,
                'fee' => 0,
                'is_active' => true
            ],
            [
                'name' => 'Surat Keterangan Tidak Mampu',
                'description' => 'Pembuatan surat keterangan tidak mampu untuk keperluan bantuan sosial',
                'category' => 'administrasi',
                'type' => 'offline',
                'icon' => 'hand-holding-heart',
                'requirements' => 'Fotokopi KTP, Fotokopi KK, Surat pengantar RT/RW, Surat keterangan penghasilan',
                'procedures' => '1. Mengajukan permohonan ke kantor desa\n2. Melengkapi dokumen persyaratan\n3. Verifikasi kondisi ekonomi keluarga\n4. Mengambil surat di kantor desa',
                'processing_days' => 7,
                'fee' => 0,
                'is_active' => true
            ],
            [
                'name' => 'Surat Keterangan Lahir',
                'description' => 'Pembuatan surat keterangan lahir untuk keperluan administrasi',
                'category' => 'kependudukan',
                'type' => 'online',
                'icon' => 'baby',
                'requirements' => 'Fotokopi KTP orang tua, Fotokopi KK, Surat pengantar RT/RW, Akta kelahiran',
                'procedures' => '1. Mengisi form pengajuan online\n2. Upload dokumen persyaratan\n3. Verifikasi data kelahiran\n4. Mengambil surat di kantor desa',
                'processing_days' => 3,
                'fee' => 0,
                'is_active' => true
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}