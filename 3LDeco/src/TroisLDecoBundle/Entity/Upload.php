<?php

namespace TroisLDecoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Upload
 *
 * @ORM\Table(name="upload")
 * @ORM\Entity(repositoryClass="TroisLDecoBundle\Repository\UploadRepository")
 * @Vich\Uploadable
 */
class Upload
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @Vich\UploadableField(mapping="upload", fileNameProperty="uploadName")
     *
     * @var File
     */
    private $uploadFile;
    
    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $uploadName;
    
    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $upload
     *
     * @return Upload
     */
    public function setUploadFile(File $upload = null)
    {
        $this->uploadFile = $upload;
        
        if ($upload)
            $this->updatedAt = new \DateTimeImmutable();
            
            return $this;
    }
    
    /**
     * @return File|null
     */
    public function getUploadFile()
    {
        return $this->uploadFile;
    }
    
    /**
     * @param string $uploadName
     *
     * @return Upload
     */
    public function setUploadName($uploadName)
    {
        $this->uploadName = $uploadName;
        
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getUploadName()
    {
        return $this->uploadName;
    }
}

