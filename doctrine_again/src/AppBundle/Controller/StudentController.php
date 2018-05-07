<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Sinhvien;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\user;
class StudentController extends Controller
{
    /**
     * @Route("/student")
     */
    public function indexAction()
    {
        return $this->render('default/add.html.twig', array(
            // ...
        ));
    }
    /**
     * @Route("/student/show", name="showAction")
     */
    public function showAction(){
    	$student = $this->getDoctrine()->getRepository(Sinhvien::Class)->findAll();
    	return $this->render('default/index.html.twig',['students'=> $student]);

    	
    }
    /**
     * @Route("/student/add",name="addStudent")
     * @Method("POST")
     */
    
    public function addAction(Request $req){

    	
    	$request = $req->request;
    	$entityManager = $this->getDoctrine()->getManager();
    	$name = $request->get('name');
    	$gerder = $request->get('gerder');
    	$birthday = $request->get('birthday');
    	$student = new Sinhvien();
    	$student->setName($name);
    	$student->setGerder($gerder);
    	$student->setBirthday($birthday);
    	$entityManager->persist($student);
        $entityManager->flush();
        
        $student = $this->getDoctrine()->getRepository(Sinhvien::Class)->findAll();
        return $this->render('default/index.html.twig',['students'=> $student]);
        
    	


    }

    /**
     * @Route("/student/delete/{id}",name="deleteStudent")
     */
    public function deleteAction($id){
    	$student = $this->getDoctrine()->getRepository(Sinhvien::Class)->find($id);
    	$entityManager = $this->getDoctrine()->getManager();
    	$entityManager->remove($student);
    	$entityManager->flush();
    	$student =  $this->getDoctrine()->getRepository(Sinhvien::Class)->findAll();
    	return $this->render('default/index.html.twig',['students'=>$student]);
    }
    
    /**
     * @Route("/student/edit",name="shit")
     */

    public function editAction(Request $req)
    {
    	$request = $req->request;
    	$entityManager = $this->getDoctrine()->getManager();
    	$student = $this->getDoctrine()->getRepository(Sinhvien::Class)->find($request->get('id'));
    	
    	$name = $request->get('name');
    	$gerder = $request->get('gerder');
    	$birthday = $request->get('birthday');
    	$student->setName($name);
        $student->setGerder($gerder);
        $student->setBirthday($birthday);

        $entityManager->persist($student);
        $entityManager->flush();

        $student =  $this->getDoctrine()->getRepository(Sinhvien::Class)->findAll();
    	return $this->render('default/index.html.twig',['students'=>$student]);
    }	
    
    /**
     * @Route("/student/edit/{id}",name="editStudent")
     */

    public function showEditAction($id)
    {
    	$student = $this->getDoctrine()->getRepository(Sinhvien::Class)->find($id);
    	return $this->render('default/edit.html.twig',['student'=>$student]);
    }	
    
    
    /**
     * @Route("/login",name="loginStudent")
     */
    public function Login(Request $req){
        $request = $req->request;
        $name = $request->get('name');
        $pass = $request->get('pass');
        $entityManager = $this->getDoctrine()->getManager();
        $user  = $this->getDoctrine()->getRepository(user::class)->findBy(['name' => $name, 'pass' => $pass]);
        
        if (!empty($user)){
            $student = $this->getDoctrine()->getRepository(Sinhvien::Class)->findAll();
            return $this->render('default/index.html.twig',['students'=> $student]);
        }else {
            return new Response('Nhap sai cmnr');
        }
        
        
        
  
    }
    /**
     * @Route("/dangky/student",name="dangkyStudent")
     * @Method("POST")
     */
    public function dangky(Request $req){
        $request = $req->request;
        $entityManager = $this->getDoctrine()->getManager();
        $user = $request->get('user');
        $pass = $request->get('pass');        
        $User = new user();
        $User->setName($user);
        $User->setPass($pass);
        $entityManager->persist($User);
        $entityManager->flush();
        
        return $this->render('default/login.html.twig');
        
        
    }
    /**
     * @Route("/dangky")
     */
    public function dangkyAction()
    {
        return $this->render('default/dangky.html.twig', array(
            // ...
        ));
    }
    
    
    
    

    
    
}
