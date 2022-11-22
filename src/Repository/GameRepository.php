<?php

namespace App\Repository;

use App\Entity\Game;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Game>
 *
 * @method Game|null find($id, $lockMode = null, $lockVersion = null)
 * @method Game|null findOneBy(array $criteria, array $orderBy = null)
 * @method Game[]    findAll()
 * @method Game[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GameRepository extends ServiceEntityRepository
{
  public function __construct(ManagerRegistry $registry)
  {
    parent::__construct($registry, Game::class);
  }

  public function save(Game $entity, bool $flush = false): void
  {
    $this->getEntityManager()->persist($entity);

    if ($flush) {
        $this->getEntityManager()->flush();
    }
  }

  public function remove(Game $entity, bool $flush = false): void
  {
    $this->getEntityManager()->remove($entity);

    if ($flush) {
        $this->getEntityManager()->flush();
    }
  }

  /**
   * @throws NonUniqueResultException
   * @throws NoResultException
   */
  public function getCountGames(string $value): int {
    return $this->createQueryBuilder('g')
      ->select('count(g.id)')
      ->where('g.name LIKE :value')
      ->setParameter('value', '%'.$value.'%')
      ->getQuery()
      ->getSingleScalarResult();
  }

  public function getGamesByName(
    string $value,
    bool $isPublished,
    int $limit,
    int $offset)
  : array {
    $qb = $this->createQueryBuilder('g')
      ->where('g.name LIKE :name')
      ->setParameter('name', '%'.$value.'%');

    if (!$isPublished) {
      $qb = $qb->andWhere('g.isPublished = true');
    }

    return $qb
      ->orderBy('g.createdAt', 'DESC')
      ->addOrderBy('g.name', 'ASC')
      ->setFirstResult($offset)
      ->setMaxResults($limit)
      ->getQuery()
      ->getResult();
  }

//    /**
//     * @return Game[] Returns an array of Game objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Game
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
