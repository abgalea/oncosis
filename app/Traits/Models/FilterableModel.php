<?php

namespace App\Traits\Models;

trait FilterableModel
{
    public function scopeFilteredPaginate($query, $filter = [], $count = 10)
    {
        if (property_exists($this, 'filterable'))
        {
            if ( ! is_null($filter) AND trim($filter) != '')
            {
                foreach($this->filterable as $filterField)
                {
                    $query->where($filterField, 'like', '%' . $filter . '%', 'or');
                }
            }
        }

        return $query->paginate($count);
    }
}
