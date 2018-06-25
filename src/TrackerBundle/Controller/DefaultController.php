<?php

namespace TrackerBundle\Controller;

use DateTimeZone;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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

        $isWorking = 0;
        $startFrom = null;
        $stopWork = null;
        $workDayId = null;
        $countWorkDay = null;
        $today = strtotime(date("Y-m-d"));

        $workDay = $this->getDoctrine()->getManager()->getRepository(WorkDay::class)->findBy(['date' => $today, 'userId' => 1]);

        if(!empty($workDay)) {
            foreach ($workDay as $item) {
                $startFrom = date("H:i:s", $item->getStartFrom());
                $isWorking = $item->getIsWorking();
                $workDayId = $item->getId();
                $stopWork = ($item->getStopWork() ? date("H:i:s", $item->getStopWork()) : null);

                $countWorkDay =  ($item->getStopWork() ? ($item->getStartFrom()- $item->getStopWork()) : null );
            }

        }

        return $this->render('@Tracker/Default/index.html.twig', [
            'workDay' => $workDay,
            'startFrom' => $startFrom,
            'isWorking' => $isWorking,
            'workDayId' => $workDayId,
            'stopWork' => $stopWork,
            'countWorkHour' => ($countWorkDay ? date("H:i", $countWorkDay) : 0 ),
        ]);

    }
    /**
     * @Route("/startWorkDay", name="startWorkDay")
     */
    public function startWorkDayAction()
    {

        $usr= $this->get('security.token_storage')->getToken()->getUser();
        $em = $this->get('doctrine')->getManager();
        $today = strtotime(date("Y-m-d"));
        $startTime = strtotime(date("H:i:s"));
        $getWorkDayForCurrentUser = $em->getRepository(WorkDay::class)->findBy(['date' => $today,'userId' => $usr->getId(),'isWorking' => 1]);

            if(empty($getWorkDayForCurrentUser))  {
                $workDay = new WorkDay();

                $workDay->setDate($today);
                $workDay->setUserId($usr->getId());
                $workDay->setStartFrom($startTime);
                $workDay->setIsWorking(1); //@todo replace to constant

                $em->persist($workDay);
                $em->flush();
                return new JsonResponse(['success' => 'True']);
            }


    }

    /**
     * @Route("/stopWorkDay", name="stopWorkDay")
     */
    public function stopWorkDayAction(Request $request)
    {
        $em = $this->get('doctrine')->getManager();
        $id = $request->get('id');
        $stopTime = strtotime(date("H:i:s"));
        $workDay = $em->getRepository(WorkDay::class)->find($id);

        if(!empty($workDay)) {

            $workDay->setStopWork($stopTime);
            $workDay->setIsWorking(false); //@todo replace to constant

            $em->persist($workDay);
            $em->flush();

            return new JsonResponse(['success' => 'True']);
        }

    }

    /**
     * @Route("/coffeeBreak", name="coffeeBreak")
     */
    public function coffeeBreakAction()
    {
        echo "ok";
    }
}
