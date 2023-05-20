<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Artisan;
use Log;
use Mail;

class NotifyClient implements ShouldQueue
{
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	private $email, $message, $callOnDestruct;

	/**
	 * Create a new job instance.
	 *
	 * @return void
	 */
	public function __construct($email, $message, $callOnDestruct = false)
	{
		$this->email = $email;
		$this->message = $message;
		$this->callOnDestruct = $callOnDestruct;
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle()
	{
		$email = $this->email;

		Mail::send(
			'admin.useraccount.notification.mail.email_client',
			[
				'contentMsg' => $this->message,
			],
			function ($mail) use ($email) {
				// MIS Nano Vet Clinic
				$mail->to($email)
					->from("nano.mis@technical.com")
					->subject("Nano-tification");
			}
		);
	}

	public function __destruct() {
		if ($this->callOnDestruct) {
			Log::info("[NotifyClient] Called on Destruct");

			Artisan::call("queue:work", [
				'--queue' => 'user_notification',
				'--tries' => 3,
				'--once' => true
			]);
		}
	}
}