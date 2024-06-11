<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pt_inv_pif_retail_inner_mysql extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'pt_inv_pif_retail_inner';
}
