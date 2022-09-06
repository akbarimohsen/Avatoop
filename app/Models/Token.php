<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Helper\Tokenable;

class Token extends Model
{
    use  HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    const EXPIRATION_TIME = 2; // minutes
    protected $fillable = [
        'code',
        'user_id',
        'used'
    ];
    public function __construct(array $attributes = [])
    {
        if (!isset($attributes['code'])) {
            $attributes['code'] = $this->generateCode();
        }
        parent::__construct($attributes);
    }
    /**
     * Generate a six digits code
     *
     * @param int $codeLength
     * @return string
     */
    public function generateCode($codeLength = 5)
    {
        $max = pow(10, $codeLength);
        $min = $max / 10 - 1;
        $code = mt_rand($min, $max);
        return $code;
    }
    /**
     * User tokens relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    /**
     * True if the token is not used nor expired
     *
     * @return bool
     */
    public function isValid()
    {
        return !$this->isUsed() && !$this->isExpired();
    }
    /**
     * Is the current token used
     *
     * @return bool
     */
    public function isUsed()
    {
        return $this->used;
    }
    /**
     * Is the current token expired
     *
     * @return bool
     */
    public function isExpired()
    {
        return $this->created_at->diffInMinutes(Carbon::now()) > static::EXPIRATION_TIME;
    }
    public function sendCode($phoneNumber)
    {
        if (!$this->user) {
            throw new \Exception("No user attached to this token.");
        }
        if (!$this->code) {
            $this->code = $this->generateCode();
        }
        // try {
        //     $message = " کد ورود شما به انجمن علمی دانشگاه صنعتی قم" . "Code:" . $this->code;
        //     $lineNumber = "30005088";
        //     $receptor = $phoneNumber;
        //     $api = new \Ghasedak\GhasedakApi('f3faecc84ca37fc19a92cc9913bd677fb5723aad09a9805213ec3a5491c2b3d8');
        //     $api->SendSimple($receptor, $message, $lineNumber);
        // } catch (\Ghasedak\Exceptions\ApiException $e) {
        //     echo $e->errorMessage();
        // } catch (\Ghasedak\Exceptions\HttpException $e) {
        //     echo $e->errorMessage();
        // }

        if (!$this->user) {
            throw new \Exception("No user attached to this token.");
        }
        if (!$this->code) {
            $this->code = $this->generateCode();
        }
        try {
            // send code via SMS
        } catch (\Exception $ex) {
            return false; //enable to send SMS
        }
        return true;
    }
}
