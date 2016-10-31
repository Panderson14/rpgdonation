<?php

namespace PayPal\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\Refund;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;

/**
 * Class Capture
 *
 * A capture transaction.
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string create_time
 * @property string update_time
 * @property \PayPal\Api\Amount amount
 * @property bool is_final_capture
 * @property string state
 * @property string parent_payment
 * @property \PayPal\Api\Currency transaction_fee
 * @property \PayPal\Api\Links[] links
 */
class Capture extends PayPalResourceModel
{
    /**
     * Identifier of the Capture transaction.
     *
     * @param string $id
     * 
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Identifier of the Capture transaction.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Amount being captured. If no amount is specified, amount is used from the authorization being captured. If amount is same as the amount that's authorized for, the state of the authorization changes to captured. If not, the state of the authorization changes to partially_captured. Alternatively, you could indicate a final capture by setting the is_final_capture flag to true.
     *
     * @param \PayPal\Api\Amount $amount
     * 
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Amount being captured. If no amount is specified, amount is used from the authorization being captured. If amount is same as the amount that's authorized for, the state of the authorization changes to captured. If not, the state of the authorization changes to partially_captured. Alternatively, you could indicate a final capture by setting the is_final_capture flag to true.
     *
     * @return \PayPal\Api\Amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * whether this is a final capture for the given authorization or not. If it's final, all the remaining funds held by the authorization, will be released in the funding instrument.
     *
     * @param bool $is_final_capture
     * 
     * @return $this
     */
    public function setIsFinalCapture($is_final_capture)
    {
        $this->is_final_capture = $is_final_capture;
        return $this;
    }

    /**
     * whether this is a final capture for the given authorization or not. If it's final, all the remaining funds held by the authorization, will be released in the funding instrument.
     *
     * @return bool
     */
    public function getIsFinalCapture()
    {
        return $this->is_final_capture;
    }

    /**
     * State of the capture transaction.
     * Valid Values: ["pending", "completed", "refunded", "partially_refunded"]
     *
     * @param string $state
     * 
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * State of the capture transaction.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * ID of the Payment resource that this transaction is based on.
     *
     * @param string $parent_payment
     * 
     * @return $this
     */
    public function setParentPayment($parent_payment)
    {
        $this->parent_payment = $parent_payment;
        return $this;
    }

    /**
     * ID of the Payment resource that this transaction is based on.
     *
     * @return string
     */
    public function getParentPayment()
    {
        return $this->parent_payment;
    }

    /**
     * Transaction fee applicable for this payment.
     *
     * @param \PayPal\Api\Currency $transaction_fee
     * 
     * @return $this
     */
    public function setTransactionFee($transaction_fee)
    {
        $this->transaction_fee = $transaction_fee;
        return $this;
    }

    /**
     * Transaction fee applicable for this payment.
     *
     * @return \PayPal\Api\Currency
     */
    public function getTransactionFee()
    {
        return $this->transaction_fee;
    }

    /**
     * Time the resource was created in UTC ISO8601 format.
     *
     * @param string $create_time
     * 
     * @return $this
     */
    public function setCreateTime($create_time)
    {
        $this->create_time = $create_time;
        return $this;
    }

    /**
     * Time the resource was created in UTC ISO8601 format.
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Time the resource was last updated in UTC ISO8601 format.
     *
     * @param string $update_time
     * 
     * @return $this
     */
    public function setUpdateTime($update_time)
    {
        $this->update_time = $update_time;
        return $this;
    }

    /**
     * Time the resource was last updated in UTC ISO8601 format.
     *
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * Retrieve details about a captured payment by passing the capture_id in the request URI.
     *
     * @param string $captureId
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return Capture
     */
    public static function get($captureId, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($captureId, 'captureId');
        $payLoad = "";
        $json = self::executeCall(
            "/v1/payments/capture/$captureId",
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new Capture();
        $ret->fromJson($json);
        return $ret;
    }

    /**
     * Refund a captured payment by passing the capture_id in the request URI. In addition, include an amount object in the body of the request JSON.
     *
     * @param Refund $refund
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return Refund
     */
    public function refund($refund, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($refund, 'refund');
        $payLoad = $refund->toJSON();
        $json = self::executeCall(
            "/v1/payments/capture/{$this->getId()}/refund",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new Refund();
        $ret->fromJson($json);
        return $ret;
    }

}
