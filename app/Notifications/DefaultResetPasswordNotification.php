<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class DefaultResetPasswordNotification extends ResetPassword
{

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(Lang::getFromJson('Alterar Senha'))
            ->line(Lang::getFromJson('Você está recebendo este e-mail porque recebemos uma solicitação de redefinição de senha para sua conta.'))
            ->action(Lang::getFromJson('Redefinir Senha'), url(config('app.url').route('password.reset', ['token' => $this->token], false)))
            ->line(Lang::getFromJson('Este link de redefinição de senha expirará em: contagem de minutos.', ['count' => config('auth.passwords.users.expire')]))
            ->line(Lang::getFromJson('Se você não solicitou uma redefinição de senha, nenhuma ação adicional é necessária.'));
    }

}
