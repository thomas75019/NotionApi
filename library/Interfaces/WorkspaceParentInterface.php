<?php 
namespace Library\Interfaces;

interface WorkspaceParentInterface
{
    public function getType(): string;

    public function getWorkspace(): bool;
}