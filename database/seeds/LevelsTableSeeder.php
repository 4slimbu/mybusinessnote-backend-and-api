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
                'meta_title' => NULL,
                'meta_description' => '',
                'icon' => 'gkNT4JIJXm1jJ6JXXD0C5QM6NBXmY28N.png',
                'badge_icon' => 'HQkzkK8dTLFDpZdDJcqdNww9L4qaF5QP.png',
                'badge_message' => '<div id="i4c-draggable-container" style="position: fixed; z-index: 1499; width: 0px; height: 0px;">
<div class="resolved" style="all: initial;" data-reactroot="">&nbsp;</div>
</div>
<h1>Congratulations</h1>
<p>Level 1 complete!</p>
<div id="i4c-dialogs-container">&nbsp;</div>',
                'content' => '<div id="i4c-draggable-container" style="position: fixed; z-index: 1499; width: 0px; height: 0px;">
<div class="resolved" style="all: initial;" data-reactroot="">&nbsp;</div>
</div>
<p>Let\'s get you started by setting up your account. Click on continue to go through the steps to register as well as to set up your business.</p>
<div id="i4c-dialogs-container">&nbsp;</div>',
                'tooltip_title' => 'Information',
                'tooltip' => '<div id="i4c-draggable-container" style="position: fixed; z-index: 1499; width: 0px; height: 0px;">
<div class="resolved" style="all: initial;" data-reactroot="">&nbsp;</div>
</div>
<p><span style="font-weight: 400;">Getting Started will ask you for basic information about you and your business idea. This will set you up and allow us to tailor the later parts of your note.</span></p>
<div id="i4c-dialogs-container">&nbsp;</div>',
                'template' => 'default',
                'is_active' => 1,
                'is_down' => 0,
                'down_message' => '<div id="i4c-draggable-container" style="position: fixed; z-index: 1499; width: 0px; height: 0px;">
<div class="resolved" style="all: initial;" data-reactroot="">&nbsp;</div>
</div>
<p>&nbsp;</p>
<div id="i4c-dialogs-container">&nbsp;</div>',
                'created_at' => NULL,
                'updated_at' => '2021-07-15 09:08:43',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Setting the Foundations',
                'slug' => 'setting-the-foundations',
                'meta_title' => NULL,
                'meta_description' => '',
                'icon' => '55I6TwblrDU0vezVnqUNw17T31NjVTHE.png',
                'badge_icon' => 'A5BvBAXEdIb6ro4LzZnxpAPgr9UxAAPJ.png',
                'badge_message' => '<div id="i4c-draggable-container" style="position: fixed; z-index: 1499; width: 0px; height: 0px;">
<div class="resolved" style="all: initial;" data-reactroot="">&nbsp;</div>
</div>
<h1>Congratulation</h1>
<p>Level 2 Completed</p>
<div id="i4c-dialogs-container">&nbsp;</div>',
                'content' => '<div id="i4c-draggable-container" style="position: fixed; z-index: 1499; width: 0px; height: 0px;">
<div class="resolved" style="all: initial;" data-reactroot="">&nbsp;</div>
</div>
<p>&nbsp;</p>
<div id="i4c-dialogs-container">&nbsp;</div>',
                'tooltip_title' => 'SETTING THE FOUNDATIONS',
                'tooltip' => '<div id="i4c-draggable-container" style="position: fixed; z-index: 1499; width: 0px; height: 0px;">
<div class="resolved" style="all: initial;" data-reactroot="">&nbsp;</div>
</div>
<p>&nbsp;</p>
<div id="i4c-dialogs-container">&nbsp;</div>',
                'template' => 'default',
                'is_active' => 1,
                'is_down' => 0,
                'down_message' => '<div id="i4c-draggable-container" style="position: fixed; z-index: 1499; width: 0px; height: 0px;">
<div class="resolved" style="all: initial;" data-reactroot="">&nbsp;</div>
</div>
<p>&nbsp;</p>
<div id="i4c-dialogs-container">&nbsp;</div>',
                'created_at' => NULL,
                'updated_at' => '2021-07-15 09:09:02',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Building up a Business',
                'slug' => 'building-up-a-business',
                'meta_title' => NULL,
                'meta_description' => '',
                'icon' => 'gStBSPg50XjfFyc1X3baYr0WmWManqwS.png',
                'badge_icon' => 'aRSSUsgF092VfvRMDm8u5TBZSLEjOvZ7.png',
                'badge_message' => '<div id="i4c-draggable-container" style="position: fixed; z-index: 1499; width: 0px; height: 0px;">
<div class="resolved" style="all: initial;" data-reactroot="">&nbsp;</div>
</div>
<h1>Congratulation</h1>
<p>Level 3 completed</p>
<div id="i4c-dialogs-container">&nbsp;</div>',
                'content' => '<div id="i4c-draggable-container" style="position: fixed; z-index: 1499; width: 0px; height: 0px;">
<div class="resolved" style="all: initial;" data-reactroot="">&nbsp;</div>
</div>
<p>level 3 content</p>
<div id="i4c-dialogs-container">&nbsp;</div>',
                'tooltip_title' => NULL,
                'tooltip' => '<div id="i4c-draggable-container" style="position: fixed; z-index: 1499; width: 0px; height: 0px;">
<div class="resolved" style="all: initial;" data-reactroot="">&nbsp;</div>
</div>
<p>level 3 tool tip</p>
<div id="i4c-dialogs-container">&nbsp;</div>',
                'template' => 'default',
                'is_active' => 1,
                'is_down' => 1,
                'down_message' => '<div id="i4c-draggable-container" style="position: fixed; z-index: 1499; width: 0px; height: 0px;">
<div class="resolved" style="all: initial;" data-reactroot="">&nbsp;</div>
</div>
<p>&nbsp;</p>
<p><strong>Coming Soon...</strong></p>
<div id="i4c-dialogs-container">&nbsp;</div>',
                'created_at' => NULL,
                'updated_at' => '2021-07-15 09:09:20',
            ),
        ));
        
        
    }
}