<?php

namespace App\Services\Admin;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;

class AuthService
{
    /**
     * Sends a password reset link to the user with the given email address.
     *
     * @param string $email
     * @return string
     * @throws \Exception
     */
    public function resetPassword($email)
    {
        try {
            $response = Password::sendResetLink(
                ['email' => $email]
            );
            return $response;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    /**
     * Change the password for the user.
     *
     * @param string $old_password
     * @param string $new_password
     * @return bool
     * @throws \Exception
     */
    public function changePassword($old_password, $new_password)
    {
        try {
            $user = Auth::user();

            if (!Hash::check($old_password, $user->password)) {
                throw new Exception(__('validation_messages.change_password.old_password_incorrect'), 422);
            } else {
                $user->password = Hash::make($new_password);
                $user->save();
                return true;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }
    /**
     * Update the authenticated user's profile information.
     *
     * @param array $data
     * @return bool
     * @throws Exception
     */
    public function updateProfile($data)
    {
        $user = Auth::user();
        DB::beginTransaction();
        try {
            // Columns to move to the userDetails table
            $userDetailsData = [];

            // Handle profile picture update
            if (isset($data['profile_picture'])) {
                $file = $data['profile_picture'];

                // Delete the existing profile picture if it exists
                if ($user->userDetails?->profile_picture) {
                    Storage::disk('public')->delete($user->userDetails->profile_picture);
                }

                // Store the new profile picture
                $userDetailsData['profile_picture'] = Storage::disk('public')->put('uploads', $file);
            }

            // Add contact number to userDetails data if present
            if (isset($data['contact_no'])) {
                $userDetailsData['contact_no'] = $data['contact_no'];
            }
            if (isset($data['location'])) {
                $userDetailsData['location'] = $data['location'];
            }


            // Ensure the userDetails record exists and update or create it
            if (!empty($userDetailsData)) {
                $user->userDetails()->updateOrCreate([], $userDetailsData);
            }

            // Remove columns meant for userDetails from the main data
            $filteredUserData = collect($data)->except(['profile_picture', 'contact_no', 'location'])->toArray();

            // Update the users table with the remaining data
            if (!empty($filteredUserData)) {
                $user->update($filteredUserData);
            }

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            dd('error' . $e->getMessage());
            throw new Exception($e->getMessage());
        }
    }


    /**
     * Deletes the authenticated user's profile picture.
     *
     * @return bool
     * @throws Exception
     */
    public function deleteProfilePicture()
    {
        $user = Auth::user();
        DB::beginTransaction();
        try {
            if ($user->userDetails->profile_picture) {
                Storage::disk('public')->delete($user->userDetails->profile_picture);
                $user->userDetails->profile_picture = null;
                $user->userDetails->save();
                DB::commit();
                return true;
            }
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }


    /**
     * Retrieves the authenticated user's profile information.
     *
     * @return array The user's name, email, profile picture, contact no and location.
     */
    public function profile()
    {
        $user = Auth::user();
        // Get data from the users table
        $userData = $user->only('name', 'email');
        // Get data from the userDetails table
        $userDetailsData = $user->userDetails ? $user->userDetails->only('profile_picture', 'contact_no', 'location') : [];
        // Merge both sets of data
        return array_merge($userData, $userDetailsData);
    }
}
