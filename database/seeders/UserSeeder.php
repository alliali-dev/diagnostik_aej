<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* DB::table('users')->insert([
            'name' => 'Administrateur',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'agence_id' => 17
        ]);*/


        /*$users = [
            [
                'name' => 'Kassoum FOFANA',
                'email' => 'k.fofana@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 21
            ], [
                'name' => 'KOUADIO KAN MARCELIN',
                'email' => 'km.kouadio@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 19
            ],
            [
                'name' => 'BAH CHEICK',
                'email' => 'c.bah@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 18
            ],[
                'name' => 'BREDE WILSON',
                'email' => 'w.brede@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 10
            ],
            [
                'name' => 'DIABATE ALI',
                'email' => 'a.diabate@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 20
            ],
            [
                'name' => 'KOUAME KEDJEBO YAO ALAIN',
                'email' => 'a.kouame@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 4
            ],
            [
                'name' => 'DOUCOURE FATIMA',
                'email' => 'f.doucoure@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 3
            ],
            [
                'name' => 'GAUZE ANSELME',
                'email' => 'a.gauze@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 16
            ],
            [
                'name' => 'CAMARA AHISSATA',
                'email' => 'a.camara@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 2
            ],
            [
                'name' => 'KAMAGATE DRISSA',
                'email' => 'd.kamagate@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 9
            ],
            [
                'name' => 'KANDE MAMADOU',
                'email' => 'm.kande@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 1
            ],
            [
                'name' => 'KONE YAYA',
                'email' => 'y.kone@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 8
            ],
            [
                'name' => 'YEO NAGOMBLE GEORGE',
                'email' => 'g.yeo@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 22
            ],
            [
                'name' => 'EDDY ALLET SERGE LEGER',
                'email' => 's.eddy@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 13
            ],
            [
                'name' => 'KUMASSI KOUAO',
                'email' => 'k.kumassi@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 11
            ],
            [
                'name' => 'ZOZO ZOHOGBO MARCELIN',
                'email' => 'm.zozo@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 23
            ],
            [
                'name' => 'DOUMBIA MAHOUA',
                'email' => 'mah.doumbia@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 12
            ],
            [
                'name' => 'KANGAH AGOUA GERTRUDE',
                'email' => 'g.kangah@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 6
            ],
            [
                'name' => 'SOUMAORO DAOUDA',
                'email' => 'd.soumahoro@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 7
            ],
            [
                'name' => 'GNAMAN YANNICK A.',
                'email' => 'y.gnaman@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 24
            ],
            [
                'name' => 'Chef Agence',
                'email' => 'chefagence@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 1
            ]
        ];*/


        /*
('Kan Marcelin Kouadio', 'oldkm.kouadio@emploijeunes.ci', 'DG - PLATEAU', 17),
('Abdoulaye Coulibaly', 'a.coulibaly@emploijeunes.ci', 'PRESTIGE', 24),
('AKA JOEL YAO', 'j.yao@emploijeunes.ci', 'SANPEDRO', 11),
('ATSE NESTOR SAHOUIN', 'n.sahouin@emploijeunes.ci', 'BOUAKE', 9),
('ALLET LEGER EDDY', 's.eddy1@emploijeunes.ci', 'GUIGLO', 13),
('Jean Pierre Gueye', 'jp.gueye1@emploijeunes.ci', 'ADJAME', 2),
('AHOUADJIRO ATHANASE HERMANN ANONKAN', 'a.anonkan@emploijeunes.ci', 'ABENGOUROU', 7),
('SAMBA OUATTARA', 's.ouattara@emploijeunes.ci', 'YOPOUGON', 4),
('Angela Kacou', 'a.kacou@emploijeunes.ci', NULL, NULL),
('ERNEST TAHE', 'e.tahe@emploijeunes.ci', 'ABOBO', 1),
        ('KOMENAN PAUL GBOGO', 'p.gbogo@emploijeunes.ci', 'DALOA', 8),

('GNAKO LOHOURIGNON ', 'j.lohourignon@emlpoijeunes.ci', 'GAGNOA', 10),

('ARIATA OLEMOU MORIBA', 'm.moriba1@emploijeunes.ci', 'KORHOGO', 16),

('ZOHOGBO MARCELIN ZOZO', 'old_m.zozo@emploijeunes.ci', 'DG - PLATEAU', 17),

        ('KOUAME OLIVIER KAKLA', 'o.kakla@emploijeunes.ci', 'YOPOUGON', 4),

('LUCIEN MOZOU', 'l.mozou@emploijeunes.ci', 'TREICHVILLE', 3),

('BERNARD KONAN ', 'b.konan@emploijeunes.ci', 'DG - PLATEAU', 17),

('extraction extraction', 'extraction_thimo@emploijeunes.ci', NULL, NULL),

('LANDRY FULGENCE MELESS,', 'stagiaire.lmeless@emploijeunes.ci', 'ABOISSO', 18),


('SARAH EDWIGE AMAFET EPSE OUATTARA', 'e.ouattara@emploijeunes.ci', 'ABENGOUROU', 7),

('LUDOVIC SEA', 'l.sea@emploijeunes.ci', 'DAOUKRO', 21),

('FATOUMATA BINTOU COULIBALY', 'f.coulibaly@emploijeunes.ci', 'YOPOUGON', 4),

('ARIATA OLEMOU MORIBA', 'm.moriba@emploijeunes.ci', 'GAGNOA', 10),

('MARIAM EPSE DOUMBIA FOFANA', 'ma.doumbia@emploijeunes.ci', 'ODIENNE', 22),

('NANGA AMARA SILUE', 'n.silue@emploijeunes.ci', 'BEOUMI', 20),

('MARIE ANGE TAGRO', 'ma.tagro@emploijeunes.ci', 'ADJAME', 2),
('TOURE Hodou', 'h.toure@emploijeunes.ci', 'DIMBOKRO', 6),

('ADJOUA ISABELLE KOFFI', 'is.koffi@emploijeunes.ci', 'SANPEDRO', 11),

('AWA KONE', 'aw.kone@emploijeunes.ci', 'KORHOGO', 16),

('COULIBALY N\'CAUMONCAUCOUH ROMEO', 'r.coulibaly@emploijeunes.ci', 'GUIGLO', 13),

('KONAN YAO MAXIME', 'ma.konan@emploijeunes.ci', 'MAN-', 19),

('KOFFI KONAN YVES', 'y.koffi@emploijeunes.ci', 'SOUBRE', 23),

('KRAH KARIM', 'k.karim@emploijeunes.ci', 'YAMOUSSOUKRO', 12),

('BAMBA ISSOUFFOU', 'is.bamba@emploijeunes.ci', 'TREICHVILLE', 3),

('KOFFI HAFLE OLGA', 'o.koffi@emploijeunes.ci', 'DIMBOKRO', 6),

('GOULEOUON GEORGINA', 'g.gouleouon@emploijeunes.ci', 'ABOISSO', 18),

('Treich CP', 'cptreich@yopmail.com', 'TREICHVILLE', 3),

('BISSEU GNAHOUA JUSTINE', 'j.gnahoua@emploijeunes.ci', 'ADJAME', 2),

('AMON ALLOUSSENI SAMSON', 's.amon@emploijeunes.ci', 'ABOBO', 1),

('TOTI née NIANGORAN BENIE MARIE CHANTALE', 'mc.toto@emploijeunes.ci', 'KORHOGO', 16),

('DIOMANDE YOUSSOUF', 'y.diomande@emploijeunes.ci', 'SANPEDRO', 11),

('MAMAN RACHIDATOU KONE', 'ra.kone@emploijeunes.ci', 'TREICHVILLE', 3),

('FOFANA AUDE POROTIE SYNTYCHE', 'ps.fofana@emploijeunes.ci', 'YOPOUGON', 4),
('KONE Aïchata Caroline', 'c.kone@emploijeunes.ci', 'YOPOUGON', 4),
('projet conseiller', 'conseillerprojet@emploijeunes.ci', 'ABOBO', 1);*/
        $users = [
            [
                'name' => 'Kan Marcelin Kouadio',
                'email' => 'oldkm.kouadio@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 17
            ],
            [
                'name' => 'Abdoulaye Coulibaly',
                'email' => 'a.coulibaly@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 24
            ],
            [
                'name' => 'AKA JOEL YAO',
                'email' => 'j.yao@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 11
            ],
            [
                'name' => 'ATSE NESTOR SAHOUIN',
                'email' => 'n.sahouin@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 9
            ],
            [
                'name' => 'ALLET LEGER EDDY',
                'email' => 's.eddy1@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 13
            ],
            [
                'name' => 'Jean Pierre Gueye',
                'email' => 'jp.gueye1@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 2
            ],
            [
                'name' => 'AHOUADJIRO ATHANASE HERMANN ANONKAN',
                'email' => 'a.anonkan@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 7
            ],
            [
                'name' => 'SAMBA OUATTARA',
                'email' => 's.ouattara@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 4
            ],
            [
                'name' => 'Angela Kacou',
                'email' => 'a.kacou@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 17
            ],
            [
                'name' => 'ERNEST TAHE',
                'email' => 'e.tahe@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 1
            ],
            [
                'name' => 'KOMENAN PAUL GBOGO',
                'email' => 'p.gbogo@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 8
            ],
            [
                'name' => 'GNAKO LOHOURIGNON',
                'email' => 'j.lohourignon@emlpoijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 10
            ],
            [
                'name' => 'ARIATA OLEMOU MORIBA',
                'email' => 'm.moriba1@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 16
            ],
            [
                'name' => 'ZOHOGBO MARCELIN ZOZO',
                'email' => 'old_m.zozo@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 17
            ],
            [
                'name' => 'KOUAME OLIVIER KAKLA',
                'email' => 'o.kakla@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 4
            ],
            [
                'name' => 'LUCIEN MOZOU',
                'email' => 'l.mozou@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 3
            ],
            [
                'name' => 'BERNARD KONAN',
                'email' => 'b.konan@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 17
            ],
            [
                'name' => 'extraction extraction',
                'email' => 'extraction_thimo@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 17
            ],
            [
                'name' => 'LANDRY FULGENCE MELESS',
                'email' => 'stagiaire.lmeless@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 18
            ],
            [
                'name' => 'SARAH EDWIGE AMAFET EPSE OUATTARA',
                'email' => 'e.ouattara@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 7
            ],
            [
                'name' => 'LUDOVIC SEA',
                'email' => 'l.sea@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 21
            ],
            [
                'name' => 'FATOUMATA BINTOU COULIBALY',
                'email' => 'f.coulibaly@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 4
            ],
            [
                'name' => 'ARIATA OLEMOU MORIBA',
                'email' => 'm.moriba@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 10
            ],
            [
                'name' => 'MARIAM EPSE DOUMBIA FOFANA',
                'email' => 'ma.doumbia@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 22
            ],
            [
                'name' => 'NANGA AMARA SILUE',
                'email' => 'n.silue@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 20
            ],
            [
                'name' => 'MARIE ANGE TAGRO',
                'email' => 'ma.tagro@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 2
            ],
            [
                'name' => 'TOURE Hodou',
                'email' => 'h.toure@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 6
            ],
            [
                'name' => 'ADJOUA ISABELLE KOFFI',
                'email' => 'is.koffi@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 11
            ],
            [
                'name' => 'AWA KONE',
                'email' => 'aw.kone@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 16
            ],
            [
                'name' => "COULIBALY N'CAUMONCAUCOUH ROMEO",
                'email' => 'r.coulibaly@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 13
            ],
            [
                'name' => "KONAN YAO MAXIME",
                'email' => 'ma.konan@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 19
            ],
            [
                'name' => "KOFFI KONAN YVES",
                'email' => 'y.koffi@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 23
            ],
            [
                'name' => "KRAH KARIM",
                'email' => 'k.karim@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 12
            ],
            [
                'name' => "BAMBA ISSOUFFOU",
                'email' => 'is.bamba@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 3
            ],
            [
                'name' => "KOFFI HAFLE OLGA",
                'email' => 'o.koffi@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 6
            ],
            [
                'name' => "GOULEOUON GEORGINA",
                'email' => 'g.gouleouon@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 18
            ],
            [
                'name' => "Treich CP",
                'email' => 'cptreich@yopmail.com',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 3
            ],
            [
                'name' => "BISSEU GNAHOUA JUSTINE",
                'email' => 'j.gnahoua@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 2
            ],
            [
                'name' => "AMON ALLOUSSENI SAMSON",
                'email' => 's.amon@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 1
            ],
            [
                'name' => "TOTI née NIANGORAN BENIE MARIE CHANTALE",
                'email' => 'mc.toto@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 16
            ],
            [
                'name' => "DIOMANDE YOUSSOUF",
                'email' => 'y.diomande@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 11
            ],
            [
                'name' => "MAMAN RACHIDATOU KONE",
                'email' => 'ra.kone@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 3
            ],
            [
                'name' => "FOFANA AUDE POROTIE SYNTYCHE",
                'email' => 'ps.fofana@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 4
            ],
            [
                'name' => "KONE Aïchata Caroline",
                'email' => 'c.kone@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 4
            ],
            [
                'name' => "projet conseiller",
                'email' => 'conseillerprojet@emploijeunes.ci',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'agence_id' => 1
            ]
        ];

        DB::table('users')->insert($users);
    }
}
