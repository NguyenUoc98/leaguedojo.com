<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class RemovePlaylist extends AbstractAction
{
    public function getTitle()
    {
        return 'Xóa khỏi Playlist';
    }

    public function getIcon()
    {
        return 'voyager-move';
    }

    public function getPolicy()
    {
        return 'delete';
    }

    public function getAttributes()
    {
        return [
            'class'   => 'btn btn-sm btn-dark',
            'data-id' => $this->data->{$this->data->getKeyName()},
            'id'      => 'remove-'.$this->data->{$this->data->getKeyName()},
        ];
    }

    public function getDefaultRoute()
    {
        return route('videos.remove', $this->data->{$this->data->getKeyName()});
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'videos' && $this->data->playlist_id != null;
    }
}
