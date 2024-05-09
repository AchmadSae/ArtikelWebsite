<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ArtikelMigration extends Migration
{
    public function up()
    {
        //create table
        $fields = [
            'id_artikel' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true,
                'not null' => true

            ],
            'requester' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'not null' => true
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'not null' => true
            ],
            'contents' => [
                'type' => 'TEXT',
            ],
            'main_img' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'img1' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'img2' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'img3' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'img4' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'dictionary' => [
                'type' => 'TEXT',
            ],
            'isLaunch' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
            ],
            ['created_at' => 'time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'],
            ['updated_at' => 'time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id_artikel', true);
        $this->forge->createTable('artikel', true);


        $data = array(
            'id_artikel' => 'manchaster_blue_best_serve',
            'requester' => 'KaSae',
            'title' => 'Manchaster Blue Best Serve',
            'contents' => 'Luton - Erling Haaland dan Kevin De Bruyne menjadi bintang kemenangan Manchester City atas Luton Town di Piala FA. Keduanya menyumbang banyak gol dan assist.
                                City menggilas Luton Town 6-2 di Keniltown Road, Rabu (28/2/2024) dini hari WIB, pada babak kelima Piala FA 2023/2024. Haaland menjadi bintang dengan menyumbang lima gol, dengan satu gol lainnya disumbang Mateo Kovacic.
                                Haaland berturut-turut menyumbang lima gol pertama City, di menit ke-3, 18, 40, 56, dan 58. Menariknya, empat gol di antarnya dicetak berkat assist De Bruyne.
                                Baca artikel sepakbola, "De Bruyne Pelayan Setia Haaland" selengkapnya https://sport.detik.com/sepakbola/liga-inggris/d-7215396/de-bruyne-pelayan-setia-haaland.
                                Download Apps Detikcom Sekarang https://apps.detik.com/detik/
                                De Bruyne menjadi pelayan bagi rekannya mencetak empat gol di laga itu. Sementara dua assist lainnya dibuat Bernardo Silva dan John Stones.Bagi De Bruyne, gelandang 32 tahun itu juga sudah membuat 11 assist sejauh ini. Padahal, eks pemain Chelsea, Wolfsburg, dan Werder Bremen itu baru bermain 12 kali.
                                Tiga assist ke Haaland di laga ini menjadikan De Bruyne sebagai pemain Premier League kedua yang melakukannya, setelah Diogo Jota untuk Mohamed Salah saat Liverpool mengalahkan Rangers 7-0 di Liga Champions musim lalu.
                                Performa gila Haaland dan De Bruyne dikomentari Pep Guardiola. Sang manajer menyebut kedua pemain memang saling membutuhkan.
                                "Saya pikir Erling membutuhkan pria dengan visi, kualitas, dan kemurahan hati. Kevin adalah pemain yang tidak terlalu egois di depan gawang, dan jika dia bisa membantunya mencetak gol lagi, dia akan melakukannya," kata Guardiola, di situs resmi klub.
                                "Dan Kevin membutuhkan pergerakan dari Erling tapi tentu saja kami tahu betapa agresifnya mereka. Stefan [Ortega Moreno] juga luar biasa dengan umpan-umpan panjangnya, tidak hanya untuk Erling, kepada para pemain di antaranya.
                                "Sebisa mungkin kami membuat setiap pemain melakukan tiga atau empat sentuhan, dan kami dapat melakukan umpan ekstra serta menggerakkan struktur yang mereka miliki dan mereka melakukannya dengan sangat baik," ungkap Guardiola.
                                Baca artikel sepakbola, "De Bruyne Pelayan Setia Haaland" selengkapnya https://sport.detik.com/sepakbola/liga-inggris/d-7215396/de-bruyne-pelayan-setia-haaland.
                                Download Apps Detikcom Sekarang https://apps.detik.com/detik/',
            'main_img' => 'img/artikel/city-logo.jpg',
            'img1' => 'img/artikel/champion.jpg',
            'img2' => 'img/artikel/compact.jpg',
            'img3' => 'img/artikel/de-bruyne-pelayan-haland-image1.jpg',
            'img4' => 'img/artikel/de-bruyne-pelayan-haland-image-header.jpg',
            'dictionary' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed felis vitae nisl congue fringilla.
                            Aliquam erat volutpat. Ut vehicula velit nec ex aliquet, eget rhoncus nisi aliquet.
                            Integer a ipsum sit amet metus feugiat cursus. Nulla facilisi.'
        );
        $this->db->table('artikel')->insertBatch($data);
    }

    public function down()
    {
        //
    }
}
