<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class Restore extends AbstractAction
{
    public function getTitle()
    {
        return __('voyager::generic.restore');
    }

    public function getIcon()
    {
        return 'voyager-download';
    }

    public function getPolicy()
    {
        return 'delete';
    }

    public function getAttributes()
    {
        return [
            'class'   => 'btn btn-sm btn-info',
            'data-id' => $this->data->{$this->data->getKeyName()},
            'id'      => 'restore-' . $this->data->{$this->data->getKeyName()},
        ];
    }

    public function getDefaultRoute()
    {
        return route('voyager.' . $this->dataType->slug . '.restore', $this->data->{$this->data->getKeyName()});
    }

    public function shouldActionDisplayOnDataType()
    {
        $model = $this->data->getModel();
        if (!($model && in_array(\Illuminate\Database\Eloquent\SoftDeletes::class,
                class_uses($model)) && $this->data->deleted_at)) {
            return false;
        }

        return $this->dataType->name === $this->getDataType() || $this->getDataType() === null;

    }
}
