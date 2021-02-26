<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, HasDateTimeFormatter;
}
