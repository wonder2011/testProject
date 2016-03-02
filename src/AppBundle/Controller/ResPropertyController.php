<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class ResPropertyController extends FOSRestController
{
	public function getProperties(){
		$data = $this->getDoctrine()->getRepository('AppBundle:Property')->findAll();
    }

	public function getTypesAction(){
		$data = $this->getDoctrine()->getRepository('AppBundle:Type')->findAll();
		$view = $this->view($data, 200)
			->setTemplate(":Rest:types.html.twig")
			->setTemplateVar('types')
		;

		return $this->handleView($view);
	}
}
