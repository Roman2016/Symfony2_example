<?php
/**
 * Created by PhpStorm.
 * User: Users CS
 * Date: 15.06.2016
 * Time: 23:13
 */

namespace SettingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InfoController extends Controller
{
    public function helpAction()
    {
        return $this->render('SettingBundle:Info:help.html.php');
    }

    public function aboutAction()
    {
        return $this->render('SettingBundle:Info:about.html.php');
    }

    public function konkyrsAction()
    {
        return $this->render('SettingBundle:Info:konkyrs.html.php');
    }

    public function rulesAction()
    {
        return $this->render('SettingBundle:Info:rules.html.php');
    }
}