<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Model\Admin\Config;
use App\Model\Admin\SocialMedia;

class contact extends Mailable
{
    use Queueable, SerializesModels;
    private $config;
    private $email;
    private $socialMedia;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    { 
        $this->config = Config::get()->first();
        $this->email = $email;

        $this->socialMedia = SocialMedia::where('active',1)->get();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $config = $this->config;
        $email = $this->email;
        $socialMedia = $this->socialMedia;

        foreach($socialMedia as $media){
            if($media->icon == 'fa-instagram'){
                $instagram = '<td>
                    <a href="'.$media->link.'" target="_BLANK">
                        <img src="'.url("storage/images/email/instagram-1.png").'" alt="Instagram" width="38" height="38" style="display: block;" border="0" />
                    </a>
                </td>';
            }else{
                $instagram ='';
            }
            if($media->icon == 'fa-facebook'){
                $facebook = '<td>
                    <a href="'.$media->link.'" target="_BLANK">
                        <img src="'.url("storage/images/email/facebook-1.png").'" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
                    </a>
                </td>';
            }else{
                $facebook ='';
            }
        }
        $this->subject('Mensagem de '.$email->customer.' enviada pelo site');
        $this->to(['contato@crossfitcanoas.com.br'],['no-replay']);
        //$this->to('contato@lainitestes.top','no-replay');
        $this->view('admin.email.contact',[
            'title_postfix' => 'no-replay',
            'config'        => $config,
            'email'         => $email,
            'instagram'     => $instagram,
            'facebook'      => $facebook,
        ]);
    }
}
