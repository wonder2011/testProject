<?php
/**
 * Created by PhpStorm.
 * User: rolando
 * Date: 2/8/16
 * Time: 1:00 AM
 */

namespace AppBundle\Service;


use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class Request {

	/**
	 * @return null|\Symfony\Component\HttpFoundation\Request
	 */
	public function getRequest(RequestStack $stack){
		return $stack->getCurrentRequest();
	}
}
