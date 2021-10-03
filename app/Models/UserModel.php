<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    use HasFactory;

    // TODO get name, role and permission query
//select a.id as id, a.name as name, c.name as role_name, e.name as permission_name
//from pdam_fix.public.users a
//left join pdam_fix.public.model_has_roles b on a.id = b.model_id
//left join pdam_fix.public.roles c on c.id = b.role_id
//left join pdam_fix.public.role_has_permissions d on d.role_id = c.id
//left join pdam_fix.public .permissions e on e.id = d.permission_id;

    public function getUser()
    {
        $hasil = DB::table('users')
            ->select('name')
            ->get();
        return $hasil;
    }

    public function getAll()
    {
        $hasil = DB::table('users as a')
            ->leftJoin('model_has_roles as b', 'a.id', '=', 'b.model_id')
            ->leftJoin('roles as c', 'c.id', '=', 'b.role_id')
            ->leftJoin('role_has_permissions as d', 'd.role_id', '=', 'c.id')
            ->leftJoin('permissions as e', 'e.id', '=', 'd.permission_id')
            ->where('a.id', '=', 3)
            ->get();
        return $hasil;
    }
}
