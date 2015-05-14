<?php namespace UiTest;
/**
 * Created by IntelliJ IDEA.
 * User: blitzcat
 * Date: 5/14/15
 * Time: 7:37 AM
 */

class SignupTest extends MyAbstract
{
    public function testSignup()
    {
        //signup values
        $user = [];
        $names = ['elephant', 'chains', 'climbing', 'purplish', 'keen', 'exhaled', 'packer', 'mold', 'clerk'];
        $user['email'] = uniqid('seleium').'@nowhere.net';
        $user['password'] = sha1(uniqid('password'));
        $user['name'] = $names[array_rand($names)].$names[array_rand($names)].uniqid();
        //register account
        self::url('https://www.tumblr.com/');
        self::waitForText('Explore Tumblr');
        self::byName("user[email]")->value($user['email']);
        self::byName("user[password]")->value($user['password']);
        self::byName("tumblelog[name]")->value($user['name']);
        self::byId('signup_forms_submit')->click();

        self::waitForText('How old are you?');
        self::byId("signup_age")->value(rand(18,69));
        self::byId('signup_tos')->click();
        self::byId('signup_forms_submit')->click();

        self::waitForText('I am not a robot');
        

    }
}