<?php

namespace StorageRoom\AppBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class SaldoRepository extends EntityRepository
{
    public function findSaldoAnterior()
    {
        $em = $this->getEntityManager();

        $consultaDql = "SELECT s
                        FROM AppBundle:Saldo s
                        ORDER BY s.fecha DESC
                        ";

        $consulta = $em->createQuery($consultaDql);
        $consulta->setmaxResults(1);

        return $consulta->getOneOrNullResult();

    }
}
