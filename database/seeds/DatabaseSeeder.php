<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UsersTableSeeder::class);
        $this->call(AffiliateLinksTableSeeder::class);
        $this->call(AffiliateLinkBusinessOptionTableSeeder::class);
        $this->call(AffiliateLinkTrackerTableSeeder::class);
        $this->call(BadgesTableSeeder::class);
        $this->call(BadgeUserTableSeeder::class);
        $this->call(BusinessesTableSeeder::class);
        $this->call(BusinessBusinessOptionTableSeeder::class);
        $this->call(BusinessCategoriesTableSeeder::class);
        $this->call(BusinessCategoryBusinessOptionTableSeeder::class);
        $this->call(BusinessOptionsTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(UserProfilesTableSeeder::class);
        $this->call(BusinessLevelTableSeeder::class);
        $this->call(BusinessSectionTableSeeder::class);

        $this->call(BusinessMetasTableSeeder::class);
        $this->call(DynamicTableSeeder::class);
    }



}
