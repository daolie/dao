<?php
namespace dtedu\modules\demo\home\controllers;


class MailController{
    
    public function actionSend(){
    
        // Create the Transport
        $transport = (new \Swift_SmtpTransport('smtp.qq.com',587,'tls'))
            ->setUsername('')
            ->setPassword('')
        ;
    
        // Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);
        $path = 'D:\Desktop\test\test.doc';
        // Create a message
        $message = (new \Swift_Message(''))
            ->setFrom(['' => 'test'])
            ->setTo(['' => 'test'])
           // ->attach(\Swift_Attachment::fromPath($path)->setFilename($filename))
            ->setBody('<h1>测试</h1>')
            ->setHtmlBody('');
        // Send the message
        $mailer->send($message);
        
        
        /*$transport=\Swift_SmtpTransport::newInstance("smtp.qiye.163.com",25)
            ->setUsername("daolie12@163.com")
            ->setPassword("daolie112088");
        $mailer =\Swift_Mailer::newInstance($transport);
        $message=\Swift_Message::newInstance()
            ->setSubject("邮件主题")
            ->setFrom(array("daolie12@163.com"=>"php测试发送"))
            ->setTo("379255246@qq.com")
           // ->setContentType("text/html")
            ->setBody("邮件内容");
      //  $mailer->protocol='smtp';
        $mailer->send($message);*/
    }
}