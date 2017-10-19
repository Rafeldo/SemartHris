<?php

namespace KejawenLab\Application\SemartHris\Component\Contract\Repository;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@kejawenlab.com>
 */
final class ContractableRepositoryFactory
{
    const ADDRESS_REPOSITORY_SERVICE_TAG = 'semarthris.contractable_repository';

    /**
     * @var array
     */
    private $repositories;

    /**
     * @param ContractableRepositoryInterface[] $repositories
     */
    public function __construct(array $repositories = [])
    {
        $this->repositories = [];
        foreach ($repositories as $repository) {
            $this->addRepository($repository);
        }
    }

    /**
     * @return ContractableRepositoryInterface[]
     */
    public function getRepositories(): array
    {
        return $this->repositories;
    }

    /**
     * @param ContractableRepositoryInterface $repository
     */
    public function addRepository(ContractableRepositoryInterface $repository): void
    {
        $this->repositories[get_class($repository)] = $repository;
    }
}