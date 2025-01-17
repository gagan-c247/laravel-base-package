<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\{ChangePassword, UpdateProfile, LoginRequest, ResetPassword};
use App\Services\Admin\AuthService;
use C247\Codebank\Traits\ResponseCodeTrait;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

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
     * Handle a login request to the application.
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     *
     * This method attempts to authenticate a user using JWT tokens or traditional
     * session-based authentication, depending on the request type. If the request
     * expects JSON, it uses JWT for authentication and returns a JSON response with
     * a token upon successful login. If the request does not expect JSON, it performs
     * a session-based authentication and redirects to the intended route on success
     * or back to the login page with an error message on failure.
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        $token = JWTAuth::attempt($credentials, $remember);
        if ($token) {
            $user = JWTAuth::user();
            $data = $user;
            return $this->getResponseCode(code: 200, token: $token, message: 'Login successfully', data: $data);
        } else {
            return $this->getResponseCode(code: 404, token: $token, message: 'User not found');
        }
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
            return $this->getResponseCode(code: 200, message: 'Password reset link sent successfully', data: $res);
        } catch (\Exception $e) {
            return $this->getResponseCode(code: 500, message: $e->getMessage(), error: $e->getMessage());
        }
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
        if ($request->expectsJson()) {
            try {
                $res = $this->authService->changePassword($old_password, $new_password);
                return $this->getResponseCode(code: 200, message: 'Password changed successfully', data: $res);
            } catch (\Exception $e) {
                return $this->getResponseCode(code: 500, message: $e->getMessage(), error: $e->getMessage());
            }
        }
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
            return $this->getResponseCode(code: 200, message: 'Profile updated successfully', data: $res);
        } catch (\Exception $e) {
            return $this->getResponseCode(code: 500, message: $e->getMessage(), error: $e->getMessage());
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
        if (!empty($res)) {
            $res['profile_picture'] = asset($res['profile_picture']);
            return $this->getResponseCode(code: 200, message: 'Profile fetched successfully', data: $res);
        } else {
            return $this->getResponseCode(code: 404, message: 'Profile not found');
        }
    }
    public function logout(Request $request)
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return $this->getResponseCode(code: 200, message: 'Logout successful');
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return $this->getResponseCode(code: 500, message: 'Failed to logout, please try again');
        }
    }
}
