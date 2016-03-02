<?php
/**
 * Created by PhpStorm.
 * User: rolando
 * Date: 6/10/15
 * Time: 12:06 PM
 */

namespace Common\SecurityBundle\DataFixtures\ORM;


use AppBundle\Entity\Type;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadTypeData extends AbstractFixture implements OrderedFixtureInterface {

	/**
	 * Load data fixtures with the passed EntityManager
	 *
	 * @param ObjectManager $manager
	 */
	public function load(ObjectManager $manager){
		$types = array(
			'House',
			'Loft',
			'Business Premises',
			'Office',
			'Penthouse',
			'Business',
			'Apartament',
			'Garage',
			'Villa',
			'Farm',
			'Chalet',
			'Ground'
		);
		foreach($types as $type){
			$obj = new Type();
			$obj->setName($type);
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
