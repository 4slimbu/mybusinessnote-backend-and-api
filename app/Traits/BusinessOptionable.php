<?php
namespace App\Traits;

use App\Models\BusinessOption;
use App\Models\Level;
use App\Models\Section;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

trait BusinessOptionable
{
    /**
     * @param $level
     * @param $section
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Http\JsonResponse|null|static
     */
    private function getFirstBusinessOption($level, $section)
    {
        try {
            // Get Business Option
            $business_option = BusinessOption::with('parent', 'children', 'level', 'section', 'affiliateLinks')
                ->where('level_id', $level->id)
                ->where('section_id', $section->id)->first();

            return $business_option;
        } catch (\Exception $exception){
            throw new ModelNotFoundException('not_found', 400);
        }
    }

    private function getBusinessOption($level, $section, $business_option)
    {
        try {
            // Get Business Option
            $business_option = BusinessOption::with('parent', 'children', 'level', 'section', 'affiliateLinks')
                ->where('level_id', $level->id)
                ->where('section_id', $section->id)
                ->where('id', $business_option->id)
                ->first();

            return $business_option;
        } catch (\Exception $exception){
            throw new ModelNotFoundException('not_found', 400);
        }
    }

    /**
     * This returns next business-option determined by menu-order
     * filtered by business_category_id
     *
     * Complex oldGetNextRecord has been deprecated in favour of this simple solution.
     *
     * Old used complex calculation to find next child or next sibling or next section etc.
     * This one uses more straight forward search using menu-order which will always put
     * favourable child, sibling or section next to current business-option. This will be achieved
     * by using drag-and-drop feature in the backend.
     *
     * @param $level
     * @param $section
     * @param $business_option
     * @param $business_category_id
     * @return null
     */
    private function getNextRecord($level, $section, $business_option, $business_category_id)
    {
        try {
            $next = BusinessOption::where('id', '>', $business_option->id)
                ->where('level_id', $level->id)
                ->where('section_id', $section->id)
                ->orderBy('id', 'asc')
                ->first();

            if ($business_category_id) {
                if (count($next->businessCategories)) {
                    $business_categories = $next->businessCategories->pluck('id')->toArray();
                    if (!in_array($business_category_id, $business_categories)) {
                        $this->getNextRecord($level, $section, $next, $business_category_id);
                    }
                }
            }
            return $next;
        } catch (\Exception $exception) {
            throw new ModelNotFoundException('not_found', 400);
        }

    }

    /**
     * This returns previous business-option determined by menu-order
     * filtered by business_category_id
     *
     * Complex oldGetNextRecord has been deprecated in favour of this simple solution.
     *
     * Old used complex calculation to find previous child or previous sibling or previous section etc.
     * This one uses more straight forward search using menu-order which will always put
     * favourable child, sibling or section previous to current business-option. This will be achieved
     * by using drag-and-drop feature in the backend.
     *
     * @param $level
     * @param $section
     * @param $business_option
     * @param $business_category_id
     * @return null
     */
    private function getPreviousRecord($level, $section, $business_option, $business_category_id)
    {
        try {
            $previous = BusinessOption::where('id', '<', $business_option->id)
                ->where('level_id', $level->id)
                ->where('section_id', $section->id)
                ->orderBy('id', 'desc')
                ->first();

            if ($business_category_id) {
                if (count($previous->businessCategories)) {
                    $business_categories = $previous->businessCategories->pluck('id')->toArray();
                    if (!in_array($business_category_id, $business_categories)) {
                        $this->getPreviousRecord($level, $section, $previous, $business_category_id);
                    }
                }
            }

            return $previous;
        } catch (\Exception $exception) {
            throw new Exception('not_found', 400);
        }

    }

    /**
     * This method has been deprecated to more simple solution.
     *
     * @param $section
     * @param $business_option
     * @return null
     * @internal param $level
     * @internal param $business_category_id
     */
    private function oldGetPreviousRecord($section, $business_option)
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

    /**
     * This method has been deprecated to more simple solution.
     *
     * @param $level
     * @param $section
     * @param $business_option
     * @param $business_category_id
     * @return null
     */
    private function oldNetNextRecord($level, $section, $business_option, $business_category_id)
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

    /*
    |--------------------------------------------------------------------------
    | Private Helper Functions
    |--------------------------------------------------------------------------
    */


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
                return response()->json(['success' => false, 'error' => 'Invalid Credentials.'], 401);
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