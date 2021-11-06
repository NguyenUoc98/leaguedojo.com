<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class Reject extends AbstractAction
{
    public function getTitle()
    {
        return 'Từ chối';
    }

    public function getIcon()
    {
        return 'voyager-x';
    }

    public function getPolicy()
    {
        return 'confirm';
    }

    public function getAttributes()
    {
        return [
            'class'   => 'btn btn-sm btn-danger reject',
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
