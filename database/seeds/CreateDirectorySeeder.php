<?php

use Illuminate\Database\Seeder;
use App\Directory;
use Carbon\Carbon;

class CreateDirectorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
	    $directories = [
	        ['id' => 1,'dir_name' => 'app', 'parent_id' => 0, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 2,'dir_name' => 'Console', 'parent_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 3,'dir_name' => 'Exceptions', 'parent_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 4,'dir_name' => 'Http', 'parent_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 5,'dir_name' => 'Controllers', 'parent_id' => 4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 6,'dir_name' => 'Auth', 'parent_id' => 5, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 7,'dir_name' => 'Middleware', 'parent_id' => 4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 8,'dir_name' => 'Providers', 'parent_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 9,'dir_name' => 'bootstrap', 'parent_id' => 0, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 10,'dir_name' => 'cache', 'parent_id' => 9, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 11,'dir_name' => 'config', 'parent_id' => 0, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 12,'dir_name' => 'database', 'parent_id' => 0, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 13,'dir_name' => 'factories', 'parent_id' => 12, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 14,'dir_name' => 'migrations', 'parent_id' => 12, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 15,'dir_name' => 'seeds', 'parent_id' => 12, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 16,'dir_name' => 'public', 'parent_id' => 0, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 17,'dir_name' => 'css', 'parent_id' => 16, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 18,'dir_name' => 'js', 'parent_id' => 16, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 19,'dir_name' => 'resources', 'parent_id' => 0, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 20,'dir_name' => 'js', 'parent_id' => 19, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 21,'dir_name' => 'lang', 'parent_id' => 19, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 22,'dir_name' => 'en', 'parent_id' => 21, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 23,'dir_name' => 'sass', 'parent_id' => 19, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 24,'dir_name' => 'views', 'parent_id' => 19, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 25,'dir_name' => 'routes', 'parent_id' => 0, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]        
	    ];
	    	
	    Directory::insert($directories);
    }
}
