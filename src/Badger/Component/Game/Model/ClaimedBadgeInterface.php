<?php

namespace Badger\Component\Game\Model;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * ClaimedBadgeInterface to describe claimed badges
 *
 * @author  Pierre Allard <pierre.allard@akeneo.com>
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 */
interface ClaimedBadgeInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $id
     */
    public function setId($id);

    /**
     * @return UserInterface
     */
    public function getUser();

    /**
     * @param UserInterface $user
     */
    public function setUser($user);

    /**
     * @return BadgeInterface
     */
    public function getBadge();

    /**
     * @param BadgeInterface $badge
     */
    public function setBadge($badge);

    /**
     * @return \DateTime
     */
    public function getClaimedDate();

    /**
     * @param \DateTime $claimedDate
     */
    public function setClaimedDate($claimedDate);
}
