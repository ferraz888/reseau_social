<?php

namespace App\Controller;

use App\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

class PostController extends AbstractController
{
    #[Route('/', name: 'app_post')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Post::class);
        $posts = $repository -> findAll();
        return $this->render('post/index.html.twig', [
            "posts" => $posts
        ]);
    }

    #[Route('Post/New')]
    public function create(Request $request, ManagerRegistry $doctrine): Response
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 
            $em = $doctrine->getManager();
            $em->persist($post);
            $em->flush();
        }
        return $this->render('post/form.html.twig',[
            "post_form" => $form->createView()
            ]);
    }
        #[Route('Post/delete/{id<\d+>}')]
    public function delete(Post $post, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $em->remove($post);
        $em->flush();
        return $this->redirectToRoute("app_post");
    }

    #[Route('Post/update/{id<\d+>}')]
    public function update(Request $request,Post $post, ManagerRegistry $doctrine): Response
    {
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 
            $em = $doctrine->getManager();
            $em->flush();
        }
        return $this->render('post/form.html.twig',[
            "post_form" => $form->createView()
            ]);
    }
}