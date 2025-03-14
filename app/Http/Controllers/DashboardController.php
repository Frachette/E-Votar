<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Program;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $this->showCandidates();
    }
    public function showCandidates()
    {
        $candidates = $this->getCandidates();

        return view('evotar.admin.dashboard', compact('candidates'));
    }

    public function getCandidates()
    {
        $candidates = Candidate::all();

        return $candidates;
    }

    public function getLabels()
    {
        $labels = Program::pluck('name')->toArray();

        $colors = [
            '#6B46C1',
            '#5A67D8',
            '#3182CE',
            '#ECC94B',
            '#ED8936',
            '#D53F8C'
        ];

        $colors = array_slice($colors, 0, count($labels));

        $votes = [10, 20, 30, 25, 15, 5];

        // Return the data as JSON
        return response()->json([
            'labels' => $labels,
            'colors' => $colors,
            'votes' => $votes,
        ]);
    }

}
