<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pt_inv_pif_log extends Model
{
    use HasFactory;
    protected $connection = 'oracle';
    protected $table = 'apps.pt_inv_pif_log';
    public $timestamps = false;
    public $incrementing = false;
}
