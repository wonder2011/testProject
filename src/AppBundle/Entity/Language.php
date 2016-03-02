<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Language
 * @ORM\Table(name="language")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LanguageRepository")
 */
class Language {
	/**
	 * @var int
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 * @ORM\Column(name="name", type="string", length=50, unique=true)
	 */
	private $name;

	/**
	 * @var string
	 * @ORM\Column(name="isoCode", type="string", length=255, unique=true)
	 */
	private $isoCode;


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
	 * @return Language
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
	 * Set isoCode
	 *
	 * @param string $isoCode
	 *
	 * @return Language
	 */
	public function setIsoCode($isoCode){
		$this->isoCode = $isoCode;

		return $this;
	}

	/**
	 * Get isoCode
	 * @return string
	 */
	public function getIsoCode(){
		return $this->isoCode;
	}
}

