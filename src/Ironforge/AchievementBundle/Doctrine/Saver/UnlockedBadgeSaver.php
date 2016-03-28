<?php

namespace Ironforge\AchievementBundle\Doctrine\Saver;

use Doctrine\Common\Persistence\ObjectManager;
use Ironforge\AchievementBundle\AchievementEvents;
use Ironforge\AchievementBundle\Event\BadgeUnlockEvent;
use Ironforge\StorageUtilsBundle\Saver\SaverInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Acl\Util\ClassUtils;

/**
 * @author Adrien Pétremann <adrien.petremann@akeneo.com>
 */
class UnlockedBadgeSaver implements SaverInterface
{
    /** @var ObjectManager */
    protected $objectManager;

    /** @var EventDispatcherInterface */
    protected $eventDispatcher;

    /** @var string */
    protected $savedClass;

    /**
     * @param ObjectManager            $objectManager
     * @param EventDispatcherInterface $eventDispatcher
     * @param string                   $savedClass
     */
    public function __construct(
        ObjectManager $objectManager,
        EventDispatcherInterface $eventDispatcher,
        $savedClass
    ) {
        $this->objectManager = $objectManager;
        $this->savedClass = $savedClass;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * {@inheritdoc}
     */
    public function save($unlockedBadge, array $options = [])
    {
        if (false === ($unlockedBadge instanceof $this->savedClass)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Expects a "%s", "%s" provided.',
                    $this->savedClass,
                    ClassUtils::getRealClass($unlockedBadge)
                )
            );
        }

        $this->objectManager->persist($unlockedBadge);
        $this->objectManager->flush();

        $event = new BadgeUnlockEvent($unlockedBadge);
        $this->eventDispatcher->dispatch(AchievementEvents::USER_UNLOCKS_BADGE, $event);
    }
}
