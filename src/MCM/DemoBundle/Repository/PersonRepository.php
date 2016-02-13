<?php
/**
 * Created by PhpStorm.
 * User: kodiers
 * Date: 13/02/16
 * Time: 02:42
 */

namespace MCM\DemoBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PersonRepository extends EntityRepository
{
    public function findWhereAgeLessThanOrderedByTeam($age)
    {
//        $query = $em->createQuery(
//            'SELECT person FROM MCMDemoBundle:Person person
//            WHERE person.age < :age
//            ORDER BY person.name DESC')->setParameter('age', '40');
        return $this->getEntityManager()
            ->createQuery(
                'SELECT person FROM MCMDemoBundle:Person person
                WHERE person.age < :age
                ORDER BY person.favFootballTeam DESC '
            )->setParameter('age', $age)->getResult();
    }
}