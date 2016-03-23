<?php

namespace App\Http\Controllers;

use Dingo\Api\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Dingo\Api\Exception\ValidationHttpException;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use Helpers;

    /*Fixes dingo/api form request validation https://github.com/dingo/api/wiki/Errors-And-Error-Responses#form-requests*/
    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = [])
    {
        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages, $customAttributes);

        if ($validator->fails()) {
            throw new ValidationHttpException($validator->errors());
        }
        return $validator->getData();

        return $this->normalizeBrowserPostData($request, $rules);
    }

    /**
     * normalize post data coming in, some browsers post empty strings, some do not.
     * @param $request
     * @param $rules
     * @return array
     */
    public function normalizeBrowserPostData(Request $request, array $rules)
    {
        foreach($rules as $key => $rule)
        {
            $input[] = $key;
            if (strpos($rule,'confirmed') !== false)
            {
                $input[]  = $key . '_confirmation';
            }
        }
        return $request->only($input);
    }
}
