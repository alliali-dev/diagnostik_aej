<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NiveauetudeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveauetude = DB::select('insert into niveauetudes (id, libelle, description, bacplus, old, actif, created_at, updated_at, deleted_at, migration_key) VALUES
	(1, "AUCUN", NULL, NULL, 0, 1, "2012-07-02 14:34:49", NULL, NULL, "1"),
	(2, "CP1", NULL, NULL, 10, 1, "2012-07-02 14:35:02", NULL, NULL, "2"),
	(3, "CP2", NULL, NULL, 20, 1, "2012-07-02 14:35:09", NULL, NULL, "3"),
	(4, "CE1", NULL, NULL, 30, 1, "2012-07-02 14:35:18", NULL, NULL, "4"),
	(5, "CE2", NULL, NULL, 40, 1, "2012-07-02 14:35:25", NULL, NULL, "5"),
	(6, "CM1", NULL, NULL, 50, 1, "2012-07-02 14:35:53", NULL, NULL, "6"),
	(7, "CM2", NULL, NULL, 60, 1, "2012-07-02 14:35:59", NULL, NULL, "7"),
	(8, "6EME", NULL, NULL, 70, 1, "2012-07-02 14:36:07", NULL, NULL, "8"),
	(9, "5EME", NULL, NULL, 80, 1, "2012-07-02 14:36:15", NULL, NULL, "9"),
	(10, "4EME", NULL, NULL, 90, 1, "2012-07-02 14:36:26", NULL, NULL, "10"),
	(11, "3EME", NULL, NULL, 100, 1, "2012-07-02 14:36:34", NULL, NULL, "11"),
	(12, "2NDE", NULL, NULL, 110, 1, "2012-07-02 14:36:41", NULL, NULL, "12"),
	(13, "1ERE", NULL, NULL, 120, 1, "2012-07-02 14:36:48", NULL, NULL, "13"),
	(14, "TERMINALE", NULL, NULL, 130, 1, "2012-07-02 14:36:54", NULL, NULL, "14"),
	(15, "BAC+1", NULL, NULL, 140, 1, "2012-07-02 14:37:02", NULL, NULL, "15"),
	(16, "BAC+2", NULL, NULL, 150, 1, "2012-07-02 14:37:12", NULL, NULL, "16"),
	(17, "BAC+3", NULL, NULL, 160, 1, "2012-07-02 14:37:27", NULL, NULL, "17"),
	(18, "BAC+4", NULL, NULL, 170, 1, "2012-07-02 14:37:34", NULL, NULL, "18"),
	(19, "BAC+5", NULL, NULL, 180, 1, "2012-07-02 14:37:42", NULL, NULL, "19"),
	(20, "BAC+6 et plus", NULL, NULL, 190, 1, "2012-07-02 14:37:59", NULL, NULL, "20"),
	(21, "INDIFFERENT", NULL, NULL, 0, 1, "2018-03-01 19:51:13", NULL, NULL, "21")');
    }
}
