<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"admin" = "Admin", "users" = "Users", "manager"= "Manager"})
 */
abstract class User extends BaseUser {
	/**
	 * @var int
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(name="api_key", type="string", unique=true)
	 */
	private $apiKey;

	/**
	 * @var Profile
	 * @ORM\OneToOne(targetEntity="Profile", mappedBy="user")
	 */
	private $profile;

	/**
	 * @return mixed
	 */
	public function getApiKey(){
		return $this->apiKey;
	}

	/**
	 * @param mixed $apiKey
	 */
	public function setApiKey($apiKey){
		$this->apiKey = $apiKey;
	}


	/**
	 * Set profile
	 *
	 * @param \AppBundle\Entity\Profile $profile
	 *
	 * @return User
	 */
	public function setProfile(\AppBundle\Entity\Profile $profile = null){
		$this->profile = $profile;

		return $this;
	}

	/**
	 * Get profile
	 * @return \AppBundle\Entity\Profile
	 */
	public function getProfile(){
		return $this->profile;
	}
}
