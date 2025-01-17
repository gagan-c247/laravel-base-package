<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\{ChangePassword, LoginRequest, ResetPassword, UpdateProfile, UpdateProfileImage};
use App\Services\Admin\AuthService;
use C247\Codebank\Traits\ResponseCodeTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    use ResponseCodeTrait;
    protected $authService;
    /**
     * Constructor
     *
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    /**
     * Display the login view for the admin panel.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = "Login";
        return view('admin.auth.login', compact('title'));
    }
    /**
     * Handle the login request for the admin panel.
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * This method validates the incoming login request, including email and password.
     * It attempts to authenticate the user with the provided credentials and 'remember me' option.
     * On successful authentication, it redirects the user to the intended route, typically the admin profile,
     * with a success message. If authentication fails, it redirects back to the login page with an error message.
     */
    public function login(LoginRequest $request)
    {
        // Validate the incoming request (email and password fields are already validated in the LoginRequest)
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');  // Check if the "remember me" option is selected
        // Attempt to log the user in
        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();  // Get the authenticated user
            return redirect()->intended(route('admin.dashboard'))->with(['success' => 'Login successfully']);
        } else {
            return redirect()->back()->withInput()->with(['error' => __('validation_messages.login.password.incorrect')]);
        }
    }
    /**
     * Display the forgot password view for the admin panel.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     *
     * This method returns the view for the forgot password page of the admin panel.
     */
    public function forgotPassword(Request $request)
    {
        $title = 'Forgot Password';
        return view('admin.auth.forgot-password', compact('title'));
    }
    /**
     * Handle a password reset request.
     *
     * @param ResetPassword $request
     * @return \Illuminate\Http\JsonResponse
     *
     * This method attempts to send a password reset link to the user's email address.
     * It uses the AuthService to perform the action and returns a JSON response with
     * a success message and data if the operation is successful. If an error occurs,
     * it catches the exception and returns a JSON response with an error message.
     */
    public function resetPassword(ResetPassword $request)
    {
        $email = $request->input('email');
        try {
            $res = $this->authService->resetPassword($email);
            return redirect()->back()->with(['success' => __('validation_messages.forgot_password.email.sent')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    /**
     * Display the change password view for the admin panel.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     *
     * This method returns the view for the change password page of the admin panel.
     */
    public function editPassword(Request $request)
    {

        return view('admin.profile.change-password')->render();
    }
    /**
     * Change the password for the user.
     *
     * @param ChangePassword $request
     * @return \Illuminate\Http\JsonResponse
     *
     * This method attempts to change the password for the user. The request must
     * contain the old password in order to authorise the change. If the request is
     * successful, a JSON response with a success message is returned. If the
     * request fails, a JSON response with an error message is returned.
     */
    public function changePassword(ChangePassword $request)
    {
        $old_password = $request->input('old_password');
        $new_password = $request->input('password');
        try {
            $res = $this->authService->changePassword($old_password, $new_password);
            return $this->getResponseCode(code: 200, message: 'Password changed successfully');
        } catch (\Exception $e) {
            $errors = ["old_password" => [$e->getMessage()]];
            return $this->getResponseCode(code: $e->getCode(), message: $e->getMessage(), error: $e->getMessage(), errors: $errors);
        }
    }
    /**
     * Display the edit profile view for the admin panel.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     *
     * This method returns the view for editing the authenticated user's profile.
     */
    public function editProfile(Request $request)
    {
        return view('admin.profile.edit-profile');
    }
    /**
     * Update the authenticated user's profile information.
     *
     * @param UpdateProfile $request
     * @return \Illuminate\Http\JsonResponse
     *
     * This method handles the request to update the user's profile information.
     * It validates the request data and uses the AuthService to update the profile.
     * On success, it returns a JSON response with a success message and updated data.
     * In case of an error, it catches the exception and returns a JSON response with an error message.
     */
    public function updateProfile(UpdateProfile $request)
    {
        $data = $request->validated();
        try {
            $res = $this->authService->updateProfile($data);
            return redirect()->back()->with(['success' => 'Profile updated successfully', 'data' => $res]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Failed to update profile']);
        }
    }
    /**
     * Retrieve the authenticated user's profile information.
     *
     * This method fetches the user's profile data using the AuthService.
     * If the profile is found, it appends the full URL to the profile picture
     * and returns a JSON response with the profile data and a success message.
     * If the profile is not found, it returns a JSON response with a 404 error message.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        $res = $this->authService->profile();
        $title = 'Profile';
        return view('admin.profile.profile', ['data' => $res, 'title' => $title]);
    }
    /**
     * Update the authenticated user's profile picture.
     *
     * This method validates the request data using the UpdateProfileImage request object
     * and uses the AuthService to update the profile picture. If the operation is
     * successful, it returns a JSON response with a 200 status code and a success message.
     * If an error occurs, it catches the exception and returns a JSON response with a 500
     * status code and an error message.
     *
     * @param UpdateProfileImage $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfilePicture(UpdateProfileImage $request)
    {
        $data = $request->validated();
        try {
            $res = $this->authService->updateProfile($data);
            return $this->getResponseCode(code: 200, message: 'Profile picture updated successfully', data: $res);
        } catch (\Exception $e) {
            return $this->getResponseCode(code: 500, message: $e->getMessage(), error: $e->getMessage());
        }
    }
    /**
     * Delete the authenticated user's profile picture.
     *
     * This method uses the AuthService to delete the user's profile picture.
     * If the operation is successful, it returns a JSON response with a 201 status code and a success message.
     * If an error occurs, it catches the exception and throws a new Exception with the error message.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function deleteProfilePicture()
    {
        try {
            $res = $this->authService->deleteProfilePicture();
            return $this->getResponseCode(code: 201, message: 'Profile picture deleted successfully');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->back();
    }
}
