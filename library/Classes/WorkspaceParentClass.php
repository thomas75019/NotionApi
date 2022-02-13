<?php

namespace Library\Classes;

use Library\Interfaces\WorkspaceParentInterface;

class WorkspaceParentClass implements WorkspaceParentInterface
{
    private string $type = "workspace";
    private bool $workspace = true;

    public function getType(): string
    {
        return $this->type;
    }

    public function getWorkspace(): bool
    {
        if ($this->workspace)
        {
            return true;
        }

        throw new \Exception("Workspace should always return true");
    }
}