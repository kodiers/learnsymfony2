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
        $repository = $this->getDoctrine()->getRepository('MCMDemoBundle:Person');
        $person = $repository->find(1);
        $people = $repository->findAll();
        $pers2 = $repository->findOneByAge(22);
        $people2 = $repository->findBy(['favFootballTeam'=>'Dynamo'], ['age' => 'DESC']);
        return $this->render('MCMDemoBundle:Default:index.html.twig', array(
            'person' => $person,
            'people' => $people,
            'pers2' => $pers2,
            'people2' => $people2
        ));
    }
}
