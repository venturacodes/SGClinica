<?php
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
           'cep'          => '88509000',
           'uf'           => 'sc',
           'cidade'       => 'Lages',
           'bairro'       => 'Universitário',
           'logradouro'   => 'Av. Dom pedro II',
            'numero'      => '1656',
            'complemento' => 'apto. 404',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
