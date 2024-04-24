<?php

namespace App\Traits;


trait SearchableTrait
{
    function search( $query, array $searchableFields)
    {
        if(request()->has('search'))
         $query->where(function($subquery) use ($searchableFields) {
            foreach ($searchableFields as $field) {
                $subquery->orWhere($field, 'like', '%' . \request('search') . '%');
            }
    });

    }
}
