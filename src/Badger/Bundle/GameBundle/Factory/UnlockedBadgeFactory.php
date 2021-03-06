<?php

namespace Badger\Bundle\GameBundle\Factory;

use Badger\Bundle\GameBundle\Entity\UnlockedBadge;
use Badger\Component\Game\Factory\UnlockedBadgeFactoryInterface;
use Badger\Component\Game\Model\BadgeInterface;
use Badger\Component\User\Model\UserInterface;

/**
 * @author  Adrien Pétremann <hello@grena.fr>
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 */
class UnlockedBadgeFactory implements UnlockedBadgeFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function create(UserInterface $user, BadgeInterface $badge)
    {
        $unlockedBadge = new UnlockedBadge();

        $unlockedBadge->setUser($user);
        $unlockedBadge->setBadge($badge);
        $unlockedBadge->setUnlockedDate(new \DateTime());

        return $unlockedBadge;
    }
}
