<?php

namespace Badger\Bundle\UserBundle\Doctrine\Repository;

use Badger\Component\User\Repository\UserRepositoryInterface;
use Doctrine\ORM\EntityRepository;

/**
 * @author  Adrien Pétremann <hello@grena.fr>
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 */
class UserRepository extends EntityRepository implements UserRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function countAll()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select($qb->expr()->count('u'))
            ->from('UserBundle:User', 'u');

        $query = $qb->getQuery();

        return $query->getSingleScalarResult();
    }

    /**
     * {@inheritdoc}
     */
    public function getSortedUserByUnlockedBadges($order = 'DESC', $limit = 10)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('u AS user, COUNT(ub.id) AS nbUnlockedBadges')
            ->from('UserBundle:User', 'u')
            ->leftJoin('GameBundle:UnlockedBadge', 'ub')
            ->where('ub.user = u')
            ->setMaxResults($limit)
            ->orderBy('nbUnlockedBadges', $order)
            ->groupBy('u')
        ;

        $query = $qb->getQuery();

        return $query->getResult();
    }

    /**
     * {@inheritdoc}
     */
    public function getAllUsernames()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('u.username')
            ->from('UserBundle:User', 'u')
        ;

        return $qb->getQuery()->getResult();
    }
}
