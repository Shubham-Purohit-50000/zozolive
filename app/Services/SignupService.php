<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class SignupService
{
    public function createModelUser($request)
    {
        //        $user->attachRole($this->getUserRoleId('model'));
        return User::updateOrCreate(
            [
                'username' => $request['username']
            ],
            [
                'name'   => $request['name'],
                'avatar' => $request['profile_image']->store('users/avatar', 'public'),
                'gender' => $request['gender'],
                'dob'    => $request['birth_date'],
            ]
        );
    }

    public function getUserRoleId($role = 'user')
    {
        return DB::table('roles')
            ->where('name', $role)
            ->value('id');
    }

    public function createModel(User $user, $request)
    {
        $host = $user->model()->create([
            'interested_in'      => $request['interest'],
            'language_id'        => $request['language_id'],
            'specific_id'        => $request['specific_id'],
            'subculture_id'      => $request['subculture_id'],
            'about_me'           => $request['about'],
            // 'cover_image'        => $request['cover_image']->store('models/cover-images', 'public'),
            'id_number'          => $request['id_number'],
            'id_issuing_country' => $request['id_issuing_country'],
            'country_id'         => $request['country_id'],
            'state_id'           => $request['state_id'],
            'address'            => $request['address'],
            'id_photo'           => $request['id_photo']->store('models/id_photos', 'public'),
            'document'           => $request['document']->store('models/documents', 'public'),
        ]);
        foreach (json_decode($request['pricing']) as $pricing) {
            \App\Models\HostPricing::create([
                'host_id'    => $host->uuid,
                'user_id'    => $host->user_id,
                'pricing_id' => $pricing->pricing_id,
                'token'      => $pricing->token
            ]);
        }
    }
}
