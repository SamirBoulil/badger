<?php

namespace Ironforge\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

class User extends BaseUser
{
    /** @var string */
    protected $id;

    /** @var string */
    protected $github_id;

    /** @var string */
    protected $github_access_token;

    /** @var string */
    protected $profilePicture;

    /**
     * @return string
     */
    public function getGithubId()
    {
        return $this->github_id;
    }

    /**
     * @param string $github_id
     */
    public function setGithubId($github_id)
    {
        $this->github_id = $github_id;
    }

    /**
     * @return string
     */
    public function getGithubAccessToken()
    {
        return $this->github_access_token;
    }

    /**
     * @param string $github_access_token
     */
    public function setGithubAccessToken($github_access_token)
    {
        $this->github_access_token = $github_access_token;
    }

    /**
     * @return string
     */
    public function getProfilePicture()
    {
        return $this->profilePicture;
    }

    /**
     * @param string $profilePicture
     */
    public function setProfilePicture($profilePicture)
    {
        $this->profilePicture = $profilePicture;
    }
}
