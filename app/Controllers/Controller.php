<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface;
use Valitron\Validator;
use App\Exceptions\ValidationException;

/**
 * The Base Controller all Controllers will extend.
 */
class Controller
{
    /**
     * Validate form requests.
     *
     * @param ServerRequestInterface  $request
     * @param array $rules
     * @return array $params
     * @throws ValidationException
     */
    public function validate(ServerRequestInterface $request, array $rules = [])
    {
        $validator = new Validator(
            $params = $request->getParsedBody()
        );

        $validator->mapFieldsRules($rules);

        if (!$validator->validate()) {
            throw new ValidationException(
                $validator->errors(),
                $request->getUri()->getPath()
            );
        }

        return $params;
    }
}