<?php
/**
 * Class ModelRoleSeeder
 *
 
* @category ElanceBD
*
* @package Elancebd
* @author  Risfat <md@risfbd.com>
* @license https://risfbd.com Risfat
* @link    https://risfbd.com

 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class ModelRoleSeeder
 */
class ModelRoleSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_has_roles')->insert(
            [
                [
                    'role_id' => '1',
                    'model_id' => '1',
                    'model_type' => 'App\User',
                ],
                //Emplpoyers
                [
                    'role_id' => '2',
                    'model_id' => '2',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '2',
                    'model_id' => '3',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '2',
                    'model_id' => '4',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '2',
                    'model_id' => '5',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '2',
                    'model_id' => '6',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '2',
                    'model_id' => '7',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '2',
                    'model_id' => '8',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '2',
                    'model_id' => '9',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '2',
                    'model_id' => '10',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '2',
                    'model_id' => '11',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '2',
                    'model_id' => '12',
                    'model_type' => 'App\User',
                ],
                //Freelancers
                [
                    'role_id' => '3',
                    'model_id' => '13',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '3',
                    'model_id' => '14',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '3',
                    'model_id' => '15',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '3',
                    'model_id' => '16',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '3',
                    'model_id' => '17',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '3',
                    'model_id' => '18',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '3',
                    'model_id' => '19',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '3',
                    'model_id' => '20',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '3',
                    'model_id' => '21',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '3',
                    'model_id' => '22',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '3',
                    'model_id' => '23',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '3',
                    'model_id' => '24',
                    'model_type' => 'App\User',
                ],
            ]
        );
    }
}
