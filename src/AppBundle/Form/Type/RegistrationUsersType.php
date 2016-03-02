<?php

namespace AppBundle\Form\Type;

use FOS\UserBundle\Form\Type\ProfileFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationUsersType extends AbstractType {
	public function buildForm(FormBuilderInterface $builder, array $options){
		$builder->add('profile', ProfileType::class);
	}

	public function configureOptions(OptionsResolver $resolver){

	}

	public function getParent(){
		return 'FOS\UserBundle\Form\Type\RegistrationFormType';
	}

	public function getBlockPrefix(){
		return 'app_admin_registration';
	}

	public function getName(){
		return $this->getBlockPrefix();
	}
}
