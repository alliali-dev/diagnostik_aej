<?php

namespace App\Http\Controllers;

use App\Models\Rencontre;
use App\Models\SuiviRencontre;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data_md = [
            'labels' => [],
            'values' => [],
        ];

        $data_axt = [
            'labels' => [],
            'values' => [],
        ];

        $data = [
            'labels' => [],
            'values' => [],
        ];

        $recaxetravail = Rencontre::mine()
            ->select(array(
                DB::raw('axetravail as `axetravail`'),
                DB::raw("count(axetravail) axetravailcount")
            ))
            ->groupBy('axetravail')
            ->get();

        foreach ($recaxetravail as $term) {
            $data_axt['labels'][] = $term->axetravail;
            $data_axt['values'][] = $term->axetravailcount;
        }

        $recaxetravailjs = app()->chartjs
            ->name('pieChartTestaxe')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels($data_axt['labels'])
            ->datasets([
                [
                    'backgroundColor' => ['#FF6384', '#36A2EB','#37a844','#f8a602'],
                    'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                    'data' => $data_axt['values']
                ]
            ])->options([]);


        $recmodalite = Rencontre::mine()
            ->select(array(
                DB::raw('modalite as `modalite`'),
                DB::raw("count(modalite) modalitecunt")
            ))
            ->groupBy('modalite')
            ->get();


        foreach ($recmodalite as $term) {
            $data_md['labels'][] = $term->modalite;
            $data_md['values'][] = $term->modalitecunt;
        }

        $recmodalitejs = app()->chartjs
            ->name('pieChartTest1')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels($data_md['labels'])
            ->datasets([
                [
                    'backgroundColor' => ['#008080', '#0000FF'],
                    'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                    'data' => $data_md['values']
                ]
            ])
            ->options([]);

        $rencs = Rencontre::mine()
            ->select(array(
                DB::raw('presencedemandeur as `presencedemandeur`'),
                DB::raw("count(presencedemandeur) prdecount")
            ))
            ->groupBy('presencedemandeur')
            ->get();

        foreach ($rencs as $renc) {
            $data['labels'][] = $renc->presencedemandeur;
            $data['values'][] = $renc->prdecount;
        }


        $prdejs = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels($data['labels'])
            ->datasets([
                [
                    'backgroundColor' => ['#005C96', '#800000','rgb(6, 169, 83)','#FF00FF'],
                    'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                    'data' => $data['values']
                ]
            ])
            ->options([]);

        $rencontres = Rencontre::mine();
        $suivierencontres = SuiviRencontre::mine();

        return view('home',compact('rencontres','prdejs','recmodalitejs','recaxetravailjs','suivierencontres'));
    }
}
