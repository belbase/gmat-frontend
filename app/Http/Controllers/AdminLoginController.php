<?php
namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    public function getAdminLogin()
    {

        if (auth()->guard('admin')->user()) return redirect()->route('dashboard.index');
        return view('dashboard.login');
    }
    public function adminAuth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            return redirect()->route('dashboard.index');
        }

        if ( ! Admin::where('email', $request->email)->first() ) {
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
        }

        if ( ! Admin::where('email', $request->email)->where('password', bcrypt($request->password))->first() ) {
            throw ValidationException::withMessages([
                'password' => [trans('auth.password')],
            ]);
        }
        return view('dashboard.login');
    }
}
