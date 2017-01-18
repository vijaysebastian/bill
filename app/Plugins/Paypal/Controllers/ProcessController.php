<?php

namespace App\Plugins\Paypal\Controllers;

use App\Http\Controllers\Controller;
use App\Plugins\Paypal\Model\Paypal;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    protected $paypal;

    public function __construct()
    {
        $paypal = new Paypal();
        $this->paypal = $paypal;
    }

    public function PassToPayment($requests)
    {
        try {
            //dd($requests);
            $request = $requests['request'];
            $order = $requests['order'];
            $cart = $requests['cart'];
            //dd($request);
            if ($cart->count() > 0) {
                $total = \Cart::getSubTotal();
            } else {
                $total = $request->input('cost');
                \Cart::clear();
                \Session::set('invoiceid', $order->id);
            }

            if ($request->input('payment_gateway') == 'paypal') {
                if (!\Schema::hasTable('paypal')) {
                    throw new \Exception('Paypal is not configured');
                }
                $paypal = $this->paypal->where('id', 1)->first();
                if (!$paypal) {
                    throw new \Exception('Paypal Fields not given');
                }
                $data = $this->getFields($order);
                //dd($data);
                $this->middlePage($data);
            }
        } catch (\Exception $ex) {
            dd($ex);
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }

    public function getFields($invoice)
    {
        try {
            //dd($invoice);
            $item = [];
            $data = [];
            $user = \Auth::user();
            if (!$user) {
                throw new \Exception('No autherized user');
            }
            $config = $this->paypal->where('id', 1)->first();
            if ($config) {
                $business = $config->business;
                $cmd = $config->cmd;
                $return = $config->success_url;
                $cancel_return = $config->cancel_url;
                $notify_url = $config->notify_url;
                $image_url = $config->image_url;
                $rm = 1;
                $currency_code = $invoice->currency;
                $invoice_id = $invoice->id;
                $first_name = $user->first_name;
                $last_name = $user->last_name;
                $address1 = $user->address;
                $city = $user->town;
                $zip = $user->zip;
                $email = $user->email;
                $product_name = '';
                if ($invoice->invoiceItem()->first()) {
                    $product_name = str_replace(' ', '-', $invoice->invoiceItem()->first()->product_name);
                }

                $data = [
                    'business'      => $business,
                    'cmd'           => $cmd,
                    'return'        => $return,
                    'cancel_return' => $cancel_return,
                    'notify_url'    => $notify_url,
                    'image_url'     => $image_url,
                    'rm'            => $rm,
                    'currency_code' => 'USD', //$currency_code,
                    'invoice'       => $invoice_id,
                    'first_name'    => $first_name,
                    'last_name'     => $last_name,
                    'address1'      => $address1,
                    'city'          => $city,
                    'zip'           => $zip,
                    'email'         => $email,
                    'item_name'     => $product_name,
                ];

                $items = $invoice->invoiceItem()->get()->toArray();
                //dd($items);
                if (count($items) > 0) {
                    for ($i = 0; $i < count($items); $i++) {
                        $n = $i + 1;
                        $item = [
                            "item_name_$n" => $items[$i]['product_name'],
                            "quantity_$n"  => $items[$i]['quantity'],
                        ];
                    }
                    $data = array_merge($data, $item);
                    $total = ['amount' => $invoice->grand_total];
                    $data = array_merge($data, $total);
                }
            }

            return $data;
        } catch (\Exception $ex) {
            dd($ex);
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }

    public function postCurl($data)
    {
        try {
            $config = $this->paypal->where('id', 1)->first();
            if (!$config) {
                throw new \Exception('Paypal Fields not given');
            }
            $url = $config->paypal_url;
            $post_data = http_build_query($data);
            echo $url;
            dd($post_data);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            curl_close($ch);
            dd($output);
        } catch (\Exception $ex) {
            dd($ex);
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }

    public function postForm($data)
    {
        try {
            $config = $this->paypal->where('id', 1)->first();
            if (!$config) {
                throw new \Exception('Paypal Fields not given');
            }
            $url = $config->paypal_url;
            echo "<form action=$url id=form name=redirect method=post>";
            foreach ($data as $key => $value) {
                echo "<input type=hidden name=$key value=$value>";
            }
            echo '</form>';
            echo"<script language='javascript'>document.redirect.submit();</script>";
        } catch (\Exception $ex) {
            dd($ex);
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }

    public function middlePage($data)
    {
        try {
            $path = app_path().'/Plugins/Paypal/views';
            \View::addNamespace('plugins', $path);
            echo view('plugins::middle-page', compact('data'));
        } catch (\Exception $ex) {
            dd($ex);
        }
    }

    public function response(Request $request)
    {
        $url = 'checkout';
        if (\Session::has('invoiceid')) {
            $id = \Session::get('invoiceid');
            $url = 'paynow/'.$id;
        }
        if (\Cart::getContent()->count() > 0) {
            \Cart::clear();
        }
        $this->success($id);
        \Session::forget('invoiceid');

        return redirect($url)->with('success', 'Thank you for your order. Your transaction is successful. We will be processing your order soon.');
    }

    public function cancel(Request $request)
    {
        $url = 'checkout';
        if (\Session::has('invoiceid')) {
            $id = \Session::get('invoiceid');
            $url = 'paynow/'.$id;
        }
        \Session::forget('invoiceid');

        return redirect($url)->with('fails', 'Thank you for your order. However,the transaction has been declined. Try again.');
    }

    public function notify(Request $request)
    {
        dd($request);
    }

    public function success($invoiceid)
    {
        $control = new \App\Http\Controllers\Order\RenewController();
        if ($control->checkRenew() == false) {
            $invoice = new \App\Model\Order\Invoice();
            $invoice = $invoice->findOrFail($invoiceid);
            $checkout_controller = new \App\Http\Controllers\Front\CheckoutController();
            $checkout_controller->checkoutAction($invoice);
        } else {
            $control->successRenew();
        }
        \Cart::clear();
    }
}
