<?php

namespace MCM\DemoBundle\Controller;

use MCM\DemoBundle\Entity\Person;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
//        $person = new Person();
//        $person->setName('bob')->setFavFootballTeam('Man Utd')->setAge(56);
////        exit(\Doctrine\Common\Util\Debug::dump($person));
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($person);
//        $em->flush();
//        $id = 2;
//        $person = $this->getDoctrine()->getRepository('MCMDemoBundle:Person')->find($id);
//        if (!$person) {
//            throw $this->createNotFoundException('No person found for '.$id);
//        }
//        $em = $this->getDoctrine()->getManager();
//        $person->setFavFootballTeam("Preston North End");
//        $em->persist($person);
//        $em->flush();
//        $em->remove($person);
//        $em->flush();
//        exit(\Doctrine\Common\Util\Debug::dump($person));

        /**
         * @var $repository \Doctrine\ORM\EntityManager
         */
//        $person = $repository->find(1);
//        $people = $repository->findAll();
//        $pers2 = $repository->findOneByAge(22);
//        $people2 = $repository->findBy(['favFootballTeam'=>'Dynamo'], ['age' => 'DESC']);

//        $query = $repository->createQueryBuilder('p')->where('p.name = :name')->setParameter('name', 'John')->getQuery();
//        $person = $query->getArrayResult();
//        exit(\Doctrine\Common\Util\Debug::dump($person));
//        $em = $this->getDoctrine()->getManager();

//        $repository = $this->getDoctrine()->getRepository('MCMDemoBundle:Person');
////        $people = $repository->findWhereAgeLessThanOrderedByTeam(60);
//        /**
//         * @var $people \MCM\DemoBundle\Entity\Person
//         */
//        $bob = $repository->find(1);
//
//        $evertone = $this->getDoctrine()->getRepository('MCMDemoBundle:FootballTeam')->find(2);
//        $bob->setFavFootballTeam($evertone);
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($bob);
//        $em->flush();
//        $query = $repository->createQueryBuilder('p')->addSelect('ft')->leftJoin('p.favFootballTeam', 'ft')
//            ->where('p.name = :name')->setParameter('name', 'John')->getQuery();
//        $people = $query->getSingleResult();
//        $repository = $this->getDoctrine()->getRepository('MCMDemoBundle:FootballTeam');
//        $team = $repository->find(2);
        $repository = $this->getDoctrine()->getRepository('MCMDemoBundle:Person');
        $person = $repository->find(1);
        $person->setName('james');
        $em = $this->getDoctrine()->getManager();
        $em->persist($person);
        $em->flush();
        $person2 = new Person();
        $person2->setName('Ben')->setAge(20);
        $em->persist($person2);
        $em->flush();

        exit(\Doctrine\Common\Util\Debug::dump($person));

        return $this->render('MCMDemoBundle:Default:index.html.twig', array(
//            'person' => $person,
            'people' => $people,
//            'pers2' => $pers2,
//            'people2' => $people2
        ));
    }
}
