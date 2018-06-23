<?php

use Illuminate\Database\Seeder;

class CoposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('copos')->insert([
            'nome' => 'Pilsner',
            'descricao' => 'Com um boca larga, alto e cônico, este copo é apropriado para as cervejas do tipo Pilsen, pois, possibilita a formação de um bom creme e direciona o aroma para o nariz.', 
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('copos')->insert([
            'nome' => 'Lager',
            'descricao' => 'Muito utilizado em bares para servir chope, esse copo contribui para a formação e manutenção do creme. Ideal para algumas cervejas do tipo pilsner e american lager.', 
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('copos')->insert([
            'nome' => 'Caldereta',
            'descricao' => 'Um dos copos indispensáveis para se ter em casa. Com sua versatilidade, permite servir desde lagers claras, passando por IPAs, Bitter e chegando em Porter e Stout.', 
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('copos')->insert([
            'nome' => 'Pint',
            'descricao' => 'Copo desenhado para ser simples, barato e comportar boas quantidades de cerveja, é ideal para cervejas do tipo Bitter e Stout.', 
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('copos')->insert([
            'nome' => 'Weizen',
            'descricao' => 'Cumprindo, com uma boca mais larga que a base, projetado  para intensificar os aromas. Ideal para cervejas do tipo Weiss.', 
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('copos')->insert([
            'nome' => 'Tulipa',
            'descricao' => 'Elegante e de corpo arredondado, para capturar os aromas. Ideal para cervejas com bastante espuma como algumas Strong Ale belgas, mas de qualquer forma, um copo bastante versátil.', 
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('copos')->insert([
            'nome' => 'Cálice',
            'descricao' => 'Com uma haste longa para evitar a transferência de calor e uma boca larga que auxilia a apresentação dos aromas, é ideal para as cervejas trapistas.', 
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('copos')->insert([
            'nome' => 'Flauta',
            'descricao' => 'Com uma boca estreita para evitar que o gás carbônico se dissipe rapidamente, a Flauta é ideal para cervejas do tipo Bière Brut.', 
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('copos')->insert([
            'nome' => 'Caneca',
            'descricao' => 'Ideal para cervejas do tipo Oktoberfest e algumas Bitter. Muito utilizado também, para servir chope e cervejas vendidas na pressão.', 
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('copos')->insert([
            'nome' => 'Mass',
            'descricao' => 'Pensando em festejar e beber bastante? O típico canecão alemão que suporte 1 litro, vai cair bem! Com paredes espessas e alça, auxilia na manutenção da temperatura da cerveja e permite brindar várias vezes…', 
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('copos')->insert([
            'nome' => 'Tumbler',
            'descricao' => 'Robusto e pesado, com a parte externa facetada e boca larga. Ideal para servir cervejas do tipo witbier.', 
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('copos')->insert([
            'nome' => 'Cilíndrico',
            'descricao' => 'Fino e com diâmetro igual da boca ao fundo, contribui para a formação de espuma e concentração dos aromas, ideal para cervejas do tipo Kölsch e Altbier.', 
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('copos')->insert([
            'nome' => 'Americano',
            'descricao' => 'O bom e velho copo americano! Provavelmente você tem um desse em casa, sem muitos mistérios: ideal para American Lager.', 
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('copos')->insert([
            'nome' => 'Pokal',
            'descricao' => 'Com fundo arredondado e boca estreita, esse copo é bastante versátil e serve bem lagers em geral e algumas Bock e Witbier.', 
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('copos')->insert([
            'nome' => 'Thistle',
            'descricao' => 'Base abaulada para facilitar o encaixe da mão que contribui para o aquecimento da cerveja e liberação dos aromas. Ideal para cervejas do tipo Scotch Ale em geral.', 
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        
    }
}
