<?php

namespace App\Repository;

use App\Entity\Recipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Recipe>
 *
 * @method Recipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recipe[]    findAll()
 * @method Recipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recipe::class);
    }

    public function save(Recipe $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Recipe $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

   public function findByExampleField($criteria)
   {
        $qb = $this->createQueryBuilder('r');

        if(!empty($criteria['season'])) {
            $qb
            ->join('r.seasons', 's')
           ->andWhere('s IN (:season)')
           ->setParameter('season', $criteria['season'])
           ;
        }

        if(!empty($criteria['level'])) {
            $qb
            ->andWhere('r.level = :level')
           ->setParameter('level', $criteria['level'])
           ;
        }

        if(!empty($criteria['search'])) {
            $qb
           ->andWhere('r.name LIKE :search')
           ->setParameter('search', "%".$criteria['search']."%")
           ;
        }

           return $qb
                ->getQuery()
       ;
   }

//    public function findOneBySomeField($value): ?Recipe
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
