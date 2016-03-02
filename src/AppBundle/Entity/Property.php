<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Property
 * @ORM\Table(name="property")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PropertyRepository")
 */
class Property {
	/**
	 * @var int
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 * @ORM\Column(name="plants", type="string", length=255)
	 */
	private $plants;

	/**
	 * @var float
	 * @ORM\Column(name="surface", type="float")
	 */
	private $surface;

	/**
	 * @var float
	 * @ORM\Column(name="price", type="float")
	 */
	private $price;

	/**
	 * @var int
	 * @ORM\Column(name="roomNumbers", type="integer")
	 */
	private $roomNumbers;

	/**
	 * @var int
	 * @ORM\Column(name="bathroomsNumber", type="integer")
	 */
	private $bathroomsNumber;

	/**
	 * @var string
	 * @ORM\Column(name="conditions", type="text")
	 */
	private $conditions;

	/**
	 * @var bool
	 * @ORM\Column(name="available", type="boolean")
	 */
	private $available;

	/**
	 * @var \DateTime
	 * @ORM\Column(name="availableFrom", type="date")
	 */
	private $availableFrom;

	/**
	 * @var \DateTime
	 * @ORM\Column(name="availableTo", type="date")
	 */
	private $availableTo;

	/**
	 * @var string
	 * @ORM\Column(name="description", type="text")
	 */
	private $description;

	/**
	 * @var Address
	 * @ORM\OneToOne(targetEntity="Address", mappedBy="property")
	 * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
	 */
	private $address;

	/**
	 * @var Type
	 * @ORM\ManyToOne(targetEntity="Type", inversedBy="properties")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="type_id", referencedColumnName="id")
	 * })
	 */
	private $type;

	/**
	 * var Category
	 * @ORM\ManyToMany(targetEntity="Category", mappedBy="properties")
	 **/
	private $categories;

	/**
	 * var Service
	 * @ORM\ManyToMany(targetEntity="Service", mappedBy="properties")
	 **/
	private $services;

	/**
	 * @var Manager
	 * @ORM\ManyToOne(targetEntity="Manager", inversedBy="properties")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="manager_id", referencedColumnName="id")
	 * })
	 */
	private $manager;

	/**
	 * var Further
	 * @ORM\ManyToMany(targetEntity="Further", mappedBy="properties")
	 **/
	private $furthers;

	/**
	 * Get id
	 * @return int
	 */
	public function getId(){
		return $this->id;
	}

	/**
	 * Set plants
	 *
	 * @param string $plants
	 *
	 * @return Property
	 */
	public function setPlants($plants){
		$this->plants = $plants;

		return $this;
	}

	/**
	 * Get plants
	 * @return string
	 */
	public function getPlants(){
		return $this->plants;
	}

	/**
	 * Set surface
	 *
	 * @param float $surface
	 *
	 * @return Property
	 */
	public function setSurface($surface){
		$this->surface = $surface;

		return $this;
	}

	/**
	 * Get surface
	 * @return float
	 */
	public function getSurface(){
		return $this->surface;
	}

	/**
	 * Set price
	 *
	 * @param float $price
	 *
	 * @return Property
	 */
	public function setPrice($price){
		$this->price = $price;

		return $this;
	}

	/**
	 * Get price
	 * @return float
	 */
	public function getPrice(){
		return $this->price;
	}

	/**
	 * Set roomNumbers
	 *
	 * @param integer $roomNumbers
	 *
	 * @return Property
	 */
	public function setRoomNumbers($roomNumbers){
		$this->roomNumbers = $roomNumbers;

		return $this;
	}

	/**
	 * Get roomNumbers
	 * @return int
	 */
	public function getRoomNumbers(){
		return $this->roomNumbers;
	}

	/**
	 * Set bathroomsNumber
	 *
	 * @param integer $bathroomsNumber
	 *
	 * @return Property
	 */
	public function setBathroomsNumber($bathroomsNumber){
		$this->bathroomsNumber = $bathroomsNumber;

		return $this;
	}

	/**
	 * Get bathroomsNumber
	 * @return int
	 */
	public function getBathroomsNumber(){
		return $this->bathroomsNumber;
	}

	/**
	 * Set conditions
	 *
	 * @param string $conditions
	 *
	 * @return Property
	 */
	public function setConditions($conditions){
		$this->conditions = $conditions;

		return $this;
	}

	/**
	 * Get conditions
	 * @return string
	 */
	public function getConditions(){
		return $this->conditions;
	}

	/**
	 * Set available
	 *
	 * @param boolean $available
	 *
	 * @return Property
	 */
	public function setAvailable($available){
		$this->available = $available;

		return $this;
	}

	/**
	 * Get available
	 * @return bool
	 */
	public function getAvailable(){
		return $this->available;
	}

	/**
	 * Set availableFrom
	 *
	 * @param \DateTime $availableFrom
	 *
	 * @return Property
	 */
	public function setAvailableFrom($availableFrom){
		$this->availableFrom = $availableFrom;

		return $this;
	}

	/**
	 * Get availableFrom
	 * @return \DateTime
	 */
	public function getAvailableFrom(){
		return $this->availableFrom;
	}

	/**
	 * Set availableTo
	 *
	 * @param \DateTime $availableTo
	 *
	 * @return Property
	 */
	public function setAvailableTo($availableTo){
		$this->availableTo = $availableTo;

		return $this;
	}

	/**
	 * Get availableTo
	 * @return \DateTime
	 */
	public function getAvailableTo(){
		return $this->availableTo;
	}

	/**
	 * Set description
	 *
	 * @param string $description
	 *
	 * @return Property
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
        $this->categories = new ArrayCollection();
        $this->services = new ArrayCollection();
    }

    /**
     * Set address
     *
     * @param \AppBundle\Entity\Address $address
     *
     * @return Property
     */
    public function setAddress(\AppBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \AppBundle\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set type
     *
     * @param \AppBundle\Entity\Type $type
     *
     * @return Property
     */
    public function setType(\AppBundle\Entity\Type $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AppBundle\Entity\Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Property
     */
    public function addCategory(\AppBundle\Entity\Category $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \AppBundle\Entity\Category $category
     */
    public function removeCategory(\AppBundle\Entity\Category $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add service
     *
     * @param \AppBundle\Entity\Service $service
     *
     * @return Property
     */
    public function addService(\AppBundle\Entity\Service $service)
    {
        $this->services[] = $service;

        return $this;
    }

    /**
     * Remove service
     *
     * @param \AppBundle\Entity\Service $service
     */
    public function removeService(\AppBundle\Entity\Service $service)
    {
        $this->services->removeElement($service);
    }

    /**
     * Get services
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * Set manager
     *
     * @param \AppBundle\Entity\Manager $manager
     *
     * @return Property
     */
    public function setManager(\AppBundle\Entity\Manager $manager = null)
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     * Get manager
     *
     * @return \AppBundle\Entity\Manager
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Add further
     *
     * @param \AppBundle\Entity\Further $further
     *
     * @return Property
     */
    public function addFurther(\AppBundle\Entity\Further $further)
    {
        $this->furthers[] = $further;

        return $this;
    }

    /**
     * Remove further
     *
     * @param \AppBundle\Entity\Further $further
     */
    public function removeFurther(\AppBundle\Entity\Further $further)
    {
        $this->furthers->removeElement($further);
    }

    /**
     * Get furthers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFurthers()
    {
        return $this->furthers;
    }
}
