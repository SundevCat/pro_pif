<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pt_inv_pif_fg extends Model
{
    use HasFactory;
    protected $connection = 'oracle';
    protected $table = 'apps.pt_inv_pif_fg';
    public $timestamps = false;
    public $incrementing = false;
}
