<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profile
 * @ORM\Table(name="profile")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProfileRepository")
 */
class Profile {
	/**
	 * @var int
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 * @ORM\Column(name="name", type="string", length=50)
	 */
	private $name;

	/**
	 * @var string
	 * @ORM\Column(name="last_name", type="string", length=255)
	 */
	private $lastName;

	/**
	 * @var string
	 * @ORM\Column(name="phone_number", type="string", length=255)
	 */
	private $phoneNumber;

	/**
	 * @var string
	 * @ORM\Column(name="avatar", type="string", length=255)
	 */
	private $avatar;

	/**
	 * @var string
	 * @ORM\Column(name="sex", type="string", length=1)
	 */
	private $sex;

	/**
	 * @var User
	 * @ORM\OneToOne(targetEntity="User", inversedBy="profile")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
	 */
	private $user;

	/**
	 * Get id
	 * @return int
	 */
	public function getId(){
		return $this->id;
	}

	/**
	 * Set name
	 *
	 * @param string $name
	 *
	 * @return Profile
	 */
	public function setName($name){
		$this->name = $name;

		return $this;
	}

	/**
	 * Get name
	 * @return string
	 */
	public function getName(){
		return $this->name;
	}

	/**
	 * Set lastName
	 *
	 * @param string $lastName
	 *
	 * @return Profile
	 */
	public function setLastName($lastName){
		$this->lastName = $lastName;

		return $this;
	}

	/**
	 * Get lastName
	 * @return string
	 */
	public function getLastName(){
		return $this->lastName;
	}

	/**
	 * @return string
	 */
	public function getPhoneNumber(){
		return $this->phoneNumber;
	}

	/**
	 * @param string $phoneNumber
	 */
	public function setPhoneNumber($phoneNumber){
		$this->phoneNumber = $phoneNumber;
	}

	/**
	 * @return string
	 */
	public function getAvatar(){
		return $this->avatar;
	}

	/**
	 * @param string $avatar
	 */
	public function setAvatar($avatar){
		$this->avatar = $avatar;
	}

	/**
	 * Set user
	 *
	 * @param \AppBundle\Entity\User $user
	 *
	 * @return Profile
	 */
	public function setUser(\AppBundle\Entity\User $user = null){
		$this->user = $user;

		return $this;
	}

	/**
	 * Get user
	 * @return \AppBundle\Entity\User
	 */
	public function getUser(){
		return $this->user;
	}

	/**
	 * @return string
	 */
	public function getSex(){
		return $this->sex;
	}

	/**
	 * @param string $sex
	 */
	public function setSex($sex){
		$this->sex = $sex;
	}
}
