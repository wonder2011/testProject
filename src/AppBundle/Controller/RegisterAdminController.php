<?php

namespace AppBundle\Controller;

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Tests\Form\Type\RegistrationFormTypeTest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RegistrationAdminController
 * @package AppBundle\Controller
 * @Route("/register")
 */
class RegisterAdminController extends BaseController {
	/**
	 * @Route("/admin", name="admin_register")
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function registerAction(Request $request){

		/**
		 * Getting the factory
		 */
		$formFactory = $this->container->get('fos_user.registration.form.factory');
		/**
		 * Getting User manager
		 */
		$userManager = $this->container->get('fos_user.user_manager');
		/**
		 * Getting Symfony event dispatcher
		 */
		$dispatcher = $this->container->get('event_dispatcher');
		$user = $userManager->createUser();
		$user->setEnabled(true);

		$form = $formFactory->createForm();
		$form->setData($user);

		if("POST" === $request->getMethod()){
			$form->handleRequest($request);
			if($form->isValid()){
				$event = new FormEvent($form, $request);
				$dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);

				$userManager->updateUser($user);

				return $this->redirect($this->generateUrl('form_login'));
			}
		}

		return $this->get('pugx_multi_user.registration_manager')->register('AppBundle\Entity\Admin');
	}
}
