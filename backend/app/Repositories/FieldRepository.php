<?php

namespace App\Repositories;

use App\Models\Field;
use App\Repositories\Contracts\FieldRepositoryInterface;

class FieldRepository implements FieldRepositoryInterface
{
    public function allFields()
    {
        $fields = Field::paginate();
        return $fields;
    }
}
