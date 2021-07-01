<?php

namespace Aecf\Esmile\Gui\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/api/log")
 */
class LogController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Response
     *
     * @Route("", name="log", methods={"POST"})
     */
    public function logAction(Request $request)
    {
        $this->get('logger')->error(sprintf(
            '[UI TECHNICAL ERROR] a technical error%s%s occured when calling %s (%s) with data %s.',
            $request->get('status') ? ' (response status: '.$request->get('status').')' : '',
            $request->get('responseText') ? ' (response text: '.$request->get('responseText').')' : '',
            $request->get('url'),
            $request->get('method'),
            $request->get('data')
        ));

        return new Response('', Response::HTTP_NO_CONTENT);

        //je sais pas pourquoi tu fais ça Mikaaaaaaaaaaaaaaaaaaaaa 
    }
}
