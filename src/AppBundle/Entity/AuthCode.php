<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\OAuthServerBundle\Entity\AuthCode as BaseAuthCode;

/**
 * AuthCode
 * @ORM\Table(name="auth_code")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AuthCodeRepository")
 */
class AuthCode extends BaseAuthCode {
	/**
	 * @var int
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @var Client
	 * @ORM\ManyToOne(targetEntity="Client")
	 * @ORM\JoinColumn(nullable=true)
	 */
	protected $client;

	/**
	 * @var User
	 * @ORM\ManyToOne(targetEntity="User")
	 */
	protected $user;
}

