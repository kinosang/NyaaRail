<?php

namespace App;

use JMGQ\AStar\AStar;
use JMGQ\AStar\Node;

class RAStar extends AStar
{
    public function generateAdjacentNodes(Node $node)
    {
        $snode = SNode::fromNode($node);

        return $snode->getNeighbours();
    }

    public function calculateRealCost(Node $node, Node $adjacent)
    {
        $snode     = SNode::fromNode($node);
        $sadjacent = SNode::fromNode($adjacent);

        if ($this->areAdjacent($snode, $sadjacent)) {
            return abs($snode->getX() - $sadjacent->getX()) + abs($snode->getY() - $sadjacent->getY());
        }

        return PHP_INT_MAX;
    }

    public function calculateEstimatedCost(Node $start, Node $end)
    {
        return PHP_INT_MAX;
        /**
         * $snode     = SNode::fromNode($start);
         * $sadjacent = SNode::fromNode($end);

         * $xFactor = pow($snode->getX() - $sadjacent->getX(), 2);
         * $yFactor = pow($snode->getY() - $sadjacent->getY(), 2);

         * sreturn sqrt($xFactor + $yFactor);
         */
    }

    private function areAdjacent(SNode $a, SNode $b)
    {
        return abs($a->getX() - $b->getX()) <= 1 && abs($a->getY() - $b->getY()) <= 1;
    }
}
