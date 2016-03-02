<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * State
 * @ORM\Table(name="state")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StateRepository")
 */
class State {
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
	 * @ORM\Column(name="isoCode2", type="string", length=2, unique=true)
	 */
	private $isoCode2;

	/**
	 * @var string
	 * @ORM\Column(name="isoCode3", type="string", length=3, unique=true)
	 */
	private $isoCode3;

	/**
	 * @var int
	 * @ORM\Column(name="isoCodeNum", type="integer", unique=true)
	 */
	private $isoCodeNum;

	/**
	 * @var City
	 * @ORM\OneToMany(targetEntity="City", mappedBy="state")
	 **/
	private $cities;

	/**
	 * @var Country
	 * @ORM\ManyToOne(targetEntity="Country", inversedBy="cities")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="country_id", referencedColumnName="id")
	 * })
	 */
	private $country;


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
	 * @return State
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
	 * Set isoCode2
	 *
	 * @param string $isoCode2
	 *
	 * @return State
	 */
	public function setIsoCode2($isoCode2){
		$this->isoCode2 = $isoCode2;

		return $this;
	}

	/**
	 * Get isoCode2
	 * @return string
	 */
	public function getIsoCode2(){
		return $this->isoCode2;
	}

	/**
	 * Set isoCode3
	 *
	 * @param string $isoCode3
	 *
	 * @return State
	 */
	public function setIsoCode3($isoCode3){
		$this->isoCode3 = $isoCode3;

		return $this;
	}

	/**
	 * Get isoCode3
	 * @return string
	 */
	public function getIsoCode3(){
		return $this->isoCode3;
	}

	/**
	 * Set isoCodeNum
	 *
	 * @param integer $isoCodeNum
	 *
	 * @return State
	 */
	public function setIsoCodeNum($isoCodeNum){
		$this->isoCodeNum = $isoCodeNum;

		return $this;
	}

	/**
	 * Get isoCodeNum
	 * @return int
	 */
	public function getIsoCodeNum(){
		return $this->isoCodeNum;
	}
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cities = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add city
     *
     * @param \AppBundle\Entity\City $city
     *
     * @return State
     */
    public function addCity(\AppBundle\Entity\City $city)
    {
        $this->cities[] = $city;

        return $this;
    }

    /**
     * Remove city
     *
     * @param \AppBundle\Entity\City $city
     */
    public function removeCity(\AppBundle\Entity\City $city)
    {
        $this->cities->removeElement($city);
    }

    /**
     * Get cities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * Set country
     *
     * @param \AppBundle\Entity\Country $country
     *
     * @return State
     */
    public function setCountry(\AppBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \AppBundle\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }
}
