<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecteuracitiviteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $secteuracitivites = DB::select('insert into secteuracitivites (id, libelle, description, created_at, updated_at, migration_key, actif) VALUES
	(1, "ADMINISTRATION", "ADMINISTRATION", "2018-03-01 19:18:33", NULL, "1", 1),
	(2, "Agriculture/Elevage/Peche", "Agriculture/Elevage/Peche", "2018-03-01 19:18:33", NULL, "2", 1),
	(3, "BTP (Batment Travaux Publics)", "BTP (Batment Travaux Publics)", "2018-03-01 19:18:33", NULL, "3", 1),
	(4, "Commerce", "Commerce", "2018-03-01 19:18:33", NULL, "4", 1),
	(5, "Communication/Telecommunication", "Communication/Telecommunication", "2018-03-01 19:18:33", NULL, "5", 1),
	(6, "Education", "Education", "2018-03-01 19:18:33", NULL, "6", 1),
	(7, "Finance/Economie/Statist.Assur./Banque", "Finance/Economie/Statist.Assur./Banque", "2018-03-01 19:18:33", NULL, "7", 1),
	(8, "Hotellerie/Restauration", "Hotellerie/Restauration", "2018-03-01 19:18:33", NULL, "8", 1),
	(9, "Industrie/Chimie/Agro./Energie", "Industrie/Chimie/Agro./Energie", "2018-03-01 19:18:33", NULL, "9", 1),
	(10, "Industrie/Electricite/Electronique/Electromecanique/Maintenance", "Industrie/Electricite/Electronique/Electromecanique/Maintenance", "2018-03-01 19:18:33", NULL, "10", 1),
	(11, "Industrie /Materiaux Souples et Associes/Mines", "Industrie /Materiaux Souples et Associes/Mines", "2018-03-01 19:18:33", NULL, "11", 1),
	(12, "Industrie/Mecanique/Metallurgique", "Industrie/Mecanique/Metallurgique", "2018-03-01 19:18:33", NULL, "12", 1),
	(13, "Industrie du Bois", "Industrie du Bois", "2018-03-01 19:18:33", NULL, "13", 1),
	(14, "Informatique", "Informatique", "2018-03-01 19:18:33", NULL, "14", 1),
	(15, "Loisirs/Spectacles/Metiers d\'Art", "Loisirs/Spectacles/Metiers d\'Art", "2018-03-01 19:18:33", NULL, "15", 1),
	(16, "Medical", "Medical", "2018-03-01 19:18:33", NULL, "16", 1),
	(17, "Services", "Services", "2018-03-01 19:18:33", NULL, "17", 1),
	(18, "Transport/Approvisionnement/Logistique", "Transport/Approvisionnement/Logistique", "2018-03-01 19:18:33", NULL, "18", 1),
	(19, "Autres a Preciser", "Autres a Preciser", "2018-03-01 19:18:33", NULL, "19", 1),
	(20, "Divers", "Divers", "2018-03-01 19:18:33", NULL, "20", 1),
	(21, "Sans secteur", "Sans secteur", "2018-03-01 19:18:33", NULL, "21", 1),
	(22, "Agriculture", "Agriculture", "2018-03-01 22:31:50", NULL, "1", 1 ),
	(23, "Elevage", "Elevage", "2018-03-01 22:31:50", NULL, "2", 1 ),
	(24, "Agroalimentaire", "Agroalimentaire", "2018-03-01 22:31:50", NULL, "3", 1 ),
	(25, "Agropastoral", "Agropastoral", "2018-03-01 22:31:50", NULL, "4", 1 ),
	(26, "Commerce", "Commerce", "2018-03-01 22:31:50", NULL, "5", 1 ),
	(27, "Industrie", "Industrie", "2018-03-01 22:31:50", NULL, "6", 1),
	(28, "Services", "Services", "2018-03-01 22:31:50", NULL, "7", 1),
	(29, "NTIC", "NTIC", "2018-03-01 22:31:50", NULL, "8", 1),
	(30, "Architecture-Design", "Architecture-Design", "2018-03-01 22:31:50", NULL, "9", 1),
	(31, "Art-Culture-Loisirs", "Art-Culture-Loisirs", "2018-03-01 22:31:50", NULL, "10", 1),
	(32, "Banque-Assurance", "Banque-Assurance", "2018-03-01 22:31:50", NULL, "11", 1),
	(33, "Audiovisuel-Multimedia", "Audiovisuel-Multimedia", "2018-03-01 22:31:50", NULL, "12", 1),
	(34, "Automobile", "Automobile", "2018-03-01 22:31:50", NULL, "13", 1),
	(35, "Biens de consommation", "Biens de consommation", "2018-03-01 22:31:50", NULL, "14", 1),
	(36, "BTP-Construction", "BTP-Construction", "2018-03-01 22:31:50", NULL, "15", 1),
	(37, "Edition Imprimerie", "Edition Imprimerie", "2018-03-01 22:31:50", NULL, "16", 1),
	(38, "Energie-Eau", "Energie-Eau", "2018-03-01 22:31:50", NULL, "17", 1),
	(39, "Enseignement-Formation", "Enseignement-Formation", "2018-03-01 22:31:50", NULL, "18", 1),
	(40, "Grande Distribution", "Grande Distribution", "2018-03-01 22:31:50", NULL, "19", 1),
	(41, "Hotellerie-Restauration", "Hotellerie-Restauration", "2018-03-01 22:31:50", NULL, "20", 1),
	(42, "Sante", "Sante", "2018-03-01 22:31:50", NULL, "21", 1),
	(43, "Sport", "Sport", "2018-03-01 22:31:50", NULL, "22", 1),
	(44, "Tourisme", "Tourisme", "2018-03-01 22:31:50", NULL, "23", 1),
	(45, "Transport", "Transport", "2018-03-01 22:31:50", NULL, "24", 1),
	(46, "Autre", "Autre", "2018-03-01 22:31:50", NULL, "25", 1 )');
    }
}
