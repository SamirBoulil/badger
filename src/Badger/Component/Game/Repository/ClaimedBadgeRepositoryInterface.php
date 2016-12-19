<?php

namespace Badger\Component\Game\Repository;

use Doctrine\Common\Persistence\ObjectRepository;
use Badger\UserBundle\Entity\User;

/**
 * Repository interface for ClaimedBadge entities.
 *
 * @author  Adrien Pétremann <hello@grena.fr>
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 */
interface ClaimedBadgeRepositoryInterface extends ObjectRepository
{
    /**
     * Get all Badge ids claimed by the given $user.
     *
     * @param User $user
     *
     * @return array
     */
    public function getBadgeIdsClaimedByUser(User $user);
}
