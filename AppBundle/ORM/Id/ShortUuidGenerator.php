<?php

namespace AppBundle\ORM\Id;

use Doctrine\ORM\EntityManager;

class ShortUuidGenerator extends \Doctrine\ORM\Id\AbstractIdGenerator
{
    /**
     * {@inheritDoc}
     */
    public function generate(EntityManager $em, $entity)
    {
        $conn = $em->getConnection();
        $sql = 'SELECT ' . $conn->getDatabasePlatform()->getGuidExpression();
        $uuid =  substr ( $conn->query($sql)->fetchColumn(0) , 0, 8);
        $object = $em->getRepository(get_class($entity))->find($uuid);
        if($object){
        	return $this->generate($em, $entity);
        }else{
        	return $uuid;
        }
        
    }
}
