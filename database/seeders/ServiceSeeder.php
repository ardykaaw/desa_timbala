<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'description' => 'Layanan pembuatan dan perpanjangan Kartu Tanda Penduduk untuk warga desa.',
                'category' => 'administrasi',
                'type' => 'offline',
                'icon' => 'id-card',
                'is_active' => true,
                'requirements' => 'Surat pengantar RT/RW, KK asli, Akta kelahiran, Pas foto 3x4 (2 lembar)',
                'procedures' => '1. Datang ke kantor desa dengan membawa persyaratan\n2. Mengisi formulir permohonan\n3. Menyerahkan dokumen persyaratan\n4. Menunggu proses verifikasi\n5. Mengambil KTP yang sudah jadi',
                'processing_days' => 7,
                'fee' => 0
            ],
            [
                'name' => 'Kartu Keluarga (KK)',
                'description' => 'Layanan pembuatan dan perubahan Kartu Keluarga untuk warga desa.',
                'category' => 'administrasi',
                'type' => 'offline',
                'icon' => 'users',
                'is_active' => true,
                'requirements' => 'Surat pengantar RT/RW, KTP semua anggota keluarga, Akta kelahiran anak',
                'procedures' => '1. Datang ke kantor desa dengan membawa persyaratan\n2. Mengisi formulir permohonan\n3. Menyerahkan dokumen persyaratan\n4. Menunggu proses verifikasi\n5. Mengambil KK yang sudah jadi',
                'processing_days' => 5,
                'fee' => 0
            ],
            [
                'name' => 'Akta Kelahiran',
                'description' => 'Layanan pembuatan akta kelahiran untuk bayi yang baru lahir.',
                'category' => 'administrasi',
                'type' => 'offline',
                'icon' => 'baby',
                'is_active' => true,
                'requirements' => 'Surat keterangan lahir dari bidan/dokter, KK orang tua, KTP orang tua',
                'procedures' => '1. Datang ke kantor desa dengan membawa persyaratan\n2. Mengisi formulir permohonan\n3. Menyerahkan dokumen persyaratan\n4. Menunggu proses verifikasi\n5. Mengambil akta kelahiran yang sudah jadi',
                'processing_days' => 3,
                'fee' => 0
            ],
            [
                'name' => 'Surat Keterangan Domisili',
                'description' => 'Layanan pembuatan surat keterangan domisili untuk keperluan administrasi.',
                'category' => 'administrasi',
                'type' => 'online',
                'icon' => 'home',
                'is_active' => true,
                'requirements' => 'KTP asli, KK asli, Surat pengantar RT/RW',
                'procedures' => '1. Mengisi formulir online\n2. Upload dokumen persyaratan\n3. Menunggu proses verifikasi\n4. Download surat keterangan yang sudah jadi',
                'processing_days' => 1,
                'fee' => 0
            ],
            [
                'name' => 'Surat Keterangan Tidak Mampu',
                'description' => 'Layanan pembuatan surat keterangan tidak mampu untuk keperluan bantuan sosial.',
                'category' => 'sosial',
                'type' => 'offline',
                'icon' => 'hand-holding-heart',
                'is_active' => true,
                'requirements' => 'KTP asli, KK asli, Surat pengantar RT/RW, Surat keterangan penghasilan',
                'procedures' => '1. Datang ke kantor desa dengan membawa persyaratan\n2. Mengisi formulir permohonan\n3. Menyerahkan dokumen persyaratan\n4. Menunggu proses verifikasi\n5. Mengambil surat keterangan yang sudah jadi',
                'processing_days' => 2,
                'fee' => 0
            ],
            [
                'name' => 'Surat Keterangan Usaha',
                'description' => 'Layanan pembuatan surat keterangan usaha untuk keperluan perizinan.',
                'category' => 'ekonomi',
                'type' => 'offline',
                'icon' => 'store',
                'is_active' => true,
                'requirements' => 'KTP asli, KK asli, Surat pengantar RT/RW, Foto usaha',
                'procedures' => '1. Datang ke kantor desa dengan membawa persyaratan\n2. Mengisi formulir permohonan\n3. Menyerahkan dokumen persyaratan\n4. Menunggu proses verifikasi\n5. Mengambil surat keterangan yang sudah jadi',
                'processing_days' => 3,
                'fee' => 0
            ],
            [
                'name' => 'Bantuan Sosial',
                'description' => 'Layanan pendaftaran dan informasi bantuan sosial untuk warga yang membutuhkan.',
                'category' => 'sosial',
                'type' => 'offline',
                'icon' => 'hands-helping',
                'is_active' => true,
                'requirements' => 'KTP asli, KK asli, Surat pengantar RT/RW, Surat keterangan tidak mampu',
                'procedures' => '1. Datang ke kantor desa dengan membawa persyaratan\n2. Mengisi formulir pendaftaran\n3. Menyerahkan dokumen persyaratan\n4. Menunggu proses verifikasi\n5. Mendapatkan informasi bantuan yang tersedia',
                'processing_days' => 5,
                'fee' => 0
            ],
            [
                'name' => 'Pajak Bumi Bangunan (PBB)',
                'description' => 'Layanan pembayaran dan informasi PBB untuk warga desa.',
                'category' => 'pajak',
                'type' => 'online',
                'icon' => 'money-bill-wave',
                'is_active' => true,
                'requirements' => 'KTP asli, SPPT PBB, Bukti pembayaran sebelumnya',
                'procedures' => '1. Mengisi formulir online\n2. Upload dokumen persyaratan\n3. Melakukan pembayaran\n4. Download bukti pembayaran',
                'processing_days' => 1,
                'fee' => 0
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}