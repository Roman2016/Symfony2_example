<?php

namespace SettingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="SettingBundle\Repository\UsersRepository")
 */
class Users implements UserInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=32, nullable=false)
     *
     * @Assert\NotBlank(message="The value username should not be blank",
     *     groups={"login"})
     * @Assert\Length(
     *      min = 3,
     *      max = 20,
     *      minMessage = "Your name must be at least {{ limit }} characters long",
     *      maxMessage = "Your name cannot be longer than {{ limit }} characters",
     *     groups={"login"}
     * )
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}.",
     *     groups={"login"}
     * )
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=32, nullable=false)
     *
     * @Assert\NotBlank(message="The value {{ value }} should not be blank",
     *     groups={"login"},
     *     groups={"updatepass"},
     *     groups={"updateUserPass"}
     *     )
     * @Assert\Length(
     *      min = 3,
     *      max = 20,
     *      minMessage = "Your name must be at least {{ limit }} characters long",
     *      maxMessage = "Your name cannot be longer than {{ limit }} characters",
     *     groups={"login"},
     *     groups={"updatepass"},
     *     groups={"updateUserPass"}
     * )
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}.",
     *     groups={"login"},
     *     groups={"updatepass"},
     *     groups={"updateUserPass"}
     * )
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="temp_pass", type="string", length=32, nullable=true)
     *
     * @Assert\NotBlank(message="The value {{ value }} should not be blank",
     *     groups={"updatepass"}
     * )
     * @Assert\Length(
     *      min = 5,
     *      max = 20,
     *      minMessage = "Your name must be at least {{ limit }} characters long",
     *      maxMessage = "Your name cannot be longer than {{ limit }} characters",
     *     groups={"updatepass"}
     * )
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}.",
     *     groups={"updatepass"}
     * )
     */
    private $tempPass;

    /**
     * @var integer
     *
     * @ORM\Column(name="temp_pass_active", type="integer", nullable=true)
     */
    private $tempPassActive;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=25, nullable=true)
     *
     * @Assert\NotBlank(message="The value firstname should not be blank",
     *     groups={"editprofile"})
     * @Assert\Length(
     *      min = 3,
     *      max = 20,
     *      minMessage = "Your name must be at least {{ limit }} characters long",
     *      maxMessage = "Your name cannot be longer than {{ limit }} characters",
     *      groups={"editprofile"}
     * )
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}.",
     *     groups={"editprofile"}
     * )
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=25, nullable=true)
     *
     * @Assert\NotBlank(message="The value lastname should not be blank",
     *     groups={"editprofile"})
     * @Assert\Length(
     *      min = 3,
     *      max = 20,
     *      minMessage = "Your name must be at least {{ limit }} characters long",
     *      maxMessage = "Your name cannot be longer than {{ limit }} characters",
     *      groups={"editprofile"}
     * )
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}.",
     *     groups={"editprofile"}
     * )
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=35, nullable=false)
     *
     * @Assert\NotBlank(message="The value {{ value }} should not be blank",
     *     groups={"passreset"})
     * @Assert\Email(
     *     message = "The email {{ value }} is not a valid email.",
     *     checkMX = true,
     *     groups={"passreset"}
     * )
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="dialing_code", type="integer", nullable=true)
     */
    private $dialingCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="phone", type="integer", nullable=true)
     *
     * @Assert\Length(
     *      min = 9,
     *      max = 15,
     *      minMessage = "Your name must be at least {{ limit }} characters long",
     *      maxMessage = "Your name cannot be longer than {{ limit }} characters",
     *      groups={"editprofile"}
     * )
     * @Assert\Type(
     *     type="numeric",
     *     message="The value {{ value }} is not a valid {{ type }}.",
     *     groups={"editprofile"}
     * )
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=80, nullable=true)
     *
     * @Assert\NotBlank(message="The value {{ value }} should not be blank",
     *     groups={"editprofile"})
     * @Assert\Length(
     *      min = 2,
     *      max = 30,
     *      minMessage = "Your name must be at least {{ limit }} characters long",
     *      maxMessage = "Your name cannot be longer than {{ limit }} characters",
     *      groups={"editprofile"}
     * )
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}.",
     *     groups={"editprofile"}
     * )
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=80, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="thumb_path", type="string", length=150, nullable=true)
     */
    private $thumbPath;

    /**
     * @var string
     *
     * @ORM\Column(name="img_path", type="string", length=150, nullable=true)
     */
    private $imgPath;

    /**
     * @var integer
     *
     * @ORM\Column(name="active", type="integer", nullable=true)
     */
    private $active;

    /**
     * @var integer
     *
     * @ORM\Column(name="level_access", type="integer", nullable=true)
     */
    private $levelAccess;

    /**
     * @var string
     *
     * @ORM\Column(name="act_key", type="string", length=80, nullable=false)
     */
    private $actKey;

    /**
     * @var string
     *
     * @ORM\Column(name="reg_date", type="date", nullable=false)
     */
    private $regDate;

    /**
     * @var string
     *
     * @ORM\Column(name="last_active", type="datetime", nullable=false)
     */
    private $lastActive;

    /**
     * @var string
     *
     * @ORM\Column(name="user_role", type="string", length=50, nullable=false)
     */
    private $userRole;

    /**
     * Get userRole
     *
     * @return string
     */
    public function getUserRole()
    {
        return $this->userRole;
    }

    /**
     * Set userRole
     *
     * @param string $userRole
     * @return Users
     */
    public function setUserRole($userRole)
    {
        $this->userRole = $userRole;

        return $this;
    }

    /**
     * Removes sensitive data from the user
     */
    public function eraseCredentials()
    {

    }

    /**
     * Get user role
     *
     * @return array An array of Role objects
     */
    public function getRoles()
    {
        return array($this->getUserRole());
    }

    /**
     * Returns the salt that was originally used to encode the password
     */
    public function getSalt()
    {

    }

    /**
     * @param UserInterface $user The user
     * @return boolean True if equal, false othwerwise.
     */
    public function equals(UserInterface $user)
    {
        return md5($this->getUsername()) == md5($user->getUsername());
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Users
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set tempPass
     *
     * @param string $tempPass
     * @return Users
     */
    public function setTempPass($tempPass)
    {
        $this->tempPass = $tempPass;

        return $this;
    }

    /**
     * Get tempPass
     *
     * @return string
     */
    public function getTempPass()
    {
        return $this->tempPass;
    }

    /**
     * Set tempPassActive
     *
     * @param integer $tempPassActive
     * @return Users
     */
    public function setTempPassActive($tempPassActive)
    {
        $this->tempPassActive = $tempPassActive;

        return $this;
    }

    /**
     * Get tempPassActive
     *
     * @return integer
     */
    public function getTempPassActive()
    {
        return $this->tempPassActive;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Users
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Users
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set dialingCode
     *
     * @param integer $dialingCode
     * @return Users
     */
    public function setDialingCode($dialingCode)
    {
        $this->dialingCode = $dialingCode;

        return $this;
    }

    /**
     * Get dialingCode
     *
     * @return integer
     */
    public function getDialingCode()
    {
        return $this->dialingCode;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     * @return Users
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Users
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Users
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set thumbPath
     *
     * @param string $thumbPath
     * @return Users
     */
    public function setThumbPath($thumbPath)
    {
        $this->thumbPath = $thumbPath;

        return $this;
    }

    /**
     * Get thumbPath
     *
     * @return string
     */
    public function getThumbPath()
    {
        return $this->thumbPath;
    }

    /**
     * Set imgPath
     *
     * @param string $imgPath
     * @return Users
     */
    public function setImgPath($imgPath)
    {
        $this->imgPath = $imgPath;

        return $this;
    }

    /**
     * Get imgPath
     *
     * @return string
     */
    public function getImgPath()
    {
        return $this->imgPath;
    }

    /**
     * Set active
     *
     * @param integer $active
     * @return Users
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return integer
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set levelAccess
     *
     * @param integer $levelAccess
     * @return Users
     */
    public function setLevelAccess($levelAccess)
    {
        $this->levelAccess = $levelAccess;

        return $this;
    }

    /**
     * Get levelAccess
     *
     * @return integer
     */
    public function getLevelAccess()
    {
        return $this->levelAccess;
    }

    /**
     * Set actKey
     *
     * @param string $actKey
     * @return Users
     */
    public function setActKey($actKey)
    {
        $this->actKey = $actKey;

        return $this;
    }

    /**
     * Get actKey
     *
     * @return string
     */
    public function getActKey()
    {
        return $this->actKey;
    }

    /**
     * Set regDate
     *
     * @param string $regDate
     * @return Users
     */
    public function setRegDate($regDate)
    {
        $this->regDate = $regDate;

        return $this;
    }

    /**
     * Get regDate
     *
     * @return string
     */
    public function getRegDate()
    {
        return $this->regDate;
    }

    /**
     * Set lastActive
     *
     * @param string $lastActive
     * @return Users
     */
    public function setLastActive($lastActive)
    {
        $this->lastActive = $lastActive;

        return $this;
    }

    /**
     * Get lastActive
     *
     * @return string
     */
    public function getLastActive()
    {
        return $this->lastActive;
    }
}
