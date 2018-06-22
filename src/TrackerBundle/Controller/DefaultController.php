<?php

namespace TrackerBundle\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;
use TrackerBundle\Entity\WorkDay;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="main")
     */
    public function indexAction()
    {
        $workDay = $this->getDoctrine()->getManager()->getRepository(WorkDay::class)->findBy(['userId' => 1]);
        foreach ($workDay as $item) {
            $startFrom = $item->getStartFrom();
        }

        return $this->render('@Tracker/Default/index.html.twig',[
            'workDay' => $workDay,
            'startFrom' => $startFrom->format('Y-m-d H:i:s'),
        ]);
    }
    /**
     * @Route("/startWorkDay", name="startWorkDay")
     */
    public function startWorkDayAction(Request $request)
    {

        $usr= $this->get('security.token_storage')->getToken()->getUser();
        $em = $this->get('doctrine')->getManager();

        $getWorkDayForCurrentUser = $em->getRepository(WorkDay::class)->findBy(['userId' => $usr->getId(),'isWorking' => 1]);
        foreach ($getWorkDayForCurrentUser as $item) {
            if ($item->getIsWorking() == 0) {
                $workDay = new WorkDay();
                $workDay->setDate(new \DateTime());
                $workDay->setUserId($usr->getId());
                $workDay->setStartFrom(new \DateTime());
                $workDay->setIsWorking(1); //@todo replace to constant

                $em->persist($workDay);
                $em->flush();
                return new JsonResponse(['success' => 'True']);
            } else {
                exit('cant start work day');
            }
        }

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
