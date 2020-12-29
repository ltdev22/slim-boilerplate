<?php

namespace App\Exceptions;

class ValidationException extends \Exception
{
    /**
     * The validation errors occured.
     *
     * @var array
     */
    protected $errors;

    /**
     * The url path in which the validation failed.
     *
     * @var string
     */
    protected $path;

    /**
     * Create a new instance.
     *
     * @param array $errors
     * @param string $path
     */
    public function __construct(array $errors, string $path)
    {
        $this->errors = $errors;
        $this->path = $path;
    }

    /**
     * Return any validation errors.
     *
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
    
    /**
     * Return the path where the validation failed.
     *
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }
}