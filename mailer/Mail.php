<?php

namespace app\mailer;

use Yii;

class Mail
{

    public function __construct($recipient, $message, $view, $sender = 'aukcia@aoreal.sk')
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
        Yii::$app->mailer->compose($this->view)
            ->setFrom($this->sender)
            ->setTo($this->recipient)
            ->setSubject($this->message)
            ->send();
    }
}
