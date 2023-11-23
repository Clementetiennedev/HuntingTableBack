<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
        /**
         * Get a JWT via given credentials.
         *
         * @return \Illuminate\Http\JsonResponse
         */
    public function login(Request $request): JsonResponse
    {
        $messages = [
            'email.required' => __('lang.email.required'),
            'email.email' => __('lang.email.email'),
            'password.required' => __('lang.password.required'),
            'password.min' => __('lang.password.min'),
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], $messages);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::where('email', $request->input('email'))->first();
        if (!$user) {
            return response()->json([
                'message' => __('lang.login.bad_credentials'),
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        $user->refresh_token = $token;
        $user->remember_token = $token;
        //$user->device_token = $request->input('device_token');
        $user->save();

        //NotificationController::store('Connexion', 'Vous êtes connecté !');

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

        /**
         * Refresh a token.
         *
         * @return \Illuminate\Http\JsonResponse
         */
        public function refresh()
        {
            return $this->respondWithToken(auth()->refresh());
        }

        /**
         * Get the token array structure.
         *
         * @param  string $token
         *
         * @return \Illuminate\Http\JsonResponse
         */
        protected function respondWithToken($token): JsonResponse
        {
            return response()->json([
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ]);
        }

        public function register(Request $request) : JsonResponse
    {
        $messages = [
            'email.required' => __('lang.email.required'),
            'email.email' => __('lang.email.email'),
            'email.unique' => __('lang.email.unique'),
            'password.required' => __('lang.password.required'),
            'password.min' => __('lang.password.min'),
            'confirm_password.required' => __('lang.confirm_password.required'),
            'confirm_password.same' => __('lang.confirm_password.same'),
            'role_id.required' => __('lang.role_id.required'),
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'role_id' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create(
            [
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'email_verified_at' => now(),
                'role_id' => $request->input('role_id'),
            ]
        );

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout(Request $request) : JsonResponse
    {
        $user = $request->user();
        if ($user) {
            $tokenId = $user->currentAccessToken()->id;
            $user->tokens()->where('id', $tokenId)->delete();
            return response()->json(['message' => ('lang.logout')]);
        }
        return response()->json(['error' => ('lang.unauthorized')], 403);
    }

    public function me(Request $request) : JsonResponse
    {
        $user = User::where('id', $request->user()->id)
            ->with('rank', 'role', 'badges', 'medias', 'comments', 'likes', 'badges.badge')
            ->first();

        if ($user) {
            return response()->json($user);
        }
        return response()->json(['error' => ('lang.unauthorized')], 403);
    }
}
