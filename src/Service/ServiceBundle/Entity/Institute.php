<?php

namespace Service\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Institute
 *
 * @ORM\Table(name="institute", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name"})}, indexes={@ORM\Index(name="FK_institute_user", columns={"user_id"}), @ORM\Index(name="FK_institute_category", columns={"category_id"})})
 * @ORM\Entity
 */
class Institute
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Service\ServiceBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Service\ServiceBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Service\ServiceBundle\Entity\Category
     *
     * @ORM\ManyToOne(targetEntity="Service\ServiceBundle\Entity\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Institute
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
     * Set user
     *
     * @param \Service\ServiceBundle\Entity\User $user
     *
     * @return Institute
     */
    public function setUser(\Service\ServiceBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Service\ServiceBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set category
     *
     * @param \Service\ServiceBundle\Entity\Category $category
     *
     * @return Institute
     */
    public function setCategory(\Service\ServiceBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Service\ServiceBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
