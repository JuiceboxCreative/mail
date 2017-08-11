<?php

/*
 * (c) Vincent Klaiber <hello@vinkla.com>
 * (c) Nicholas Barrett <nick@juicebox.com.au>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/*
 * Plugin Name: Mail
 * Description: Send mail via SMTP through the env variables.
 * Author: WordPlate, Juicebox
 * Author URI: https://wordplate.github.io
 * Version: 2.0.0
 * Plugin URI: https://github.com/wordplate/mail#readme
 */

/*
 * Set custom smtp credentials.
 */

if (env('MAIL_HOST', false) && env('MAIL_USERNAME', false) && env('MAIL_PASSWORD', false)) {
    add_action('phpmailer_init', function (PHPMailer $mail) {
        $mail->IsSMTP();
        $mail->SMTPAuth = env('MAIL_USERNAME') && env('MAIL_PASSWORD');

        $mail->Host = env('MAIL_HOST');
        $mail->Port = env('MAIL_PORT', 587);
        $mail->Username = env('MAIL_USERNAME');
        $mail->Password = env('MAIL_PASSWORD');

        return $mail;
    });
}
