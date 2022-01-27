<?php

namespace App\Http\Livewire;

use App\Helpers\CollectionHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AchievementTable extends Component
{
    use WithPagination;

    public function render()
    {
        $student = Auth::user()->student;
        $achievements = $student->achievements()->select(DB::raw('*, YEAR(date) as year'))->orderByDesc('year')->get()->groupBy('year');
        return view('livewire.achievement-table', [
            'achievements' => CollectionHelper::paginate($achievements, 10),
        ]);
    }
}
