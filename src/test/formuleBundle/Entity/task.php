<?php
namespace test\formuleBundle\Entity;

class task
{
    protected $task;

    protected $dueDate;
    protected $name;

    public function getTask()
    {
        return $this->task;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function setTask($task)
    {
        $this->task = $task;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }
    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
    }
    
    public function toString(){
        return $this->dueDate;
    }
    
}
