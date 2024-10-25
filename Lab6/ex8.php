<?php 

class TwitterService 
{     
    protected $data;
    public function setMessage($text) 
    { 
        $this->data['message'] = $text; 
        echo $this->data['message'] . PHP_EOL; 
    } 

    public function sendTweet() { 
        echo "I sent a tweet"; 
    } 
} 

class SmsService 
{     
    protected $recipient; 
    protected $message; 
    protected $sendTime;

    public function setRecipient($recipient) 
    { 
        $this->recipient = $recipient; 
    } 

    public function setMessage($message) 
    { 
        $this->message = $message; 
    }

    public function setSendTime($sendTime)
    {
        $this->sendTime = $sendTime;
    }

    public function sendText() 
    { 
        // Перевірка часу відправлення
        if ($this->sendTime) {
            echo "Scheduled to send SMS at: " . $this->sendTime . PHP_EOL;
        }
        echo "SMS sent to {$this->recipient}: {$this->message}"; 
    } 
} 

interface NotificationInterface {   
    public function setData($data);   
    public function sendNotification(); 
} 

class TwitterAdapter implements NotificationInterface 
{   
    protected $_data;   

    public function setData($data) 
    { 
        $this->_data = $data; 
    } 

    public function sendNotification() 
    { 
        $twitterClient = new TwitterService(); 
        $twitterClient->setMessage($this->_data['message']); 
        $twitterClient->sendTweet(); 
    } 
} 

class SmsAdapter implements NotificationInterface 
{   
    protected $_data;   

    public function setData($data) 
    { 
        $this->_data = $data; 
    } 

    public function sendNotification() 
    { 
        $smsClient = new SmsService(); 
        $smsClient->setRecipient($this->_data['recipient']); 
        $smsClient->setMessage($this->_data['message']); 
        
        // Перевірка наявності часу відправлення
        if (isset($this->_data['sendTime'])) {
            $smsClient->setSendTime($this->_data['sendTime']);
        }
        
        $smsClient->sendText(); 
    } 
} 

interface INotificationManager  
{ 
    public function sendNotification($type = '', $data); 
} 

class NotificationManager implements INotificationManager 
{ 
    public function sendNotification($type = '', $data) 
    {     
        switch($type) 
        {       
            case "twitter": 
                $notification = new TwitterAdapter(); 
                break;       
            case "sms": 
                $notification = new SmsAdapter();         
                break;         
            default: 
                echo "error";         
                return false;         
                break; 
        } 

        $notification->setData($data); 
        $notification->sendNotification();    
    } 
} 

$array = array( 
    "message" => "This is a tweet"
); 

$arraySms = array( 
    "recipient" => "1234567890", 
    "message" => "This is an SMS message", 
    "sendTime" => "2024-10-26 10:00:00"
); 

$a = new NotificationManager(); 
$a->sendNotification("twitter", $array); 

echo PHP_EOL;

$a->sendNotification("sms", $arraySms);

?>
