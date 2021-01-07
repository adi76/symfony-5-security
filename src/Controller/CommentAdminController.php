<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_ADMIN")
 */
class CommentAdminController extends AbstractController
{
    /**
     * @Route("/admin/comment", name="admin_comment")
     */
    public function comment(): Response
    {
        // $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        return $this->render('admin/comment.html.twig', [
            'controller_name' => 'AdminController - Comment Section',
        ]);
    }
}
