<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $admin = Role::create(['name' => 'admin']);
        $teacher = Role:: create(['name' => 'teacher']);
        $student = Role::create(['name' => 'student']);



        $gt = Permission::create(['name' => 'Gerer tout']);//pour l'admin
        $st = Permission::create(['name' => 'Supprimer un teacher']);//   admin
        $at = Permission::create(['name' => 'Ajouter un teacher']);
        $ac = Permission::create(['name' => 'Ajouter un cours']);//pour le teacher
        $vs = Permission::create(['name' => 'Voir les students inscrits dans ses cours']);// teacher
        $mc = Permission::create(['name' => 'Modifier un cours']); //teacher
        $sc = Permission::create(['name' => 'Supprimer un cours']); //teacher
        $oc = Permission::create(['name' => 'Souscrire à un cours']); //student
        $vc = Permission::create(['name' => 'Voir le contenu du cours']); //student

        $admin->givePermissionTo($gt, $st, $at);
        $teacher->givePermissionTo($ac, $vs, $mc, $sc);
        $student->givePermissionTo($oc, $vc);

    }
}
