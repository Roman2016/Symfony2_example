<?php

namespace SettingBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UsersRepository extends EntityRepository
{
    public function findUserName($username)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT u.username FROM SettingBundle:Users u WHERE u.username = :param'
            )
            ->setParameter('param', $username)
            ->getResult();
    }

    public function findUserEmail($email)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT u.email FROM SettingBundle:Users u WHERE u.email = :param'
            )
            ->setParameter('param', $email)
            ->getResult();
    }

    public function findUserPassword($password)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT u.password FROM SettingBundle:Users u WHERE u.password = :param'
            )
            ->setParameter('param', $password)
            ->getResult();
    }

    public function findUserStatus($username, $password)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT u.active FROM SettingBundle:Users u WHERE u.username = :username AND u.password = :password'
            )
            ->setParameters(array('username' => $username,
                                 'password' => $password))
            ->getResult();
    }

    public function findUserCountry($username)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT u.country FROM SettingBundle:Users u WHERE u.username = :param'
            )
            ->setParameter('param', $username)
            ->getResult();
    }

    public function findUserDialingCode($username)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT u.dialingCode FROM SettingBundle:Users u WHERE u.username = :param'
            )
            ->setParameter('param', $username)
            ->getResult();
    }

    public function findUserRole($username)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT u.userRole FROM SettingBundle:Users u WHERE u.username = :param'
            )
            ->setParameter('param', $username)
            ->getResult();
    }
}