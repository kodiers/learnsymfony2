<?php

namespace MCM\DemoBundle\Controller;

use MCM\DemoBundle\Entity\Colour;
use MCM\DemoBundle\Entity\MyChoice;
use MCM\DemoBundle\Entity\Person;
use MCM\DemoBundle\Form\Type\ArrayChoiceType;
use MCM\DemoBundle\Form\Type\EntityChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MCM\DemoBundle\Form\Type\PersonType;

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

//        exit(\Doctrine\Common\Util\Debug::dump($person));

        return $this->render('MCMDemoBundle:Default:index.html.twig', array(
//            'person' => $person,
//            'people' => $people,
//            'pers2' => $pers2,
//            'people2' => $people2
        ));
    }

    public function formAction(Request $request)
    {
        $person = new Person();
        $person->setName('billy the kid');
        $person->setAge(23);

//        $form = $this->createFormBuilder($person)
//            ->add('name', 'text', array(
//                'label' => 'Your name',
//            ))
//            ->add('age', 'integer')
//            ->add('save', 'submit', array(
//                'attr' => array(
////                    'formnovalidate' => 'formnovalidate',
//                    'class' => 'mySubmitbutton'
//                )
//            ))
//            ->getForm();
        $form = $this->createForm(new PersonType(), $person, array(
//            'action' => $this->generateUrl('mcm_demo_homepage'),
            'method' => 'POST',
        ));
        $form->handleRequest($request);

        if($form->isValid()) {
//            return $this->redirect($this->generateUrl('mcm_demo_homepage'));
            return $this->forward('MCMDemoBundle:Default:thankyou', array('personName' => $person->getName()));
        }

        return $this->render('MCMDemoBundle:Default:form.html.twig', array('ourForm' => $form->createView()));
    }

    public function thankyouAction($personName)
    {
        return $this->render('MCMDemoBundle:Default:thankyou.html.twig', array('personName' => $personName));
    }

    public function arrayChoiceAction(Request $request)
    {
        $myColour = new Colour();
        $myColour->setFavColour(3);
        $form = $this->createForm(new ArrayChoiceType(), $myColour, array(
//            'action' => 'mcm_demo_arraychoice',
            'method' => 'POST'
        ));

        $form->handleRequest($request);

        if ($form->isValid())
        {
            exit(\Doctrine\Common\Util\Debug::dump($myColour));
        }

        return $this->render('MCMDemoBundle:Default:arrayChoice.html.twig', array('form' => $form->createView()));
    }

    public function entityChoiceAction(Request $request)
    {
        $myColour = new Colour();
        $myChoice = new MyChoice();
        $favColour = $this->getDoctrine()->getRepository('MCMDemoBundle:Colour')->find(4);
        $myChoice->setFavColour($favColour);
        $form = $this->createForm(new EntityChoiceType(), $myChoice, array(
            'method' => 'POST'
        ));

        $form->handleRequest($request);

        if ($form->isValid())
        {
        }

        return $this->render('MCMDemoBundle:Default:arrayChoice.html.twig', array('form' => $form->createView()));
    }
}
