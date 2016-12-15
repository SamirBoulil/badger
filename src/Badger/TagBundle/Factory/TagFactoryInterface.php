<?php

namespace Badger\TagBundle\Factory;

use Badger\TagBundle\Entity\Tag;

/**
 * @author  Adrien Pétremann <adrien.petremann@akeneo.com>
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 */
interface TagFactoryInterface
{
    /**
     * Create a Tag instance.
     *
     * @return Tag
     */
    public function create();
}
