<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AddressRepository")
 */
class Address {
  /**
   * @var int
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @var float
   * @ORM\Column(name="latitude", type="float")
   */
  private $latitude;

  /**
   * @var float
   * @ORM\Column(name="longitude", type="float")
   */
  private $longitude;

  /**
   * @var string
   * @ORM\Column(name="zipCode", type="string", length=255)
   */
  private $zipCode;

  /**
   * @var City
   * @ORM\ManyToOne(targetEntity="City", inversedBy="directions")
   * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
   */
  private $city;

  /**
   * @var Property
   * @ORM\OneToOne(targetEntity="Property", mappedBy="address")
   */
  private $property;

  /**
   * Get id
   * @return int
   */
  public function getId(){
    return $this->id;
  }

  /**
   * Set latitude
   *
   * @param float $latitude
   *
   * @return Address
   */
  public function setLatitude($latitude){
    $this->latitude = $latitude;

    return $this;
  }

  /**
   * Get latitude
   * @return float
   */
  public function getLatitude(){
    return $this->latitude;
  }

  /**
   * Set longitude
   *
   * @param float $longitude
   *
   * @return Address
   */
  public function setLongitude($longitude){
    $this->longitude = $longitude;

    return $this;
  }

  /**
   * Get longitude
   * @return float
   */
  public function getLongitude(){
    return $this->longitude;
  }

  /**
   * Set zipCode
   *
   * @param string $zipCode
   *
   * @return Address
   */
  public function setZipCode($zipCode){
    $this->zipCode = $zipCode;

    return $this;
  }

  /**
   * Get zipCode
   * @return string
   */
  public function getZipCode(){
    return $this->zipCode;
  }

    /**
     * Set city
     *
     * @param \AppBundle\Entity\City $city
     *
     * @return Address
     */
    public function setCity(\AppBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \AppBundle\Entity\City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set property
     *
     * @param \AppBundle\Entity\Property $property
     *
     * @return Address
     */
    public function setProperty(\AppBundle\Entity\Property $property = null)
    {
        $this->property = $property;

        return $this;
    }

    /**
     * Get property
     *
     * @return \AppBundle\Entity\Property
     */
    public function getProperty()
    {
        return $this->property;
    }
}
