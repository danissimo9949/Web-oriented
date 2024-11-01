<?php 

abstract class AbstractHandler 
{ 
    /** 
     * @var AbstractHandler 
     */ 
    protected $_next; 

    /** 
     * Send request 
     * 
     * @param mixed $message 
     */ 
    abstract public function sendRequest($message); 

    /** 
     * Set the next handler 
     * 
     * @param AbstractHandler $next 
     */ 
    public function setNext($next) 
    { 
        $this->_next = $next; 
    } 

    /** 
     * Get the next handler 
     * 
     * @return AbstractHandler 
     */ 
    public function getNext() 
    { 
        return $this->_next;     
    } 
} 

class ConcreteHandlerA extends AbstractHandler 
{ 
    /** 
     * Process the request 
     * 
     * @param mixed $message 
     */ 
    public function sendRequest($message) 
    { 
        if ($message == 1) { 
            echo __CLASS__ . " processes this message\n"; 
        } else { 
            if ($this->getNext()) { 
                $this->getNext()->sendRequest($message); 
            } 
        } 
    } 
} 

class ConcreteHandlerB extends AbstractHandler 
{ 
    /** 
     * Process the request 
     * 
     * @param mixed $message 
     */ 
    public function sendRequest($message) 
    { 
        if ($message == 2) { 
            echo __CLASS__ . " processes this message\n"; 
        } else { 
            if ($this->getNext()) { 
                $this->getNext()->sendRequest($message); 
            } 
        } 
    } 
} 

$handlerA = new ConcreteHandlerA(); 
$handlerB = new ConcreteHandlerB();
$handlerA->setNext($handlerB); 

// Send a request with message 1
$handlerA->sendRequest(1);

// Send a request with message 2
$handlerA->sendRequest(2);

?>
