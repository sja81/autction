<?php

namespace app\mailer;

use Yii;

class Mail
{

    public function __construct($recipient, $message, $view, $data = null, $sender = 'aukcia@aoreal.sk')
    {
        $this->recipient = $recipient;
        $this->message = $message;
        $this->sender = $sender;
        $this->view = $view;
        $this->data = $data;
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
    private $data;
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
        Yii::$app->mailer->view->params['title'] = $this->data->title;
        Yii::$app->mailer->view->params['id'] = $this->data->id;
        Yii::$app->mailer->compose($this->view, $this->data->attributes)
            ->setFrom($this->sender)
            ->setTo($this->recipient)
            ->setSubject($this->message)
            ->send();
    }
}
