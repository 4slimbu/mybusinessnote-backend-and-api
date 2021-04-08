<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{


		\DB::table('settings')->delete();

		\DB::table('settings')->insert(array (
			0 =>
				array (
					'id' => 1,
					'name' => 'Pop Up',
					'key' => 'popup',
					'value' => '{"target":"all","referrer_url":"google.com","trigger_type":"after_rand_clicks","delay_time":"5","min_click_count":"5","max_click_count":"10","content":"<div class=\\"popup-heading\\" style=\\"text-align: center;\\"><br \\/>\\r\\n<h2>Helping You Start and Run a Business<\\/h2>\\r\\n<\\/div>\\r\\n<div class=\\"popup-body\\" style=\\"text-align: center;\\"><br \\/><img class=\\"alignnone size-full wp-image-6\\" src=\\"http:\\/\\/staging.mybusinessjourney.com.au\\/wp-content\\/uploads\\/2017\\/11\\/logo.png\\" alt=\\"\\" width=\\"117\\" height=\\"60\\" \\/><br \\/>\\r\\n<p><br \\/>My Business Journey is a tool to help you start and run your SME in Australia. Register for free to start your journey. If you\'re already on your way, that\'s fine too - we\'ll fast track you from laying the foundations to optimising the business.<\\/p>\\r\\n<br \\/>\\r\\n<div class=\\"step-one on-bg-white\\"><a class=\\"btn btn-default btn-lg\\" href=\\"..\\/..\\/..\\/level\\/getting-started\\/section\\/about-you\\">Register Today For Free<\\/a><\\/div>\\r\\n<\\/div>"}',
					'edit_template' => 'popup-settings',
					'status' => 1,
					'created_at' => '2018-05-31 03:58:53',
					'updated_at' => '2018-05-31 08:07:06',
				),
		));


	}
}