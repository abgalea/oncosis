<?php

use App\Models\Protocol;
use Illuminate\Database\Seeder;

class ProtocolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Protocol::create([
            'name' => 'Gemcitabine',
            'instructions' => '<p><strong>Pre-medicación</strong></p><p><span></span>a) <b>Dextrosa</b> 5% {{campo}}</p><ol><li>Dexametasona {{campo}}</li><li>Ondasentron {{campo}}</li><li>Metoclopramida {{campo}}</li><li>Ranitidina {{campo}}</li><li>Dextrosa 5% 500ml + {{campo}} Gemtacibine</li></ol><p>b) Infusión continua de {{campo}}</p><p>c) Lavado de Dextrosa al 5% {{campo}}</p>',
            'is_active' => true
        ]);

        Protocol::create([
            'name' => 'CHOP - CVP',
            'instructions' => '<ol><li>Colocar via periférica, usar ABBOKAT Nro {{campo}}</li><li><b>Dextrosa</b> al 5% {{campo}}ml<br>Dexametasoma {{campo}}mg<br>Ondasentron {{campo}}mg</li><li>Administrar<ul><li>Adriamicina (Doxo Rubicina) {{campo}} diluido en Dextrosa 5% pasar en bolo lento E.V. <strong>CUIDADO NO EXTRAVASAR</strong></li><li>Ciclo fosfanida {{campo}} diluido en 20ml de Dextrosa 5% pasar en bolo lento E.V. Vincristina {{campo}}mg diluir en 10ml de solución fisiológica, pasar en bolo E.V. <strong>CUIDADO NO EXTRAVASAR</strong></li></ul></li><li><strong></strong>Lavar vía con Dextrosa al 5% 20cm</li></ol>',
            'is_active' => true
        ]);
    }
}
