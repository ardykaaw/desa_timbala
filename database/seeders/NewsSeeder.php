<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsData = [
            [
                'title' => 'Pembangunan Jalan Desa Tahap Dua Dimulai',
                'content' => 'Pemerintah Desa Timbala memulai pembangunan jalan desa tahap dua yang akan menghubungkan dusun Timbala I dengan dusun Timbala II. Pembangunan ini diharapkan dapat meningkatkan aksesibilitas dan konektivitas antar dusun di Desa Timbala. Proyek ini menggunakan dana desa sebesar Rp 500 juta dan diperkirakan selesai dalam waktu 3 bulan.',
                'excerpt' => 'Pembangunan jalan desa tahap dua dimulai untuk meningkatkan aksesibilitas antar dusun.',
                'category' => 'pembangunan',
                'status' => 'published',
                'author' => 'Admin Desa',
                'views' => 245,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Pelatihan Kewirausahaan untuk UMKM Desa Timbala',
                'content' => 'Desa Timbala mengadakan pelatihan kewirausahaan untuk para pelaku UMKM di desa. Pelatihan ini bertujuan untuk meningkatkan kemampuan wirausaha masyarakat dalam mengelola bisnis mereka. Materi pelatihan meliputi manajemen keuangan, pemasaran digital, dan strategi pengembangan bisnis. Pelatihan diikuti oleh 25 peserta dari berbagai sektor UMKM.',
                'excerpt' => 'Pelatihan kewirausahaan untuk meningkatkan kemampuan wirausaha masyarakat desa.',
                'category' => 'kesejahteraan',
                'status' => 'published',
                'author' => 'Admin Desa',
                'views' => 189,
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Penyaluran BLT-DD Tahap Akhir Tahun 2024',
                'content' => 'Pemerintah Desa Timbala menyalurkan Bantuan Langsung Tunai Dana Desa (BLT-DD) tahap akhir tahun 2024 kepada 150 kepala keluarga yang memenuhi kriteria. Bantuan sebesar Rp 300.000 per keluarga ini diharapkan dapat membantu meringankan beban ekonomi masyarakat di masa pandemi. Penyaluran dilakukan secara bertahap dan transparan.',
                'excerpt' => 'Penyaluran BLT-DD tahap akhir tahun 2024 untuk 150 kepala keluarga.',
                'category' => 'kesejahteraan',
                'status' => 'published',
                'author' => 'Admin Desa',
                'views' => 156,
                'published_at' => now()->subDays(15),
            ],
            [
                'title' => 'Festival Panen Jambu Mete Desa Timbala',
                'content' => 'Desa Timbala mengadakan Festival Panen Jambu Mete sebagai upaya promosi produk unggulan desa. Festival ini menampilkan berbagai produk olahan jambu mete dari para petani lokal. Acara dihadiri oleh Bupati Bombana dan pejabat terkait. Festival ini diharapkan dapat meningkatkan nilai jual jambu mete dan mendorong pengembangan industri olahan di desa.',
                'excerpt' => 'Festival Panen Jambu Mete untuk promosi produk unggulan desa.',
                'category' => 'umum',
                'status' => 'published',
                'author' => 'Admin Desa',
                'views' => 312,
                'published_at' => now()->subDays(20),
            ],
            [
                'title' => 'Rapat Koordinasi Bulanan Januari 2024',
                'content' => 'Pemerintah Desa Timbala mengadakan rapat koordinasi bulanan untuk membahas program kerja desa bulan Januari 2024. Rapat dihadiri oleh seluruh perangkat desa dan ketua RT/RW. Agenda utama meliputi evaluasi program bulan sebelumnya, perencanaan program bulan ini, dan koordinasi dengan instansi terkait. Rapat berjalan lancar dan menghasilkan beberapa keputusan penting.',
                'excerpt' => 'Rapat koordinasi bulanan membahas program kerja desa dan evaluasi program.',
                'category' => 'pemerintahan',
                'status' => 'draft',
                'author' => 'Admin Desa',
                'views' => 0,
                'published_at' => null,
            ],
            [
                'title' => 'Pembangunan Posyandu Baru di Dusun Lapri',
                'content' => 'Desa Timbala membangun posyandu baru di Dusun Lapri untuk meningkatkan pelayanan kesehatan masyarakat. Posyandu ini dilengkapi dengan peralatan kesehatan yang memadai dan akan dikelola oleh kader kesehatan terlatih. Pembangunan posyandu ini menggunakan dana desa sebesar Rp 150 juta dan diharapkan dapat melayani 200 balita di dusun tersebut.',
                'excerpt' => 'Pembangunan posyandu baru di Dusun Lapri untuk meningkatkan pelayanan kesehatan.',
                'category' => 'kesejahteraan',
                'status' => 'published',
                'author' => 'Admin Desa',
                'views' => 98,
                'published_at' => now()->subDays(25),
            ],
        ];

        foreach ($newsData as $data) {
            News::create($data);
        }
    }
}