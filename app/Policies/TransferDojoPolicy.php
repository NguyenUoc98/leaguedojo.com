<?php

namespace App\Policies;

use TCG\Voyager\Contracts\User;
use TCG\Voyager\Policies\BasePolicy;

class TransferDojoPolicy extends BasePolicy
{
    /**
     * Determine if the given model can be deleted by the user.
     *
     * @param \TCG\Voyager\Contracts\User $user
     * @param  $model
     *
     * @return bool
     */
    public function confirm(User $user, $model)
    {
        return $user->hasPermission('confirm_transfer_dojos');
    }
}
