<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TestScoreTable extends Component
{
    use WithPagination;

    public function render()
    {
        $student    = Auth::user()->student;
        $testScores = $student->testScores()->paginate(10);
        return view('livewire.test-score-table', [
            'testScores' => $testScores,
        ]);
    }
}
