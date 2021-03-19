<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Plan;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\PayerInfo;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

class PaymentController extends Controller
{

	private $apiContext;

    public function __construct()
 	{
 		$payPalConfig = Config::get('paypal');

 		$this->apiContext = new ApiContext(
        new OAuthTokenCredential(
            $payPalConfig['client_id'],$payPalConfig['secret']     // ClientID      // ClientSecret
        )
		);

 	}
 	public function payWithPayPal()
 	{
 		//return "Hola";
 		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		$amount = new Amount();
		$amount->setTotal('1.00');
		$amount->setCurrency('USD');

		$transaction = new Transaction();
		$transaction->setAmount($amount);

		$callbackUrl= url('/paypal/status');
		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl($callbackUrl)
		    ->setCancelUrl($callbackUrl);

		$payment = new Payment();
		$payment->setIntent('sale')
		    ->setPayer($payer)
		    ->setTransactions(array($transaction))
		    ->setRedirectUrls($redirectUrls);
		

		try {
		    $payment->create($this->apiContext);
		    //echo $payment;
		    return redirect()->away($payment->getApprovalLink());
		    //echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
		}
		catch (PayPalConnectionException $ex) {
		    // This will print the detailed information on the exception.
		    //REALLY HELPFUL FOR DEBUGGING
		    echo $ex->getData();
		}
	}
	public function payPalStatus(Request $request)
	{
		$paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/paypal/failed')->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {
            $status = 'Gracias! El pago a través de PayPal se ha ralizado correctamente. Y podes verlo en tus codigos.';
            return redirect('/home')->with('status',$status);
        }

        	$status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        	return redirect('/home')->with('status',$status);
	}
	

	/* ------------------------------STRIPE---------------------------------------*/

	public function checkoutStripe()
    {   
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51IVyflGWFcbNM1Xv28Fn0qPnbBnYBBcZTYRKi5AWHl8eJ3JYmi2gAqrxb4hPMnqKlHQx9AqUVvKAm6HRjgg1ideA00Zz9nq0co');
        		
		$amount = 100;
		$amount *= 1;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'USD',
			'description' => 'Payment From Tester',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('credit-card',compact('intent'));

    }

    public function afterPaymentStripe()
    {
    	$status = 'Gracias! El pago a través de Stripe se ha ralizado correctamente. Y podes verlo en tus codigos.';
        return redirect('/home')->with('status',$status);
    }
}
