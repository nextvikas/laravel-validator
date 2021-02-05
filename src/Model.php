<?php
namespace Nextvikas\Validator;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Schema;

class Model extends Authenticatable
{
    public function getFillable()
    {
        return Schema::getColumnListing($this->getTable());
    }
}
