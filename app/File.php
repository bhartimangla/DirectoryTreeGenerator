<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Directory;

class File extends Model
{
    protected $primaryKey = 'dir_id';
    protected $table = 'files';
}
