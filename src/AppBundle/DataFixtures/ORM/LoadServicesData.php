<?php
/**
 * Created by PhpStorm.
 * User: rolando
 * Date: 6/10/15
 * Time: 12:06 PM
 */

namespace Common\SecurityBundle\DataFixtures\ORM;


use AppBundle\Entity\Service;
use AppBundle\Entity\Type;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadServicesData extends AbstractFixture implements OrderedFixtureInterface {

	/**
	 * Load data fixtures with the passed EntityManager
	 *
	 * @param ObjectManager $manager
	 */
	public function load(ObjectManager $manager){
		$services = array(
			'Suite with Bathroom',
			'TV',
			'Furnished',
			'Air Conditioner',
			'Hot Water',
			'Water All Day',
			'Home Appliances',
			'Current 110V',
			'Current 220V',
			'Electric Water heater',
			'Halt',
			'Door to the street',
			'Fridge',
			'Airport Pick-up',
			'Housemaid',
			'Terrace',
			'Private Bathroom',
			'Shared Bathroom',
			'Extra Bed',
			'Change Daily Supplies',
			'Double bed',
			'Dinner',
			'Breakfast',
			'Garage',
			'Laundry',
			'Balcony'
		);
		foreach($services as $service){
			$obj = new Service();
			$obj->setName($service);
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
