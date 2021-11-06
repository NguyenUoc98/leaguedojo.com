<?php

namespace App\Models;

use App\Traits\FormLayoutTrait;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use FormLayoutTrait;
    protected $fillable = ['used'];

    public function formFields()
    {
        return $this
            ->beginDiv('row')
                ->beginDiv('col-md-6')
                    ->field('code', 6)->field('month_limit', 6)
                    ->field('percent', 6)->field('max_price', 6)
                    ->field('amount', 6)->field('used', 6)
                    ->field('type', 6)->field('expiry_date', 6)
                    ->field('voucher_belongsto_dojo_relationship', 12)
                ->endDiv()
                ->beginDiv('col-md-6')
                    ->field('image', 12)
                    ->field('note', 12)
                ->endDiv()
            ->endDiv()
            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function dojos()
    {
        return $this->belongsToMany(Dojo::class);
    }
}
