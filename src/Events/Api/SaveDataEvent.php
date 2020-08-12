<?php

namespace Zijinghua\Zfilesystem\Events\Api;

class SaveDataEvent extends AppEvent
{
    public $params;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->params = $params;
    }
}
