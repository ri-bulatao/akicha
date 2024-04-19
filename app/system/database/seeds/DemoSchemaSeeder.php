<?php

namespace System\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemoSchemaSeeder extends Seeder
{
    protected $recordsPath = __DIR__.'/../records';

    /**
     * Run the demo schema seeds.
     * @return void
     */
    public function run()
    {
        if (!DatabaseSeeder::$seedDemo) return;

        $this->seedMenuOptions();

        $this->seedMenuItems();

        $this->seedCategories();

        $this->seedMenuCategories();
    }

    protected function seedWorkingHours($locationId)
    {
        foreach (['opening', 'delivery', 'collection'] as $type) {
            foreach (['0', '1', '2', '3', '4', '5', '6'] as $day) {
                DB::table('working_hours')->insert([
                    'location_id' => $locationId,
                    'weekday' => $day,
                    'type' => $type,
                    'opening_time' => '00:00',
                    'closing_time' => '23:59',
                    'status' => 1,
                ]);
            }
        }
    }

    protected function seedCategories()
    {
        if (DB::table('categories')->count())
            return;

        DB::table('categories')->insert($this->getSeedRecords('categories'));

        DB::table('categories')->update(['updated_at' => now(), 'created_at' => now()]);

    }

    
    protected function seedMenuCategories()
    {

        $classic_kennel = [1,2,3,4,5,6,7,8];
        $premium_kennel = [9,10,11,12,13,14,15];
        $choco_kennel = [16,17,18,19,20,21,22];
        $fruit_tea = [23,24,25,26,27,28,29];
        $cream_puff = [30,31,32,33,34,35,36,37];
            
        foreach ($classic_kennel as $menu_id) {
            DB::table('menu_categories')->insert([
                "menu_id" => $menu_id,
                "category_id" => 1
            ]);
        }
        
        foreach ($choco_kennel as $menu_id) {
            DB::table('menu_categories')->insert([
                "menu_id" => $menu_id,
                "category_id" => 2
            ]);
        }

        foreach ($premium_kennel as $menu_id) {
            DB::table('menu_categories')->insert([
                "menu_id" => $menu_id,
                "category_id" => 3
            ]);
        }
        
        foreach ($fruit_tea as $menu_id) {
            DB::table('menu_categories')->insert([
                "menu_id" => $menu_id,
                "category_id" => 5
            ]);
        }
        
        foreach ($cream_puff as $menu_id) {
            DB::table('menu_categories')->insert([
                "menu_id" => $menu_id,
                "category_id" => 4
            ]);
        }
    }

    protected function seedMenuOptions()
    {
        if (DB::table('menu_options')->count())
            return;

        foreach ($this->getSeedRecords('menu_options') as $menuOption) {
            $optionId = DB::table('menu_options')->insertGetId(array_except($menuOption, 'option_values'));

            foreach (array_get($menuOption, 'option_values') as $optionValue) {
                DB::table('menu_option_values')->insert(array_merge($optionValue, [
                    'option_id' => $optionId,
                ]));
            }
        }

        DB::table('menu_options')->update(['updated_at' => now(), 'created_at' => now()]);
    }

    protected function seedMenuItems()
    {
        if (DB::table('menus')->count())
            return;

        foreach ($this->getSeedRecords('menus') as $menu) {
            $menuId = DB::table('menus')->insertGetId(array_except($menu, 'menu_options'));

            foreach (array_get($menu, 'menu_options', []) as $name) {
                $option = DB::table('menu_options')->where('option_name', $name)->first();

                $menuOptionId = DB::table('menu_item_options')->insertGetId([
                    'option_id' => $option->option_id,
                    'menu_id' => $menuId,
                ]);

                $optionValues = DB::table('menu_option_values')->where('option_id', $option->option_id)->get();

                foreach ($optionValues as $optionValue) {
                    DB::table('menu_item_option_values')->insertGetId([
                        'menu_option_id' => $menuOptionId,
                        'option_value_id' => $optionValue->option_value_id,
                        'new_price' => $optionValue->price,
                        'priority' => $optionValue->priority,
                    ]);
                }
            }
        }

        DB::table('menus')->update(['updated_at' => now(), 'created_at' => now()]);
        DB::table('menu_item_options')->update(['updated_at' => now(), 'created_at' => now()]);
        DB::table('menu_item_option_values')->update(['updated_at' => now(), 'created_at' => now()]);
    }

    protected function getSeedRecords($name)
    {
        return json_decode(file_get_contents($this->recordsPath.'/'.$name.'.json'), true);
    }
}
