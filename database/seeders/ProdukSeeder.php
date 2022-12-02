<?php

namespace Database\Seeders;

use App\Models\M_produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        M_produk::create([
            'nama' => 'Bawang Merah Bauji (Siap Konsumi)',
            'harga' => 10000,
            'deskripsi' => 'Bawang merah varietas Bauji merupakan bawang lokal asal kabupaten Nganjuk, disahkan oleh kementrian        pertanian pada tahun 2000 dan menambah deretan varietas bawang yang beredar di Indonesia. Menjadi komoditas sayur unggulan sejak lama, bawang merah sudah lama dibudidayakan secara intensif.',
            'gambar' => 'Bawang Merah Bauji.jpg'
        ]);
        M_produk::create([
            'nama' => 'Bawang Merah Tajuk (Siap Konsumi)',
            'harga' => 20000,
            'deskripsi' => 'Diberi nama tajuk karena merupakan kepanjangan dari tanaman Jawa dari Nganjuk.Varietas Tajuk mempunyai daya adaptasi dengan baik pada musim kemarau dan tahan terhadap musim hujan, sesuai di dataran rendah maupun dataran tinggi. Memiliki aroma yang sangat tajam.',
            'gambar' => 'Bawang Merah Tajuk.jpg'
        ]);
        M_produk::create([
            'nama' => 'Benih Bawang Merah Bauji',
            'harga' => 30000,
            'deskripsi' => 'Benih bawang merah Bauji yang siap ditanam selama ± 52 - 60 hari',
            'gambar' => 'Benih Bawang Merah Bauji.jpg'
        ]);
        M_produk::create([
            'nama' => 'Benih Bawang Merah Tajuk',
            'harga' => 40000,
            'deskripsi' => 'Benih bawang merah Tajuk yang siap ditanam selama ± 60 - 70 hari',
            'gambar' => 'Benih Bawang Merah Tajuk.jpg'
        ]);
    }
}
