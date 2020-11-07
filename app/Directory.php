<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Directory;
use App\File;

class Directory extends Model
{
    protected $primaryKey = 'parent_id';
    protected $table = 'directories';

    protected $fillable = [
        'dir_name','parent_id'
    ];

	public function files()
    {
        return $this->hasMany(File::class,'dir_id','id');
    }

    public function subDirectories()
    {
        return $this->hasMany(Directory::class,'parent_id','id');
    }

}
