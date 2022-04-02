<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use  Validator;
class LoginRequestAPI extends FormRequest
{

  // protected $redirect=url();
   //redirect(url())->with('error',$this->validationData());

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return

        $rs=[
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
    {



        if($this->ensureIsNotRateLimited())
{

        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            //return response(['status'=>false,'message'=>'invalid email or password'],401);
            //throw ValidationException::withMessages([
              //  'email' => __('auth.failed'),
            //]);
            return response(['error'],400);

        }

        RateLimiter::clear($this->throttleKey());

        // return response([
        //     'status'=>true,
        //     'message'=>'Login Secusses'
        // ],200)
        }
        else
        {


        }

    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return true;
        }


        else {

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());
        return false;
    }

}

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::lower($this->input('email')).'|'.$this->ip();
    }
}
