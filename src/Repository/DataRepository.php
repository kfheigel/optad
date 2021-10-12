<?php

namespace App\Repository;

use App\Entity\Data;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Data|null find($id, $lockMode = null, $lockVersion = null)
 * @method Data|null findOneBy(array $criteria, array $orderBy = null)
 * @method Data[]    findAll()
 * @method Data[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DataRepository extends ServiceEntityRepository implements DataRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Data::class);
    }
    public function save(Data $data): void
    {
        $this->_em->persist($data);
        $this->_em->flush();
    }

    public function exists(Data $data): bool
    {
        $dbEntry = $this->findOneBy([
            'url' => $data->getUrl(),
            'tag' => $data->getTag(),
            'date' => $data->getDate(),
            'estimatedRevenue' => $data->getEstimatedRevenue(),
            'adImpressions' => $data->getAdImpressions(),
            'adEcpm' => $data->getAdEcpm(),
            'clicks' => $data->getClicks(),
            'adCtr' => $data->getAdCtr(),
        ]);
        return !(empty($dbEntry));
    }
}
