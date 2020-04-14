<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

include_once 'vendor/autoload.php';
use App\{
    Deliver\ByEmail,
    Deliver\BySms,
    Deliver\ToConsole,
    Format\Raw,
    Format\WithDateAndDetails,
    Format\WithDate



};
use Interfaces\{
    Deliver,
    Format
};
class Logger
{
    private $format;
    private $delivery;

    public function __construct(Format $format, Deliver $delivery)
    {
        $this->format   = $format;
        $this->delivery = $delivery;
    }
    public function log($string)
    {
        echo  $this->delivery->output($this->format->format($string));
    }
}
$logger = new Logger(new WithDateAndDetails(), new ByEmail());
$logger->log('Error! ');
