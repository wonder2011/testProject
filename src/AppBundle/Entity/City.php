<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * City
 * @ORM\Table(name="city")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CityRepository")
 */
class City {
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
	 * @var State
	 * @ORM\ManyToOne(targetEntity="State", inversedBy="cities")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="state_id", referencedColumnName="id")
	 * })
	 */
	private $state;

	/**
	 * @var Address
	 * @ORM\OneToMany(targetEntity="Address", mappedBy="city")
	 **/
	private $directions;

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
	 * @return City
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
     * Constructor
     */
    public function __construct()
    {
        $this->directions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set state
     *
     * @param \AppBundle\Entity\State $state
     *
     * @return City
     */
    public function setState(\AppBundle\Entity\State $state = null)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return \AppBundle\Entity\State
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Add direction
     *
     * @param \AppBundle\Entity\Address $direction
     *
     * @return City
     */
    public function addDirection(\AppBundle\Entity\Address $direction)
    {
        $this->directions[] = $direction;

        return $this;
    }

    /**
     * Remove direction
     *
     * @param \AppBundle\Entity\Address $direction
     */
    public function removeDirection(\AppBundle\Entity\Address $direction)
    {
        $this->directions->removeElement($direction);
    }

    /**
     * Get directions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDirections()
    {
        return $this->directions;
    }
}
