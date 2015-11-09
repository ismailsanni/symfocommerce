<?php

namespace Eshop\ShopBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends EntityRepository
{
    //query for pagination without "getQuery()"
    public function findByCategoryForPaginator($categoryId){
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('p')
            ->from('ShopBundle:Product', 'p')
            ->innerJoin('p.category', 'ca')
            ->where('ca.id = :categoryid')
            ->andWhere('p.quantity <> 0')
            ->setParameter('categoryid', $categoryId
            );
    }

    //query for pagination without "getQuery()"
    public function findByManufacturerForPaginator($manufacturerId){
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('p')
            ->from('ShopBundle:Product', 'p')
            ->innerJoin('p.manufacturer', 'ma')
            ->where('ma.id = :manufacturerid')
            ->andWhere('p.quantity <> 0')
            ->setParameter('manufacturerid', $manufacturerId
            );
    }
}