<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('levels')->delete();
        
        \DB::table('levels')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Getting Started',
                'slug' => 'getting-started',
                'icon' => 'qQJtdh1JUNZ3F5zIHDoGyhfdWFUHdlgd.png',
                'badge_icon' => 'PzAh8dpz6DuKYUzDao3evUAp4jt3t8mS.png',
                'badge_message' => '
<h1>Congratulations</h1>
<p>Level 1 complete!</p>',
                'content' => '
<p>Let\'s get you started by setting up your account. Click on continue to go through the steps to register as well as to set up your business.</p>',
                'tooltip' => '<p>level one tool tip</p>',
                'created_at' => NULL,
                'updated_at' => '2018-01-24 08:48:03',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Setting the Foundations',
                'slug' => 'setting-the-foundations',
                'icon' => 'oxI7FcevXpBbqMxIly2LJBnIcQGM3jge.png',
                'badge_icon' => 'GXAAfUe5qBIpe0AxakxQcV0GXqIEOwz7.png',
                'badge_message' => '<h1>Congratulation</h1>
<p>Level 2 Completed</p>',
                'content' => '<p>Level 2 content</p>',
                'tooltip' => '<p>Level 2 tool tip</p>',
                'created_at' => NULL,
                'updated_at' => '2018-02-09 08:54:39',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Building up a Business',
                'slug' => 'building-up-a-business',
                'icon' => 'Bk9A87lgogIf8RtFJhQ5pXuXJOCYOJ3c.png',
                'badge_icon' => 'mNLpbzaDNzFuX4kp2vtGsSNufMw7kHdi.png',
                'badge_message' => '<h1>Congratulation</h1>
<p>Level 3 completed</p>',
                'content' => '<p>level 3 content</p>',
                'tooltip' => '<p>level 3 tool tip</p>',
                'created_at' => NULL,
                'updated_at' => '2018-02-09 08:54:23',
            ),
        ));
        
        
    }
}