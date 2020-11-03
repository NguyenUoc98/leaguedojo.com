<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class Confirm extends AbstractAction
{
    public function getTitle()
    {
        return 'Xác nhận';
    }

    public function getIcon()
    {
        return 'voyager-check';
    }

    public function getPolicy()
    {
        return 'confirm';
    }

    public function getAttributes()
    {
        return [
            'class'   => 'btn btn-sm btn-info confirm',
            'data-id' => $this->data->{$this->data->getKeyName()},
            'id'      => 'confirm-' . $this->data->{$this->data->getKeyName()},
        ];
    }

    public function getDefaultRoute()
    {
        return 'javascript:;';
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->data->confirmed == 'WAIT';
    }
}
