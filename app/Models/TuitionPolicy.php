<?php

namespace App\Models;

use App\Traits\FormLayoutTrait;
use Illuminate\Database\Eloquent\Model;

class TuitionPolicy extends Model
{
    use FormLayoutTrait;

    public function formFields()
    {
        return $this
            ->beginDiv('row')
                ->beginDiv('col-md-6')
                    ->field('tuition_policy_belongsto_dojo_relationship', 7)->field('price', 5)
                    ->field('date_apply', 7)->field('policy', 5)
                ->endDiv()
                ->beginDiv('col-md-6')
                ->field('note', 12)
                ->endDiv()
            ->endDiv()->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dojo()
    {
        return $this->belongsTo(Dojo::class);
    }
}
