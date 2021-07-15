<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sections')->delete();
        
        \DB::table('sections')->insert(array (
            0 => 
            array (
                'id' => 1,
                'level_id' => 1,
                'name' => 'Business Category',
                'slug' => 'business-category',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'icon' => 'business-category.png',
                'hover_icon' => 'business-category.png',
                'tooltip_title' => '',
                'tooltip' => '<p>Business Category tool tip</p>',
                'show_landing_page' => 0,
                'template' => 'default',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => '2018-01-24 08:58:21',
            ),
            1 => 
            array (
                'id' => 2,
                'level_id' => 1,
                'name' => 'About You',
                'slug' => 'about-you',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'icon' => 'about-you.png',
                'hover_icon' => 'about-you.png',
                'tooltip_title' => '',
                'tooltip' => '<p>About You</p>',
                'show_landing_page' => 0,
                'template' => 'default',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => '2018-01-24 08:58:30',
            ),
            2 => 
            array (
                'id' => 3,
                'level_id' => 1,
                'name' => 'Your Business Details',
                'slug' => 'your-business-details',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'icon' => 'your-business-details.png',
                'hover_icon' => 'your-business-details.png',
                'tooltip_title' => '',
                'tooltip' => 'Your Business Details',
                'show_landing_page' => 0,
                'template' => 'default',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'level_id' => 1,
                'name' => 'Register Your Business',
                'slug' => 'register-your-business',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'icon' => 'register-your-business.png',
                'hover_icon' => 'register-your-business.png',
                'tooltip_title' => '',
                'tooltip' => 'Register Your Business',
                'show_landing_page' => 0,
                'template' => 'default',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'level_id' => 2,
                'name' => 'Marketing',
                'slug' => 'marketing',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'icon' => '2sR34tKvRFDOeGp22uyXD6RqGoY0wJwA.png',
                'hover_icon' => '3RSeAfRrPTXaUxebGc3PZWlpupJyIR1h.png',
                'tooltip_title' => 'Marketing',
                'tooltip' => '<div id="i4c-draggable-container" style="position: fixed; z-index: 1499; width: 0px; height: 0px;">
<div class="resolved" style="all: initial;" data-reactroot="">&nbsp;</div>
</div>
<p><span style="font-weight: 400;">Marketing success is about finding the right customers and making repeat sales for your business. Thanks to available digital tools, small businesses now have access to reach new audiences, especially using online platforms.</span></p>
<p><span style="font-weight: 400;">Below are some basics on how to implement your branding strategy using social media, business website and the old-school business card.</span></p>
<div id="i4c-dialogs-container">&nbsp;</div>
<div id="i4c-dialogs-container">&nbsp;</div>',
                'show_landing_page' => 1,
                'template' => 'default',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => '2021-07-15 09:16:48',
            ),
            5 => 
            array (
                'id' => 6,
                'level_id' => 2,
                'name' => 'Finance',
                'slug' => 'finance',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'icon' => 'gaacVnfq6JMZiHOXkGdn9InMFLLL0vOC.png',
                'hover_icon' => 'vCpR1kjkausCKJ5fhsepRK4XnQvHR6nq.png',
                'tooltip_title' => 'Finance',
                'tooltip' => '<div id="i4c-draggable-container" style="position: fixed; z-index: 1499; width: 0px; height: 0px;">
<div class="resolved" style="all: initial;" data-reactroot="">&nbsp;</div>
</div>
<p><span style="font-weight: 400;">Understanding your finances is the third pillar in growing your business. Maintaining positive cashflow requires basic money management skills and financial planning to balance your revenues, debt and expenses.</span></p>
<p><span style="font-weight: 400;">Make sure to get these three key numbers every month to get clarity, confidence and control of your finances:</span></p>
<ul>
<li><strong>Year to date net profit variance: </strong><span style="font-weight: 400;">difference between how much money you have actually made (after all of your expenses) and how much you expected to be making (after all of your expenses) by this time of the year</span></li>
<li><strong>Bank balance projections over the next three months: </strong><span style="font-weight: 400;">when actual cash comes in and out of your bank account</span></li>
</ul>
<p><strong>YTD gross profit margin by product/service: </strong><span style="font-weight: 400;">how much it costs for you to earn money.</span></p>
<div id="i4c-dialogs-container">&nbsp;</div>
<div id="i4c-dialogs-container">&nbsp;</div>',
                'show_landing_page' => 1,
                'template' => 'default',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => '2021-07-15 09:17:05',
            ),
            6 => 
            array (
                'id' => 7,
                'level_id' => 2,
                'name' => 'Operations',
                'slug' => 'operations',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'icon' => 'lBCcxkBNwYHHMdVNxvArWUOy4TgiMv6g.png',
                'hover_icon' => '3vU2KHfjZPJLAGH0SZD1SClOvmpu7QH5.png',
                'tooltip_title' => 'Operations',
                'tooltip' => '<div id="i4c-draggable-container" style="position: fixed; z-index: 1499; width: 0px; height: 0px;">
<div class="resolved" style="all: initial;" data-reactroot="">&nbsp;</div>
</div>
<p><span style="font-weight: 400;">Setting up your office, whether at home, a co-working space or a leased unit is essential to manage your small business operations. At the minimum, it should provide you with communications equipment and Internet to manage your daily tasks. Storage for your working documents and products is another consideration. If you require meeting with clients, be sure your office is accessible and has a waiting room for guests.</span></p>
<div id="i4c-dialogs-container">&nbsp;</div>
<div id="i4c-dialogs-container">&nbsp;</div>',
                'show_landing_page' => 1,
                'template' => 'default',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => '2021-07-15 09:17:17',
            ),
            7 => 
            array (
                'id' => 8,
                'level_id' => 3,
                'name' => 'Marketing',
                'slug' => 'marketing',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'icon' => 'lldM7uK2NpqmgkueEDc7qdXz8rxJOPl3.png',
                'hover_icon' => 'lldM7uK2NpqmgkueEDc7qdXz8rxJOPl3.png',
                'tooltip_title' => '',
                'tooltip' => '<p>Marketing</p>',
                'show_landing_page' => 1,
                'template' => 'default',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => '2018-01-24 08:59:33',
            ),
            8 => 
            array (
                'id' => 9,
                'level_id' => 3,
                'name' => 'Legal',
                'slug' => 'legal',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'icon' => 'mfQcol29DuQqEsbTeQNz5QfQb6Cla2Ln.png',
                'hover_icon' => 'mfQcol29DuQqEsbTeQNz5QfQb6Cla2Ln.png',
                'tooltip_title' => '',
                'tooltip' => '<p>Legal</p>',
                'show_landing_page' => 1,
                'template' => 'default',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => '2018-01-24 08:59:43',
            ),
            9 => 
            array (
                'id' => 10,
                'level_id' => 3,
                'name' => 'Human Resources',
                'slug' => 'human-resources',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'icon' => '0EZ6iuduiQjQag0mKeEzM9pAVfTXirUJ.png',
                'hover_icon' => '0EZ6iuduiQjQag0mKeEzM9pAVfTXirUJ.png',
                'tooltip_title' => '',
                'tooltip' => '<p>Human Resources</p>',
                'show_landing_page' => 1,
                'template' => 'default',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => '2018-01-24 08:59:53',
            ),
            10 => 
            array (
                'id' => 11,
                'level_id' => 3,
                'name' => 'Finance',
                'slug' => 'finance',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'icon' => 'KNnol52Txhd1GRPprQ7vvFZ7VWRL3fJM.png',
                'hover_icon' => 'KNnol52Txhd1GRPprQ7vvFZ7VWRL3fJM.png',
                'tooltip_title' => '',
                'tooltip' => '<p>Finance</p>',
                'show_landing_page' => 1,
                'template' => 'default',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => '2018-01-24 09:00:03',
            ),
            11 => 
            array (
                'id' => 12,
                'level_id' => 3,
                'name' => 'Operations',
                'slug' => 'operations',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
                'hover_icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
                'tooltip_title' => '',
                'tooltip' => '<p>Operations</p>',
                'show_landing_page' => 1,
                'template' => 'default',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => '2018-01-24 09:00:13',
            ),
        ));
        
        
    }
}