<?php

namespace App\Repository;

use App\Entity\Recipe;
use App\Utils\SearchRecipe;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;

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

   /**
    * @return Recipe[] Returns an array of Recipe objects
    */
   public function search(SearchRecipe $search): Query
   {
        $query = $this->createQueryBuilder('r');

        if(!empty($search->getSeason())) {
            $query
                ->join('r.seasons', 's')
                ->andWhere('s IN (:season)')
                ->setParameter('season', $search->getSeason())
            ;
        }

        if(!empty($search->getLevel())) {
            $query
                ->andWhere('r.level = :level')
                ->setParameter('level', $search->getLevel())
            ;
        }

        if(!empty($search->getQuery())) {
            $query
                ->andWhere('r.name like :query')
                ->setParameter('query', '%'.$search->getQuery().'%')
            ;
        }
        //    ->orderBy('r.id', 'ASC')
           
        //    ->getResult()
       return $query->getQuery();
   }

//    /**
//     * @return Recipe[] Returns an array of Recipe objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

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
