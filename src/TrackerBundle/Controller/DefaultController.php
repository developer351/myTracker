<?php

namespace TrackerBundle\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use TrackerBundle\Entity\WorkDay;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="main")
     */
    public function indexAction()
    {
        $workDay = $this->getDoctrine()->getManager()->getRepository(WorkDay::class)->findBy(['userId' => 1]);

        return $this->render('@Tracker/Default/index.html.twig',[
            'workDay' => $workDay
        ]);
    }
    /**
     * @Route("/startWorkDay", name="startWorkDay")
     */
    public function startWorkDayAction(Request $request)
    {
        dump($request->get('page')); exit;
    }

    /**
     * @Route("/stopWorkDay", name="stopWorkDay")
     */
    public function stopWorkDayAction()
    {
        echo "ok";
    }

    /**
     * @Route("/coffeeBreak", name="coffeeBreak")
     */
    public function coffeeBreakAction()
    {
        echo "ok";
    }
}
