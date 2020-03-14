<?php
/**
 *  * @author      Rached BELHADJ <belhadj.rached@gmail.com>
 *  * @copyright   Copyright (c) ShortCut
 *  * @license     Proprietary
 *
 */

namespace App\Controller\Api;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class IndexController extends AbstractController
{
    /**
     * @ApiDoc(
     *    section="List",
     *    description="Get List",
     *    parameters={
     *      {"name"="id", "dataType"="integer", "required"=true, "description"="ID"}
     *  },
     *    requirements={
     *         {
     *             "name"="id",
     *             "dataType"="integer",
     *             "requirements"="\d+",
     *             "description"="The id unique identifier."
     *         }
     *     }
     * )
     * @Route("/api/list", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getAction(Request $request){
        $data = array();
        $id = $request->query->get('id');

        if ($request->query->has('id') === true) {
            return new JsonResponse("OK",200);
        }else {
            return new JsonResponse("ID NOT EXIST",203);
        }
    }

}