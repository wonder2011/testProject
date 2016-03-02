<?php
/**
 * Created by PhpStorm.
 * User: rolando
 * Date: 6/10/15
 * Time: 12:06 PM
 */

namespace Common\SecurityBundle\DataFixtures\ORM;


use AppBundle\Entity\Further;
use AppBundle\Entity\Type;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadFurtherData extends AbstractFixture implements OrderedFixtureInterface {

	/**
	 * Load data fixtures with the passed EntityManager
	 *
	 * @param ObjectManager $manager
	 */
	public function load(ObjectManager $manager){
		$furthers = array(
			'Restaurant Near',
			'Visitors Allowed',
			'Good Place For The Children',
			'Nearby Sights',
			'Possibility Car Rental',
			'Beach Near',
			'Hairdryer in Room',
			'Guided Tour',
			'Dance classes',
			'Language Classes',
			'Ceramic floors',
			'Tank Installed',
			'Clothes line',
			'Garden',
			'Free roof',
			'Gas Street',
			'Private Garden'
		);
		foreach($furthers as $further){
			$obj = new Further();
			$obj->setName($further);
			$obj->setDescription($further);
			$manager->persist($obj);
		}
		$manager->flush();
	}

	/**
	 * Get the order of this fixture
	 * @return integer
	 */
	public function getOrder(){
		return 0;
	}
}
