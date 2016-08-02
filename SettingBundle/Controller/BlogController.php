<?php
/**
 * Created by PhpStorm.
 * User: Users CS
 * Date: 15.06.2016
 * Time: 23:12
 */

namespace SettingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function indexAction()
    {
        return $this->render('SettingBundle:Blog:userindex.html.php');
    }
}