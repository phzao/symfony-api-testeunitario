<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\Interfaces\CategoryRepositoryInterface;

/**
 * Class CategoryRepository
 * @package App\Repository
 */
class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $objectRepository;

    /**
     * CategoryRepository constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager    = $entityManager;
        $this->objectRepository = $this
                                        ->entityManager
                                        ->getRepository(Category::class);
    }

    /**
     * @param Category $category
     *
     * @return mixed|string
     */
    public function save(Category $category)
    {
        try {

            echo "hi";exit;
            $this->entityManager->persist($category);
            $this->entityManager->flush();

        } catch (\PDOException $exception) {

            return $exception->getMessage();
        }
    }

    // /**
    //  * @return Category[] Returns an array of Category objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Category
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
