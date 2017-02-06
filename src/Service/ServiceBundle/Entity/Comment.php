<?php

namespace Service\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comment", indexes={@ORM\Index(name="FK__user", columns={"user_id"}), @ORM\Index(name="FK__institute", columns={"institude_id"})})
 * @ORM\Entity
 */
class Comment
{
    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=false)
     */
    private $text;

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
     * @var \Service\ServiceBundle\Entity\Institute
     *
     * @ORM\ManyToOne(targetEntity="Service\ServiceBundle\Entity\Institute")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="institude_id", referencedColumnName="id")
     * })
     */
    private $institude;



    /**
     * Set text
     *
     * @param string $text
     *
     * @return Comment
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
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
     * @return Comment
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
     * Set institude
     *
     * @param \Service\ServiceBundle\Entity\Institute $institude
     *
     * @return Comment
     */
    public function setInstitude(\Service\ServiceBundle\Entity\Institute $institude = null)
    {
        $this->institude = $institude;

        return $this;
    }

    /**
     * Get institude
     *
     * @return \Service\ServiceBundle\Entity\Institute
     */
    public function getInstitude()
    {
        return $this->institude;
    }
}
