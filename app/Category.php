<?php

namespace App;
use App\Traits\HasModelTrait;
class Category extends SuperModel
{
	use HasModelTrait;
    protected $fillable = ['name','slug','article_id'];
}