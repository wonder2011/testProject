<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 * @ORM\Table(name="country")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CountryRepository")
 */
class Country {
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
	 * @var State
	 * @ORM\OneToMany(targetEntity="State", mappedBy="country")
	 **/
	private $states;

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
	 * @return Country
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
	 * @return Country
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
	 * @return Country
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
	 * @return Country
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
        $this->states = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add state
     *
     * @param \AppBundle\Entity\State $state
     *
     * @return Country
     */
    public function addState(\AppBundle\Entity\State $state)
    {
        $this->states[] = $state;

        return $this;
    }

    /**
     * Remove state
     *
     * @param \AppBundle\Entity\State $state
     */
    public function removeState(\AppBundle\Entity\State $state)
    {
        $this->states->removeElement($state);
    }

    /**
     * Get states
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStates()
    {
        return $this->states;
    }
}
