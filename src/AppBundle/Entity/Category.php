<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 */
class Category {
	/**
	 * @var int
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 * @ORM\Column(name="name", type="string", length=255)
	 */
	private $name;

	/**
	 * @var string
	 * @ORM\Column(name="description", type="text")
	 */
	private $description;

	/**
	 * var Property
	 * @ORM\ManyToMany(targetEntity="Property", mappedBy="categories")
	 **/
	private $properties;


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
	 * @return Category
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
	 * Set description
	 *
	 * @param string $description
	 *
	 * @return Category
	 */
	public function setDescription($description){
		$this->description = $description;

		return $this;
	}

	/**
	 * Get description
	 * @return string
	 */
	public function getDescription(){
		return $this->description;
	}
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->properties = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add property
     *
     * @param \AppBundle\Entity\Property $property
     *
     * @return Category
     */
    public function addProperty(\AppBundle\Entity\Property $property)
    {
        $this->properties[] = $property;

        return $this;
    }

    /**
     * Remove property
     *
     * @param \AppBundle\Entity\Property $property
     */
    public function removeProperty(\AppBundle\Entity\Property $property)
    {
        $this->properties->removeElement($property);
    }

    /**
     * Get properties
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProperties()
    {
        return $this->properties;
    }
}
