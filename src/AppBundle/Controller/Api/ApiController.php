<?php

namespace AppBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;

class ApiController extends Controller
{

	public function getSecureResourceAction(){
		$securityChecker = $this->get('security.authorization_checker');
		if(false === $securityChecker->is_granted('IS_AUTHENTICATED_FULLY')){
			throw new AccessDeniedException();
		}
	}
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }
}
