<?php

namespace Service\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImageTable
 *
 * @ORM\Table(name="image_table", indexes={@ORM\Index(name="FK__user1", columns={"user_id"}), @ORM\Index(name="FK__institute1", columns={"institude_id"})})
 * @ORM\Entity
 */
class ImageTable
{
    /**
     * @var string
     *
     * @ORM\Column(name="src", type="string", length=255, nullable=true)
     */
    private $src;

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
     * Set src
     *
     * @param string $src
     *
     * @return ImageTable
     */
    public function setSrc($src)
    {
        $this->src = $src;

        return $this;
    }

    /**
     * Get src
     *
     * @return string
     */
    public function getSrc()
    {
        return $this->src;
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
     * @return ImageTable
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
     * @return ImageTable
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
