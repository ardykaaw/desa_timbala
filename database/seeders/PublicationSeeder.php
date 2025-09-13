<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publication;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $publications = [
            [
                'title' => 'APBDES Tahun Anggaran 2024',
                'description' => 'Anggaran Pendapatan dan Belanja Desa Timbala Tahun Anggaran 2024 mencakup pendapatan desa, belanja desa, dan pembiayaan desa. Total anggaran Rp 1.500.000.000 dengan rincian belanja pembangunan 40%, belanja operasional 35%, dan belanja tak terduga 25%.',
                'type' => 'dokumen',
                'file_name' => 'APBDES_2024.pdf',
                'file_size' => '2621440', // 2.5 MB
                'file_type' => 'application/pdf',
                'category' => 'peraturan',
                'author' => 'Badan Perencanaan Desa',
                'published_date' => '2023-12-20',
                'is_active' => true,
                'downloads' => 45
            ],
            [
                'title' => 'RPJMDES 2021-2026',
                'description' => 'Rencana Pembangunan Jangka Menengah Desa Timbala periode 2021-2026 memuat visi, misi, tujuan, sasaran, strategi, dan kebijakan pembangunan desa untuk 5 tahun ke depan.',
                'type' => 'dokumen',
                'file_name' => 'RPJMDES_2021_2026.pdf',
                'file_size' => '3355443', // 3.2 MB
                'file_type' => 'application/pdf',
                'category' => 'peraturan',
                'author' => 'Badan Perencanaan Desa',
                'published_date' => '2021-01-10',
                'is_active' => true,
                'downloads' => 32
            ],
            [
                'title' => 'Laporan Realisasi APBDES Semester I 2024',
                'description' => 'Laporan realisasi pelaksanaan APBDES Desa Timbala semester I tahun 2024 yang mencakup capaian fisik dan keuangan.',
                'type' => 'dokumen',
                'file_name' => 'Laporan_Realisasi_APBDES_Semester_I_2024.pdf',
                'file_size' => '1572864', // 1.5 MB
                'file_type' => 'application/pdf',
                'category' => 'laporan',
                'author' => 'Bendahara Desa',
                'published_date' => '2024-07-15',
                'is_active' => true,
                'downloads' => 28
            ],
            [
                'title' => 'Video Profil Desa Timbala',
                'description' => 'Video profil Desa Timbala yang menampilkan potensi desa, budaya, dan pembangunan yang telah dicapai.',
                'type' => 'video',
                'file_name' => 'Profil_Desa_Timbala.mp4',
                'file_size' => '52428800', // 50 MB
                'file_type' => 'video/mp4',
                'category' => 'lainnya',
                'author' => 'Tim Dokumentasi Desa',
                'published_date' => '2024-08-01',
                'is_active' => true,
                'downloads' => 156
            ],
            [
                'title' => 'Galeri Foto Kegiatan Desa',
                'description' => 'Koleksi foto-foto kegiatan pembangunan dan sosial kemasyarakatan di Desa Timbala.',
                'type' => 'gambar',
                'file_name' => 'Galeri_Kegiatan_Desa.zip',
                'file_size' => '10485760', // 10 MB
                'file_type' => 'application/zip',
                'category' => 'lainnya',
                'author' => 'Tim Dokumentasi Desa',
                'published_date' => '2024-09-01',
                'is_active' => true,
                'downloads' => 89
            ],
            [
                'title' => 'Peraturan Desa tentang Tata Tertib Desa',
                'description' => 'Peraturan Desa Timbala tentang tata tertib dan ketentuan yang berlaku di wilayah desa.',
                'type' => 'dokumen',
                'file_name' => 'Perdes_Tata_Tertib_Desa.pdf',
                'file_size' => '1048576', // 1 MB
                'file_type' => 'application/pdf',
                'category' => 'peraturan',
                'author' => 'Kepala Desa',
                'published_date' => '2024-01-15',
                'is_active' => true,
                'downloads' => 67
            ]
        ];

        foreach ($publications as $publication) {
            // Add file_path for each publication
            $publication['file_path'] = 'publications/' . $publication['file_name'];
            Publication::create($publication);
        }
    }
}