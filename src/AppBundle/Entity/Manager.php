<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;

/**
 * HouseOwner
 * @ORM\Table(name="house_owner")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HouseOwnerRepository")
 * @UniqueEntity(fields = "username", targetClass = "AppBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "AppBundle\Entity\User", message="fos_user.email.already_used")
 */
class Manager extends User {
	/**
	 * @var int
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @var Property
	 * @ORM\OneToMany(targetEntity="Property", mappedBy="manager")
	 **/
	private $properties;

	/**
	 * Add property
	 *
	 * @param \AppBundle\Entity\Property $property
	 *
	 * @return HouseOwner
	 */
	public function addProperty(\AppBundle\Entity\Property $property){
		$this->properties[] = $property;

		return $this;
	}

	/**
	 * Remove property
	 *
	 * @param \AppBundle\Entity\Property $property
	 */
	public function removeProperty(\AppBundle\Entity\Property $property){
		$this->properties->removeElement($property);
	}

	/**
	 * Get properties
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getProperties(){
		return $this->properties;
	}
}
