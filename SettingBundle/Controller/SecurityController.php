<?php

namespace SettingBundle\Controller;

use SettingBundle\Entity\Users;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints as Assert;

class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {
        if($request->request->get('action') == "login")
        {
            $user = new Users();
            $user
                ->setUsername($request->request->get('username'))
                ->setPassword($request->request->get('password'));

            $service_json = $this->get('create_json_message_service');

            $validator = $this->get('validator');
            $errors = $validator->validate($user, null, array('login'));
            if (count($errors) > 0)
            {
                $errorsString = (string) $errors[0]->getMessage();
                die($service_json->msg(0, $errorsString));
            }
            $username = $this->getDoctrine()
                ->getRepository('SettingBundle:Users')
                ->findUserName($request->request->get('username'));

            if(empty($username[0]['username']))
            {
                die($service_json->msg(0, 'Логін не вірний'));
            }
            else
            {
                $password = $this->getDoctrine()
                    ->getRepository('SettingBundle:Users')
                    ->findUserPassword($request->request->get('password'));
                if(empty($password[0]['password']))
                {
                    die($service_json->msg(0, 'Пароль не вірний'));
                }
                $status = $this->getDoctrine()
                    ->getRepository('SettingBundle:Users')
                    ->findUserStatus($request->request->get('username'),
                                       $request->request->get('password'));
                if($status[0]['active'] == 0)
                {
                    die($service_json->msg(0,"На жаль, Ваш обліковий запис не було активовано. Будь ласка, перевірте папку вхідних повідомлень або спам папку Вашого E-mail, для посиланням для активації облікового запису."));
                }
                elseif($status[0]['active'] == 2)
                {
                    die($service_json->msg(0, "На жаль, Ваш аккаунт був заблокований!"));
                }
                $this->get('session')->set('username', $username[0]['username']);

                // Go to admin main page
                $user_role = $this->getDoctrine()
                    ->getRepository('SettingBundle:Users')
                    ->findUserRole($this->get('session')->get('username'));
                if($user_role[0]['userRole'] == 'ROLE_ADMIN')
                {
                    die($service_json->msg(2, ""));
                }
                die($service_json->msg(1, ""));
            }
        }
        return $this->render('SettingBundle:Security:login.html.php');
    }

    public function registerAction(Request $request)
    {
        if($request->request->get('action') == "register")
        {
            $user = new Users();
            $plainPassword = $request->request->get('password');
            $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($user, $plainPassword);

            $user
                ->setUsername($request->request->get('username'))
                ->setPassword($encoded)
                ->setEmail($request->request->get('email'))
                ->setUserRole('ROLE_USER')
                ->setActKey('key')
                ->setRegDate(new \DateTime())
                ->setLastActive(new \DateTime());

            $service_json = $this->get('create_json_message_service');

            $validator = $this->get('validator');
            $errors = $validator->validate($user);
            if (count($errors) > 0)
            {
                $errorsString = (string) $errors[0]->getMessage();
                die($service_json->msg(0, $errorsString));
            }
            else
            {
                $username = $this->getDoctrine()
                    ->getRepository('SettingBundle:Users')
                    ->findUserName($request->request->get('username'));

                if(!empty($username[0]['username']))
                {
                    die($service_json->msg(0, 'Логін '.$username[0]['username'].' вже використовується'));
                }
                else
                {
                    $email = $this->getDoctrine()
                        ->getRepository('SettingBundle:Users')
                        ->findUserEmail($request->request->get('email'));
                    if(!empty($email[0]['email']))
                    {
                        die($service_json->msg(0, 'Електронна адреса '.$email[0]['email'].' вже використовується'));
                    }
                    else
                    {
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($user);
                        $em->flush();
                    }
                }
            }
            die($service_json->msg(1, ''));
        }
        return $this->render('SettingBundle:Security:register.html.php');
    }

    public function passResetAction(Request $request)
    {
        if($request->request->get('action') == "passreset")
        {
            $user = new Users();
            $user
                ->setEmail($request->request->get('email'));

            $service_json = $this->get('create_json_message_service');

            $validator = $this->get('validator');
            $errors = $validator->validate($user, null, array('passreset'));
            if (count($errors) > 0)
            {
                $errorsString = (string) $errors[0]->getMessage();
                die($service_json->msg(0, $errorsString));
            }
            $email = $this->getDoctrine()
                ->getRepository('SettingBundle:Users')
                ->findUserEmail($request->request->get('email'));
            if(empty($email[0]['email']))
            {
                die($service_json->msg(0, 'Електронна адреса не вірна'));
            }
            else
            {
                $service = $this->get('sendMail_service');
                $email = $email[0]['email'];
                $body = $this->renderView('Emails/registration.html.php', array(), 'text/html');
                $this->get('mailer')->send($service->SendMail('Change password', $email, $body));
                die($service_json->msg(1, ''));
            }
        }
        return $this->render('SettingBundle:Security:pass_reset.html.php');
    }
}