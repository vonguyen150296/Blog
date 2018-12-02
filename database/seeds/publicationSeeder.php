<?php

use Illuminate\Database\Seeder;

class publicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contenu0 = "Le Viêt Nam, Viet Nam, Vietnam ou Viêtnam, en forme longue la République socialiste du Viêt Nam, en vietnamien Việt Nam Écouter et Cộng hoà Xã hội Chủ nghĩa Việt Nam Écouter, est un pays d'Asie du Sud-Est situé à l'est de la péninsule indochinoise. Il a une superficie de 330 967 km2 et compte environ 92,7 millions d'habitants en 20161. Il est bordé par la Chine au nord, le Laos, le Cambodge et le golfe de Thaïlande à l'ouest et la mer de Chine méridionale à l'est et au sud. Sa capitale est Hanoï.";
    	$contenu ="Le tennis de table appelé aussi  ping-pong  est un sport de raquette opposant deux ou quatre joueurs autour une table. Le tennis de table est une activité de loisir, mais  il est également un sport olympique depuis 1988.";

        DB::table('publication')->insert([
        	['idTypeDePublication'=>'1','titre' => 'Cristiano Ronaldo ','titreSansAccent' => 'Cristiano-Ronaldo','resume' => 'il est bon fooballeur','contenu' => 'Cristiano Ronaldo dos Santos Aveiro, couramment appelé Cristiano Ronaldo et surnommé CR7, né le 5 février 1985 à Funchal sur île de Madère, est un footballeur international portugais.','image' => 'ronaldo.jpg','important' => 0],
        	['idTypeDePublication'=>'1','titre' => 'Leonal Messi ','titreSansAccent' => 'Leonal-Messi','resume' => 'il est bon fooballeur','contenu' => 'Lionel Messi, parfois surnommé Leo Messi, né le 24 juin 1987 à Rosario, est un footballeur international argentin évoluant au poste attaquant au FC Barcelone','image' => 'messi.jpg','important' => 1],
            ['idTypeDePublication'=>'1','titre' => 'Neymar ','titreSansAccent' => 'Neymar','resume' => 'il est bon fooballeur','contenu' => 'Neymar da Silva Santos Júnior dit Neymar Jr., plus couramment appelé Neymar, né le 5 février 1992 à Mogi das Cruzes, est un footballeur international brésilien évoluant au poste attaquant au Paris Saint-Germain, et pour léquipe nationale du Brésil, dont il est le capitaine depuis le 4 septembre 2014','image' => 'neymar.jpg','important' => 1],
            ['idTypeDePublication'=>'1','titre' => 'Nguyen Cong Phuong','titreSansAccent' => 'Nguyen-Cong-Phuong','resume' => 'il est bon fooballeur de Viet Nam','contenu' => 'Nguyễn Công Phượng (born 21 January 1995) is a Vietnamese footballer who plays as a forward for Hoàng Anh Gia Lai, and the Vietnamese national team.','image' => 'congphuong.jpg','important' => 1],

        	['idTypeDePublication'=>'2','titre' => 'Timo Boll','titreSansAccent' => 'Timo-Boll','resume' => 'il joue tres bien','contenu' => $contenu,'image' => 'TimoBoll.jpg','important' => 0],
        	['idTypeDePublication'=>'2','titre' => 'Jean Philippe Gatien','titreSansAccent' => 'Jean-Philippe-Gatien','resume' => 'il joue tres bien','contenu' => $contenu,'image' => 'JeanPhilippeGatien.jpg','important' => 1],

        	['idTypeDePublication'=>'3','titre' => 'Blois','titreSansAccent' => 'Blois','resume' => 'il est une ville de France','contenu' => 'Blois (prononcé [blwa] Écouter) est une commune française, chef-lieu du département de Loir-et-Cher en région Centre-Val de Loire. Blois est aussi la commune la plus peuplée du département.','image' => 'blois.jpg','important' => 0],
        	['idTypeDePublication'=>'3','titre' => 'Paris','titreSansAccent' => 'Paris','resume' => 'il est une ville de France','contenu' => 'Paris (prononcé [pa.ʁi] Écouter) est la capitale de la France. Elle se situe au cœur un vaste bassin sédimentaire aux sols fertiles et au climat tempéré, le bassin parisien, sur une boucle de la Seine, entre les confluents de celle-ci avec la Marne et Oise. Ses habitants s’appellent les Parisiens. Paris est également le chef-lieu de la région Île-de-France et unique commune française qui est en même temps un département. Commune centrale de la Métropole du Grand Paris, créée en 2016, elle est divisée en arrondissements, comme les villes de Lyon et de Marseille, au nombre de vingt. État y dispose de prérogatives particulières exercées par le préfet de police de Paris.','image' => 'paris.jpg','important' => 1],
            ['idTypeDePublication'=>'3','titre' => 'Bourges','titreSansAccent' => 'Paris','resume' => 'il est une ville de France','contenu' => 'Bourges (prononcé [buʁʒ]) est une commune française, préfecture du département du Cher. Avec 66 528 habitants (2015), est la commune la plus peuplée du département. Au centre une aire urbaine de 140 407 habitants (la 62e de France), Bourges est la troisième commune la plus peuplée de la région Centre-Val de Loire, après Tours et Orléans, et devant Blois, Châteauroux et Chartres.','image' => 'bourges.jpg','important' => 1],

        	['idTypeDePublication'=>'4','titre' => 'Ha Noi','titreSansAccent' => 'Ha-Noi','resume' => 'il est une ville de Viet Nam','contenu' => $contenu0,'image' => 'hanoi.jpg','important' => 1],
        	['idTypeDePublication'=>'4','titre' => 'Sai Gon','titreSansAccent' => 'Sai-Gon','resume' => 'il est une ville de Viet Nam','contenu' => $contenu0,'image' => 'saigon.jpg','important' => 1],
            ['idTypeDePublication'=>'4','titre' => 'Hue','titreSansAccent' => 'Hue','resume' => 'il est une ville de Viet Nam','contenu' => $contenu0,'image' => 'hue.jpg','important' => 1],
            ['idTypeDePublication'=>'4','titre' => 'Da Nang','titreSansAccent' => 'Da-Nang','resume' => 'il est une ville de Viet Nam','contenu' => $contenu0,'image' => 'danang.jpg','important' => 1]
        ]);
            
    }
}
