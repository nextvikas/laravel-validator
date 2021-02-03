<?php
namespace Nextvikas\Validator;

use Illuminate\Database\Eloquent\Model as oldModel;
use Illuminate\Support\Facades\Schema;

class Model extends oldModel
{
    public function getFillable()
    {
        return Schema::getColumnListing($this->getTable());
    }
}