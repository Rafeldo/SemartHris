<?php

namespace KejawenLab\Application\SemartHris\Component\Job\Service;

use KejawenLab\Application\SemartHris\Component\Job\Model\MutationInterface;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@kejawenlab.com>
 */
class ValidateMutationService
{
    /**
     * @param MutationInterface $mutation
     *
     * @return bool
     */
    public static function validate(MutationInterface $mutation): bool
    {
        $count = 0;
        $employee = $mutation->getEmployee();

        if (null === $mutation->getNewCompany() || $mutation->getNewCompany() === $employee->getCompany()) {
            ++$count;
        }

        if (null === $mutation->getNewDepartment() || $mutation->getNewDepartment() === $employee->getDepartment()) {
            ++$count;
        }

        if (null === $mutation->getNewJobLevel() || $mutation->getNewJobLevel() === $employee->getJobLevel()) {
            ++$count;
        }

        if (null === $mutation->getNewJobTitle() || $mutation->getNewJobTitle() === $employee->getJobTitle()) {
            ++$count;
        }

        if (null === $mutation->getNewSupervisor() || $mutation->getNewSupervisor() === $employee->getSupervisor()) {
            ++$count;
        }

        if (5 === $count) {
            return false;
        }

        return true;
    }
}
