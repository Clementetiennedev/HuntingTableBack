<?php

namespace App\Repositories;

use App\Models\Society;
use Illuminate\Support\Facades\DB;

class SocietyRepository
{
    public function filterByDepartment($query, $value)
    {
        return Society::with(['federation.department'])
            ->whereHas('federation.department', function ($query) use ($value) {
                $query->where('id', $value);
            });
    }
}
