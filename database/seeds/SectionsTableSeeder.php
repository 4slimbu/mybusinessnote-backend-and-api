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
					'icon' => 'business-category.png',
					'tooltip' => '<p>Business Category tool tip</p>',
					'show_landing_page' => false,
					'created_at' => NULL,
					'updated_at' => '2018-01-24 08:58:21',
					'tooltip_title' => '',
				),
			1 =>
				array (
					'id' => 2,
					'level_id' => 1,
					'name' => 'About You',
					'slug' => 'about-you',
					'icon' => 'about-you.png',
					'tooltip' => '<p>About You</p>',
					'show_landing_page' => false,
					'created_at' => NULL,
					'updated_at' => '2018-01-24 08:58:30',
					'tooltip_title' => '',
				),
			2 =>
				array (
					'id' => 3,
					'level_id' => 1,
					'name' => 'Your Business Details',
					'slug' => 'your-business-details',
					'icon' => 'your-business-details.png',
					'tooltip' => 'Your Business Details',
					'show_landing_page' => false,
					'created_at' => NULL,
					'updated_at' => NULL,
					'tooltip_title' => '',
				),
			3 =>
				array (
					'id' => 4,
					'level_id' => 1,
					'name' => 'Register Your Business',
					'slug' => 'register-your-business',
					'icon' => 'register-your-business.png',
					'tooltip' => 'Register Your Business',
					'show_landing_page' => false,
					'created_at' => NULL,
					'updated_at' => NULL,
					'tooltip_title' => '',
				),
			4 =>
				array (
					'id' => 5,
					'level_id' => 2,
					'name' => 'Marketing',
					'slug' => 'marketing',
					'icon' => 'T32YluDbcTeIZBSZhpvSBbQrRUYt5R9u.png',
					'tooltip' => '<p><span style="font-weight: 400;">Marketing success is about finding the right customers and making repeat sales for your business. Thanks to available digital tools, small businesses now have access to reach new audiences, especially using online platforms.</span></p>
<p><span style="font-weight: 400;">Below are some basics on how to implement your branding strategy using social media, business website and the old-school business card.</span></p>',
					'show_landing_page' => true,
					'created_at' => NULL,
					'updated_at' => '2018-05-25 02:31:50',
					'tooltip_title' => 'Marketing',
				),
			5 =>
				array (
					'id' => 6,
					'level_id' => 2,
					'name' => 'Finance',
					'slug' => 'finance',
					'icon' => 'XzydnwOa7Bujxgs159EQzWH7BFTwIKel.png',
					'tooltip' => '<p><span style="font-weight: 400;">Understanding your finances is the third pillar in growing your business. Maintaining positive cashflow requires basic money management skills and financial planning to balance your revenues, debt and expenses.</span></p>
<p><span style="font-weight: 400;">Make sure to get these three key numbers every month to get clarity, confidence and control of your finances:</span></p>
<ul>
<li><strong>Year to date net profit variance: </strong><span style="font-weight: 400;">difference between how much money you have actually made (after all of your expenses) and how much you expected to be making (after all of your expenses) by this time of the year</span></li>
<li><strong>Bank balance projections over the next three months: </strong><span style="font-weight: 400;">when actual cash comes in and out of your bank account</span></li>
</ul>
<p><strong>YTD gross profit margin by product/service: </strong><span style="font-weight: 400;">how much it costs for you to earn money.</span></p>',
					'show_landing_page' => true,
					'created_at' => NULL,
					'updated_at' => '2018-05-25 03:00:38',
					'tooltip_title' => 'Finance',
				),
			6 =>
				array (
					'id' => 7,
					'level_id' => 2,
					'name' => 'Operations',
					'slug' => 'operations',
					'icon' => 'ZPvUD0ckzhSEl6UzX3mwFzvEiaWxG184.png',
					'tooltip' => '<p><span style="font-weight: 400;">Setting up your office, whether at home, a co-working space or a leased unit is essential to manage your small business operations. At the minimum, it should provide you with communications equipment and Internet to manage your daily tasks. Storage for your working documents and products is another consideration. If you require meeting with clients, be sure your office is accessible and has a waiting room for guests.</span></p>',
					'show_landing_page' => true,
					'created_at' => NULL,
					'updated_at' => '2018-05-25 02:53:40',
					'tooltip_title' => 'Operations',
				),
			7 =>
				array (
					'id' => 8,
					'level_id' => 3,
					'name' => 'Marketing',
					'slug' => 'marketing',
					'icon' => 'lldM7uK2NpqmgkueEDc7qdXz8rxJOPl3.png',
					'tooltip' => '<p>Marketing</p>',
					'show_landing_page' => true,
					'created_at' => NULL,
					'updated_at' => '2018-01-24 08:59:33',
					'tooltip_title' => '',
				),
			8 =>
				array (
					'id' => 9,
					'level_id' => 3,
					'name' => 'Legal',
					'slug' => 'legal',
					'icon' => 'mfQcol29DuQqEsbTeQNz5QfQb6Cla2Ln.png',
					'tooltip' => '<p>Legal</p>',
					'show_landing_page' => true,
					'created_at' => NULL,
					'updated_at' => '2018-01-24 08:59:43',
					'tooltip_title' => '',
				),
			9 =>
				array (
					'id' => 10,
					'level_id' => 3,
					'name' => 'Human Resources',
					'slug' => 'human-resources',
					'icon' => '0EZ6iuduiQjQag0mKeEzM9pAVfTXirUJ.png',
					'tooltip' => '<p>Human Resources</p>',
					'show_landing_page' => true,
					'created_at' => NULL,
					'updated_at' => '2018-01-24 08:59:53',
					'tooltip_title' => '',
				),
			10 =>
				array (
					'id' => 11,
					'level_id' => 3,
					'name' => 'Finance',
					'slug' => 'finance',
					'icon' => 'KNnol52Txhd1GRPprQ7vvFZ7VWRL3fJM.png',
					'tooltip' => '<p>Finance</p>',
					'show_landing_page' => true,
					'created_at' => NULL,
					'updated_at' => '2018-01-24 09:00:03',
					'tooltip_title' => '',
				),
			11 =>
				array (
					'id' => 12,
					'level_id' => 3,
					'name' => 'Operations',
					'slug' => 'operations',
					'icon' => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
					'tooltip' => '<p>Operations</p>',
					'show_landing_page' => true,
					'created_at' => NULL,
					'updated_at' => '2018-01-24 09:00:13',
					'tooltip_title' => '',
				),
		));


	}
}