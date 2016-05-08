<?php

namespace App;

use JMGQ\AStar\AbstractNode;
use JMGQ\AStar\Node;

class SNode extends AbstractNode
{
    private $station;
    private $axis_x;
    private $axis_y;

    public function __construct($station_id)
    {
        $this->station                     = Station::with('lines')->find($station_id);
        list($this->axis_x, $this->axis_y) = explode(',', $this->station->coordinate);
    }

    public static function fromNode(Node $node)
    {
        return new SNode($node->getID());
    }

    public function getID()
    {
        return $this->station->id;
    }

    public function getNeighbours()
    {
        $neighbours = [];
        foreach ($this->station->lines as $line) {
            $stations = [];
            foreach ($line->stations as $station) {
                $stations[] = $station->id;
            }

            $station_no = array_search($this->station->id, $stations);
            if ($station_no > 0) {
                $neighbours[] = $stations[$station_no - 1];
            }
            if ($station_no < count($stations) - 1) {
                $neighbours[] = $stations[$station_no + 1];
            }
        }

        $neighbours = array_unique($neighbours);

        foreach ($neighbours as &$neighbour) {
            $neighbour = new SNode($neighbour);
        }

        return $neighbours;
    }

    public function getX()
    {
        return $this->axis_x;
    }

    public function getY()
    {
        return $this->axis_y;
    }
}
