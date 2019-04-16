<?php

namespace AppBundle\Repository;

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends \Doctrine\ORM\EntityRepository
{
    public function findArticlesOrderByDateDesc()
    {
        return $this
        ->createQueryBuilder('article')
        ->orderBy('article.publishedAt', 'desc')
        ->getQuery()
        ->getResult();
    }
}
