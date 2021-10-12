<?php

declare(strict_types=1);

namespace App\Handler;

use App\Command\UpdateDatabaseCommand;

final class UpdateDatabaseHandler implements CommandHandlerInterface
{
    public function __construct(
    ) {
    }

    public function __invoke(UpdateDatabaseCommand $command): void
    {
        $skillsQuery = $this->skillsQuery;
        $skillsQuery = $skillsQuery();

        foreach ($skillsQuery as $skill) {
            $dbSkill = $this->skillRepository->findOneSkillById($skill->id);

            if (!$this->ifObjectExists($dbSkill)) {
                $bldrSkill = new BoldareSkill($skill->id, $skill->name);
                $this->skillRepository->save($bldrSkill);
            } elseif ($dbSkill->getName() !== $skill->name) {
                $dbSkill->setName($skill->name);
                $this->skillRepository->update($dbSkill);
            }
        }
    }

}
