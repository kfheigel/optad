<?php

namespace App\Infrastructure\Repository;

use App\Infrastructure\Entity\Setting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Setting|null find($id, $lockMode = null, $lockVersion = null)
 * @method Setting|null findOneBy(array $criteria, array $orderBy = null)
 * @method Setting[]    findAll()
 * @method Setting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SettingRepository extends ServiceEntityRepository implements SettingRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Setting::class);
    }

    public function save(Setting $setting): void
    {
        $this->_em->persist($setting);
        $this->_em->flush();
    }

    public function exists(Setting $setting): bool
    {
        $dbEntry = $this->findOneBy([
            'currency' => $setting->getCurrency(),
            'periodLength' => $setting->getPeriodLength(),
            'groupBy' => $setting->getGroupBy(),
        ]);
        return !(empty($dbEntry));
    }
}
