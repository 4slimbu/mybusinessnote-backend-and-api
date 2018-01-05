<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\BusinessOptionResource;
use App\Models\Business;
use App\Models\BusinessOption;
use App\Models\Level;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class BusinessOptionController extends BaseApiController
{
    //TODO: improve this barely working code


    public function index($level, $section)
    {
        //get data
        $level = Level::where(function($q) use ($level) {
            $q->where('id', $level)
                ->orWhere('slug', $level);
        })->first();

        if (! $level) {
            return response()->json("Model not found", 400);
        }

        $section = Section::where(function($q) use ($section) {
                $q->where('id', $section)
                    ->orWhere('slug', $section);
        })->where('level_id', $level->id)->first();

        if (! $section) {
            return response()->json("Model not found", 400);
        }

        $business_option = BusinessOption::with('parent', 'children', 'affiliateLinks')
            ->where('section_id', $section->id)->first();

        if (! $business_option) {
            return response()->json("Model not found", 400);
        }

        $prev = $this->getPreviousRecord($section, $business_option);
        $next = $this->getNextRecord($section, $business_option);

        $links = [
            'self' => "/level/{$level->slug}/section/{$section->slug}/business-option/{$business_option->slug}",
        ];

        if ($prev) {
            $links['prev'] = "/level/{$level->slug}/section/{$prev->section->slug}/business-option/{$prev->slug}";
        }

        if ($next) {
            $links['next'] = "/level/{$level->slug}/section/{$next->section->slug}/business-option/{$next->slug}";
        }

        return (new BusinessOptionResource($business_option))->additional([
            'links' => $links
        ]);
    }

    public function show($level,$section,$business_option)
    {
        //get data
        $level = Level::where(function($q) use ($level) {
            $q->where('id', $level)
                ->orWhere('slug', $level);
        })->first();

        if (! $level) {
            return response()->json("Level not found", 400);
        }

        $section = Section::where(function($q) use ($section) {
            $q->where('id', $section)
                ->orWhere('slug', $section);
        })->where('level_id', $level->id)->first();

        if (! $section) {
            return response()->json("Section not found", 400);
        }

        $business_option = BusinessOption::with('parent', 'children', 'affiliateLinks')
            ->where('section_id', $section->id)
            ->where(function($q) use ($business_option) {
            $q->where('id', $business_option)
                ->orWhere('slug', $business_option);
        })->first();

        if (! $business_option) {
            return response()->json("Option not found", 400);
        }

        $prev = $this->getPreviousRecord($section, $business_option);
        $next = $this->getNextRecord($section, $business_option);

        $links = [
            'self' => "/level/{$level->slug}/section/{$section->slug}/business-option/{$business_option->slug}",
        ];

        if ($prev) {
            $links['prev'] = "/level/{$level->slug}/section/{$prev->section->slug}/business-option/{$prev->slug}";
        }

        if ($next) {
            $links['next'] = "/level/{$level->slug}/section/{$next->section->slug}/business-option/{$next->slug}";
        }

        return (new BusinessOptionResource($business_option))->additional([
            'links' => $links
        ]);
    }

    public function first(Level $level, Section $section)
    {
        $business_option = BusinessOption::where('section_id', $section->id)->first();

        if ($business_option) {
            return $this->show($level, $section, $business_option);
        }

        return response()->json(["not found"], 400);
    }

    public function save(Request $request)
    {

        if ($request->get("type") === "register_user") {
            $userResponse = null;

            //save user form
            //TODO: use db transaction
            $userResponse =  $this->userRegister($request);

            if ($request->get('user_id')) {
//                $user = User::find('id', $request->get('user_id'));
//                $user->fill($request->only('first_name', 'last_name', 'phone_number'))->save();
//                $business = $user->business;
//
//                $business->businessOptions()->attach([3 => ['status' => 'done']]);
//                $business->sections()->attach([2 => ['completed_percent' => 100]]);
//                $business->levels()->attach([1 => ['completed_percent' => 50]]);

                return response()->json([
                    'success' => true,
                    'message' => "User updated successfully"
                ], 201);
            } else {
                $business = Business::create([
                    'user_id' => $userResponse['user']->id,
                    'business_category_id' => $request->get('business_category_id'),
                    'sell_goods' => $request->get('sell_goods')
                ]);

                $business->businessOptions()->attach([2 => ['status' => 'done']]); //for business category
                $business->businessOptions()->attach([3 => ['status' => 'done']]);
                $business->sections()->attach([1 => ['completed_percent' => 100]]);
                $business->sections()->attach([2 => ['completed_percent' => 100]]);
                $business->levels()->attach([1 => ['completed_percent' => count($business->sections()) * 25]]);
            }



            if ($userResponse) {
                return response()->json([
                    'success' => true,
                    'token' => $userResponse['token']
                ], 201);
            }

        }

        if ($request->get("type") === "update_business") {
            $business = Business::where('id', $request->get('business_id'))->first();
            $business->update($request->only('business_name', 'website', 'abn'));

            $business->businessOptions()->detach($request->get('business_option_id'));
            $business->businessOptions()->attach([$request->get('business_option_id') => ['status' => 'done']]); //for business category

            $business->sections()->detach(3);
            $business->sections()->attach([3 => ['completed_percent' => 100]]);
            $business->levels()->detach(1);
            $business->levels()->attach([1 => ['completed_percent' => count($business->sections()) * 25]]);

            return response()->json([
                'success' => true,
                'message' => "Updated Successfully"
            ], 200);
        }

        return response()->json("Unable to save data", 500);
    }

    public function update(Request $request)
    {
        if ($request->get("type") === "user_register") {
            //save user form
        }

        if ($request->get("type") === "create_business") {
            //save user form
        }

    }

    public function getPreviousRecord($section, $business_option)
    {
        //if has children
        if ($child_business_option = $business_option->children->first()) {
            $next = BusinessOption::where('section_id', $section->id)
                ->where('parent_id', $child_business_option->parent_id)
                ->where('id', '<', $child_business_option->id)
                ->orderBy('id', 'desc')
                ->first();

            return $next;
        }

        //if has Sibling
        $nextSibling = BusinessOption::where('section_id', $section->id)
            ->where('parent_id', $business_option->parent_id)
            ->where('id', '<', $business_option->id)
            ->orderBy('id', 'desc')
            ->first();

        if ($nextSibling) {
            return $nextSibling;
        }

        //if has Parent
        if ($business_option->parent) {
            $nextParent = BusinessOption::where('section_id', $section->id)
                ->where('parent_id', $business_option->parent->id)
                ->where('id', '<', $business_option->parent->id)
                ->orderBy('id', 'desc')
                ->first();
            if ($nextParent) {
                return $nextParent;
            }
        }

        //if next section
        $nextSection = Section::where('level_id', $section->level_id)
            ->where('id', '<', $section->id)
            ->orderBy('id', 'desc')
            ->first();
        if ($nextSection) {
            $nextSectionFirstBusinessOption = BusinessOption::where('section_id', $nextSection->id)
                ->first();
            if ($nextSectionFirstBusinessOption) {
                return $nextSectionFirstBusinessOption;
            }
        }
    }

    public function getNextRecord($section, $business_option)
    {
        //if has children
        if ($child_business_option = $business_option->children->first()) {
            $next = BusinessOption::where('section_id', $section->id)
                ->where('parent_id', $child_business_option->parent_id)
                ->where('id', '>', $child_business_option->id)
                ->orderBy('id', 'asc')
                ->first();

            return $next;
        }

        //if has Sibling
        $nextSibling = BusinessOption::where('section_id', $section->id)
            ->where('parent_id', $business_option->parent_id)
            ->where('id', '>', $business_option->id)
            ->orderBy('id', 'asc')
            ->first();

        if ($nextSibling) {
            return $nextSibling;
        }

        //if has Parent
        if ($business_option->parent) {
            $nextParent = BusinessOption::where('section_id', $section->id)
                ->where('parent_id', $business_option->parent->id)
                ->where('id', '>', $business_option->parent->id)
                ->orderBy('id', 'asc')
                ->first();
            if ($nextParent) {
                return $nextParent;
            }
        }

        //if next section
        $nextSection = Section::where('level_id', $section->level_id)
            ->where('id', '>', $section->id)
            ->orderBy('id', 'asc')
            ->first();
        if ($nextSection) {
            $nextSectionFirstBusinessOption = BusinessOption::where('section_id', $nextSection->id)
                ->first();
            if ($nextSectionFirstBusinessOption) {
                return $nextSectionFirstBusinessOption;
            }
        }

        return null;
    }

    /**
     * API Register, on success return JWT Auth token
     *
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse
     */
    private function userRegister(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'password' => 'required',
        ];


        $input = $request->only('first_name', 'last_name', 'role_id', 'email', 'phone_number', 'password');
        $validator = Validator::make($input, $rules);

        if($validator->fails()) {
            $error = $validator->messages();
            return response()->json(['success'=> false, 'error'=> $error], 422);
        }

        //save data
        $input['role_id'] = 2; //role: customer
        $input['verified'] = 1; //email verification not required for now
        $user = User::create($input);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'verified' => 1
        ];

        try {
            // attempt to verify the credentials and create a token for the user
            $customClaims = [
                "user" => $user
            ];

            if (! $token = JWTAuth::attempt($credentials, $customClaims)) {
                return response()->json(['success' => false, 'error' => 'Invalid Credentials. Please make sure you entered the right information and you have verified your email address.'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return [
            'token' => $token,
            'user' => $user
        ];
    }

    /**
     * API Update User Info
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    private function userUpdate(Request $request, User $user)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
        ];


        $input = $request->only('first_name', 'last_name', 'phone_number', 'password');
        $validator = Validator::make($input, $rules);

        if($validator->fails()) {
            $error = $validator->messages();
            return response()->json(['success'=> false, 'error'=> $error], 422);
        }

        //save data
        $user->fill($input)->save();


        // all good so return the user
        return response()->json([
            'success' => true,
            'user' => $user
        ]);
    }

}
