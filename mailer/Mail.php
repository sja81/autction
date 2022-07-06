<?php
namespace app\mailer;

use Yii;

class Mail
{

    public function __construct($recipient, $message, $view, $sender = 'test@test.sk')
    {
        $this->recipient = $recipient;
        $this->message = $message;
        $this->sender = $sender;
        $this->view = $view;
    }

    /**
     * @var string
     */
    private $view = '';
    /**
     * @var string
     */
    private $sender = '';
    /**
     * @var array
     */
    private $recipient = '';
    /**
     * @var array
     */
    private $data = [];
    /**
     * @var null
     */
    private $subject = null;
    /**
     * @var null
     */
    private $message = null;
    /**
     * @return void
     */
    public function sendHTMLMessage(): void
    {
        try {
            $mailer = Yii::$app->mailer;
            if (!is_null($this->message)) {
                $mailer
                    ->compose($this->view)
                    ->setHtmlBody($this->message)
                    ->setFrom($this->sender)
                    ->setTo($this->recipient)
                    ->setCharset('utf-8')
                    ->setSubject($this->subject)
                    ->send();
            } else {
                $mailer
                    ->compose($this->view ,$this->data)
                    ->setFrom($this->sender)
                    ->setTo($this->recipient)
                    ->setCharset('utf-8')
                    ->setSubject($this->subject)
                    ->send();
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
}