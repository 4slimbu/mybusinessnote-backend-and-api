<?php

use Illuminate\Database\Seeder;

class AffiliateLinksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('affiliate_links')->delete();
        
        \DB::table('affiliate_links')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 4,
                'name' => 'domain',
                'description' => 'Register domain here',
                'link' => 'https://godaddy.com/register',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 4,
                'name' => 'hosting',
                'description' => 'Host your domain',
                'link' => 'https://godaddy.com/hosting',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 5,
                'name' => 'logo',
                'description' => 'Create quick logo with us',
                'link' => 'https://logomaker.com/create/logo',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 5,
                'name' => 'branding',
                'description' => 'Extensive branding with logo designing',
                'link' => 'https://logomaker.com/branding',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 9,
                'name' => 'business register',
                'description' => 'register your business with australian government',
                'link' => 'https://ausbusiness.com/register',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 4,
                'name' => 'email setup',
                'description' => 'email setup',
                'link' => 'https://setupemail.com',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 5,
                'name' => 'Prosacco, Kreiger and O\'Hara',
                'description' => 'Id itaque aperiam ut.',
                'link' => 'http://collier.com/dignissimos-consequatur-placeat-rem-unde-amet.html',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 5,
                'name' => 'Stehr, Cummerata and Schoen',
                'description' => 'Perferendis fuga non ex dolorem ut.',
                'link' => 'http://www.dubuque.com/nesciunt-sit-quod-aut-perspiciatis-pariatur-est-porro',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 4,
                'name' => 'Marvin-Bernhard',
                'description' => 'Nulla dicta quia vitae accusantium corporis adipisci sed odio.',
                'link' => 'http://brekke.com/est-sint-est-reprehenderit-ullam-beatae-corporis-qui-quo.html',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 4,
                'name' => 'Homenick Ltd',
                'description' => 'Sed similique earum sed labore.',
                'link' => 'http://stracke.org/quidem-et-non-laborum-et-odio-ut-cum',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            10 => 
            array (
                'id' => 11,
                'user_id' => 5,
                'name' => 'Bashirian, Roberts and Marks',
                'description' => 'Quod sunt veniam voluptatem pariatur doloribus aut.',
                'link' => 'http://terry.biz/',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            11 => 
            array (
                'id' => 12,
                'user_id' => 4,
                'name' => 'Rice Inc',
                'description' => 'Ut rem eius aperiam natus aliquam nisi ea.',
                'link' => 'https://sanford.com/aliquam-et-deleniti-eligendi-recusandae.html',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            12 => 
            array (
                'id' => 13,
                'user_id' => 4,
                'name' => 'Mohr-Terry',
                'description' => 'Atque commodi magnam magni velit non et sit.',
                'link' => 'http://mohr.com/dolorum-ratione-mollitia-aut',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            13 => 
            array (
                'id' => 14,
                'user_id' => 4,
                'name' => 'Leuschke Group',
                'description' => 'Nulla fugit sint dolorem voluptatem officiis est sint.',
                'link' => 'http://www.jerde.com/',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            14 => 
            array (
                'id' => 15,
                'user_id' => 4,
                'name' => 'Gerhold-Kuhn',
                'description' => 'Eum voluptas dolor consequatur qui cum debitis saepe.',
                'link' => 'http://lesch.com/voluptatibus-mollitia-dolor-voluptatem',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            15 => 
            array (
                'id' => 16,
                'user_id' => 9,
                'name' => 'Johnston-Nitzsche',
                'description' => 'Est ducimus fuga maiores reiciendis.',
                'link' => 'https://jacobson.info/neque-ea-deserunt-est-excepturi-blanditiis-unde.html',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            16 => 
            array (
                'id' => 17,
                'user_id' => 5,
                'name' => 'Kemmer PLC',
                'description' => 'Quis hic quis debitis ullam aut eveniet omnis.',
                'link' => 'https://kutch.com/magnam-sint-voluptas-facere-sint.html',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            17 => 
            array (
                'id' => 18,
                'user_id' => 5,
                'name' => 'Mayer, Metz and Murray',
                'description' => 'Debitis nemo perspiciatis laudantium ullam quo.',
                'link' => 'https://quitzon.biz/unde-quaerat-cupiditate-quam-dolorem-tempore.html',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            18 => 
            array (
                'id' => 19,
                'user_id' => 9,
                'name' => 'Nicolas PLC',
                'description' => 'Fugit fuga doloremque dolor atque accusamus.',
                'link' => 'http://www.rice.com/quo-nisi-harum-unde-porro-soluta-atque.html',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            19 => 
            array (
                'id' => 20,
                'user_id' => 4,
                'name' => 'Little, Lang and Abbott',
                'description' => 'Consequatur repudiandae dolores laudantium esse quo aut.',
                'link' => 'http://www.gottlieb.com/voluptatem-est-vero-est-qui-esse-rerum-consequuntur.html',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            20 => 
            array (
                'id' => 21,
                'user_id' => 5,
                'name' => 'Hackett-Sanford',
                'description' => 'Quam ipsum placeat voluptatem.',
                'link' => 'http://pacocha.biz/natus-qui-cupiditate-et-minus-laudantium',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            21 => 
            array (
                'id' => 22,
                'user_id' => 4,
                'name' => 'Jenkins and Sons',
                'description' => 'Voluptas ducimus aut cumque ipsum.',
                'link' => 'http://www.douglas.com/',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            22 => 
            array (
                'id' => 23,
                'user_id' => 4,
                'name' => 'Boyle-Hintz',
                'description' => 'Ea blanditiis vitae eum quibusdam officia.',
                'link' => 'http://mckenzie.com/',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            23 => 
            array (
                'id' => 24,
                'user_id' => 9,
                'name' => 'Koelpin, Brekke and Kuhn',
                'description' => 'Et mollitia modi delectus sed itaque dicta nesciunt.',
                'link' => 'https://www.christiansen.com/aut-sunt-corrupti-labore-temporibus-quia-quidem',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            24 => 
            array (
                'id' => 25,
                'user_id' => 5,
                'name' => 'Bayer-Schaden',
                'description' => 'Atque voluptatibus iusto quis nihil totam et et pariatur.',
                'link' => 'http://www.gusikowski.net/ad-nihil-asperiores-hic-qui-et-et-et',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            25 => 
            array (
                'id' => 26,
                'user_id' => 5,
                'name' => 'Rippin-Watsica',
                'description' => 'Sed et voluptatem quibusdam laudantium impedit.',
                'link' => 'http://www.kuhic.com/',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            26 => 
            array (
                'id' => 27,
                'user_id' => 9,
                'name' => 'Breitenberg-Hand',
                'description' => 'Recusandae facere sint sapiente rerum ut minima dolorem.',
                'link' => 'http://www.wiegand.com/qui-ipsum-sit-dolorem-hic-quis-sed-laboriosam',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            27 => 
            array (
                'id' => 28,
                'user_id' => 5,
                'name' => 'Schuppe Ltd',
                'description' => 'Quaerat eum delectus molestias fuga.',
                'link' => 'http://www.blick.com/mollitia-amet-nulla-magnam-perferendis',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            28 => 
            array (
                'id' => 29,
                'user_id' => 9,
                'name' => 'Schulist and Sons',
                'description' => 'Quia provident dolorem molestiae reiciendis.',
                'link' => 'http://macejkovic.com/non-ut-officiis-consequatur',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            29 => 
            array (
                'id' => 30,
                'user_id' => 4,
                'name' => 'Rowe-Jerde',
                'description' => 'Quod voluptas eveniet sit dicta inventore.',
                'link' => 'https://koch.info/qui-quis-voluptatem-rem-ea-unde-adipisci.html',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
            30 => 
            array (
                'id' => 31,
                'user_id' => 5,
                'name' => 'Wisoky and Sons',
                'description' => 'Maiores nesciunt culpa veniam.',
                'link' => 'http://www.monahan.com/',
                'created_at' => '2018-01-22 08:25:43',
                'updated_at' => '2018-01-22 08:25:43',
            ),
        ));
        
        
    }
}