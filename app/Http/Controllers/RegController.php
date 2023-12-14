<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use DB;
class RegController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
        public $successStatus = 200;

        public function __construct() {
            date_default_timezone_set('Asia/Kolkata');

        }
       
        public function login()
        {
            return view('login');
        }
        public function verifyotp()
        {
            return view('verifyotp');
        }
        public function update_user()
        {
            return view('update_user');
        }
     
}        