<?php

namespace App\Http\Livewire;

use App\Helpers\CollectionHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class MedalTable extends Component
{
    use WithPagination;

    public function render()
    {
        // Lấy tất cả huy chương
        $student = Auth::user()->student;
        $achievements = $student->achievements()->select(DB::raw('*,YEAR(date) as year'))->orderByDesc('year')->get()->groupBy('year');
        $totalMedals  = collect($achievements)->map(function ($value, $key) {
            return collect($value)->map(function ($vl) {
                return $vl['medal'];
            });
        })->map(function ($achievement) {
            return array_count_values($achievement->toArray());
        });
        return view('livewire.medal-table', [
            'totalMedals' => CollectionHelper::paginate($totalMedals, 5)
        ]);
    }
}
