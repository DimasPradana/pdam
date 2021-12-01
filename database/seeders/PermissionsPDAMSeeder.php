<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsPDAMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //
    // Reset cached roles and permissions
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    // create permissions
    /* Permission::create(['name' => 'create markers']); */
    /* Permission::create(['name' => 'create polygons']); */
    /* Permission::create(['name' => 'create attributes']); */
    /* Permission::create(['name' => 'read markers']); */
    /* Permission::create(['name' => 'read polygons']); */
    /* Permission::create(['name' => 'read attributes']); */
    /* Permission::create(['name' => 'update markers']); */
    /* Permission::create(['name' => 'update polygons']); */
    /* Permission::create(['name' => 'update attributes']); */
    /* Permission::create(['name' => 'delete markers']); */
    /* Permission::create(['name' => 'delete polygons']); */
    /* Permission::create(['name' => 'delete attributes']); */
    
    /* unit situbondo */
    Permission::create(['name' => 'situbondo.create']);
    Permission::create(['name' => 'situbondo.read']);
    Permission::create(['name' => 'situbondo.update']);
    Permission::create(['name' => 'situbondo.delete']);

    /* unit arjasa */
    Permission::create(['name' => 'arjasa.create']);
    Permission::create(['name' => 'arjasa.read']);
    Permission::create(['name' => 'arjasa.update']);
    Permission::create(['name' => 'arjasa.delete']);

    // create roles and assigning existing permissons
    $roleKepala = Role::create(['name' => 'kepala']);
    /* $roleKepala->givePermissionTo('read markers'); */
    /* $roleKepala->givePermissionTo('read polygons'); */
    /* $roleKepala->givePermissionTo('read attributes'); */
    $roleKepala->givePermissionTo('situbondo.read');
    $roleKepala->givePermissionTo('arjasa.read');

/*     $roleMarker = Role::create(['name' => 'roleMarker']); */
/*     $roleMarker->givePermissionTo('create markers'); */
/*     $roleMarker->givePermissionTo('read markers'); */
/*     $roleMarker->givePermissionTo('update markers'); */
/*     $roleMarker->givePermissionTo('delete markers'); */
/*  */
/*     $rolePolygon = Role::create(['name' => 'rolePolygon']); */
/*     $rolePolygon->givePermissionTo('create polygons'); */
/*     $rolePolygon->givePermissionTo('read polygons'); */
/*     $rolePolygon->givePermissionTo('update polygons'); */
/*     $rolePolygon->givePermissionTo('delete polygons'); */
/*  */
/*     $roleAttribute = Role::create(['name' => 'roleAttribute']); */
/*     $roleAttribute->givePermissionTo('create attributes'); */
/*     $roleAttribute->givePermissionTo('read attributes'); */
/*     $roleAttribute->givePermissionTo('update attributes'); */
/*     $roleAttribute->givePermissionTo('delete attributes'); */
    
    $roleUnit1 = Role::create(['name' => 'unitSitubondo']);
    $roleUnit1->givePermissionTo('situbondo.create');
    $roleUnit1->givePermissionTo('situbondo.read');
    $roleUnit1->givePermissionTo('situbondo.update');
    $roleUnit1->givePermissionTo('situbondo.delete');

    $roleUnit2 = Role::create(['name' => 'unitArjasa']);
    $roleUnit2->givePermissionTo('arjasa.create');
    $roleUnit2->givePermissionTo('arjasa.read');
    $roleUnit2->givePermissionTo('arjasa.update');
    $roleUnit2->givePermissionTo('arjasa.delete');

    $roleSuperAdmin = Role::create(['name' => 'Super Admin' ]);

    // create user
//    $userKepala = \App\Models\User::factory()->create([
//      'name' => 'Kepala PDAM',
//      'email' => 'kepala@local.com',
//      'password' => bcrypt('12345678'),
//    ]);
//    $userKepala->assignRole($roleKepala);
//
//    $userSuperAdmin = \App\Models\User::factory()->create([
//      'name' => 'Dimas',
//      'email' => 'superadmin@local.com',
//      'password' => bcrypt('12345678'),
//    ]);
//    $userSuperAdmin->assignRole($roleSuperAdmin);
//
//    $userMarker = \App\Models\User::factory()->create([
//      'name' => 'Markerer',
//      'email' => 'marker@local.com',
//      'password' => bcrypt('12345678'),
//    ]);
//    $userMarker->assignRole($roleMarker);
//
//    $userPolygoner = \App\Models\User::factory()->create([
//      'name' => 'Polygoner',
//      'email' => 'polygoner@local.com',
//      'password' => bcrypt('12345678'),
//    ]);
//    $userPolygoner->assignRole($rolePolygon);
//
//    $userAttributer = \App\Models\User::factory()->create([
//      'name' => 'Attribuer',
//      'email' => 'attributer@local.com',
//      'password' => bcrypt('12345678'),
//    ]);
//    $userAttributer->assignRole($roleAttribute);

    // TODO snub seeder pake username
        $userKepala = \App\Models\User::factory()->create([
            'name' => 'Kepala PDAM',
            'firstname' => 'Direktur',
            'lastname' => 'PDAM',
            'username' => 'direktur',
            'email' => 'kepala@local.com',
            'password' => bcrypt('dir12345678'),
        ]);
        $userKepala->assignRole($roleKepala);

        $userSuperAdmin = \App\Models\User::factory()->create([
            'name' => 'Dimas Pradana',
            'firstname' => 'Dimas',
            'lastname' => 'PDAM',
            'username' => 'snub',
            'email' => 'superadmin@local.com',
            'password' => bcrypt('12345678'),
        ]);
        $userSuperAdmin->assignRole($roleSuperAdmin);

/*         $userMarker = \App\Models\User::factory()->create([ */
/*             'name' => 'Marker PDAM', */
/*             'firstname' => 'Markerer', */
/*             'lastname' => 'PDAM', */
/*             'username' => 'markerer', */
/*             'email' => 'marker@local.com', */
/*             'password' => bcrypt('12345678'), */
/*         ]); */
/*         $userMarker->assignRole($roleMarker); */
/*  */
/*         $userPolygoner = \App\Models\User::factory()->create([ */
/*             'name' => 'Polygoner PDAM', */
/*             'firstname' => 'Polygoner', */
/*             'lastname' => 'PDAM', */
/*             'username' => 'polygoner', */
/*             'email' => 'polygoner@local.com', */
/*             'password' => bcrypt('12345678'), */
/*         ]); */
/*         $userPolygoner->assignRole($rolePolygon); */
/*  */
/*         $userAttributer = \App\Models\User::factory()->create([ */
/*             'name' => 'Attributer PDAM', */
/*             'firstname' => 'Attributer', */
/*             'lastname' => 'PDAM', */
/*             'username' => 'attributer', */
/*             'email' => 'attributer@local.com', */
/*             'password' => bcrypt('12345678'), */
/*         ]); */
/*         $userAttributer->assignRole($roleAttribute); */
        
        $unitSitubondo = \App\Models\User::factory()->create([
            'name' => 'Unit Situbondo',
            'firstname' => 'Unit',
            'lastname' => 'Situbondo',
            'username' => 'situbondo',
            'email' => 'unitSitubondo@local.com',
            'password' => bcrypt('sit12345678'),
        ]);
        $unitSitubondo->assignRole($unitSitubondo);
        
        $unitArjasa = \App\Models\User::factory()->create([
            'name' => 'Unit Arjasa',
            'firstname' => 'Unit',
            'lastname' => 'Arjasa',
            'username' => 'unitArjasa',
            'email' => 'unitArjasa@local.com',
            'password' => bcrypt('arj12345678'),
        ]);
        $unitArjasa->assignRole($unitArjasa);
        
        $unitBesuki = \App\Models\User::factory()->create([
            'name' => 'Unit Besuki',
            'firstname' => 'Unit',
            'lastname' => 'Besuki',
            'username' => 'unitBesuki',
            'email' => 'unitBesuki@local.com',
            'password' => bcrypt('bes12345678'),
        ]);
        $unitBesuki->assignRole($unitBesuki);

        $userHL = \App\Models\User::factory()->create([
            'name' => 'Hubungan Pelanggan',
            'firstname' => 'Hubungan Pelanggan',
            'lastname' => 'PDAM',
            'username' => 'hl',
            'email' => 'hl@local.com',
            'password' => bcrypt('hl12345678'),
        ]);
        $userHL->assignRole($roleKepala);

    }
}
