<?php

namespace App\Controller;

use App\Entity\Employment;
use App\Form\EmploymentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmploymentController extends AbstractController
{
    /**
     * @Route("/employment", name="employment")
     */
    public function home()
    {
       $employment=$this->getDoctrine()->getRepository(Employment::class)->findAll();
       return $this->render('employment/index.html.twig', ['employment'=>$employment]);
    }

   /**
     * @Route ("/employment/{id}", "employment_view")
     * @param $id
     * @return Response
     */
    public function viewSingle($id){
        $employment=$this->getDoctrine()->getRepository(Employment::class)->find($id);
        return $this->render('employment/employment_view.html.twig', ['employment'=>$employment]);
    }

    /**
     * @Route ("/create", name="create")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request):Response {

$employment=new Employment();
$form=$this->createForm(EmploymentType::class,$employment);
$form->handleRequest($request);

if($form->isSubmitted()&&$form->isValid()){
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->persist($employment);
    $entityManager->flush();
    return $this->redirectToRoute('employment');
}
        return $this->render('employment/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route ("/employment/edit/{id}", name="employment_edit")
     * @param $id
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function edit($id, Request $request){
     $employment=$this->getDoctrine()->getRepository(Employment::class)->find($id);
     if($employment===null){
         return $this->redirectToRoute('');
     }
     $form=$this->createForm(EmploymentType::class, $employment);
     $form->handleRequest($request);

     if($form->isValid()&& $form->isSubmitted()){
         $entityManager= $this->getDoctrine()->getManager();
         $entityManager->persist($employment);
         $entityManager->flush();
         $this->redirectToRoute('');
     }
     return $this->render('');
    }

    /**
     *  @Route ("/employment/delete/{id}", name="employment_delete")
     * @param $id
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function delete($id, Request $request){
        $employment=$this->getDoctrine()->getRepository(Employment::class)->find($id);
        if($employment===null){
            return $this->redirectToRoute('');
        }
        $form=$this->createForm(EmploymentType::class, $employment);
        $form->handleRequest($request);

        if($form->isValid()&& $form->isSubmitted()){
            $entityManager= $this->getDoctrine()->getManager();
            $entityManager->remove($employment);
            $entityManager->flush();
            $this->redirectToRoute('');
        }
        return $this->render('');
    }
}
