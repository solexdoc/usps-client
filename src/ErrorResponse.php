<?php


namespace USPS;


class ErrorResponse
{
    private int $errorCode = 0;

    private string $errorMessage = '';

    public function __construct(int $errorCode, string $errorMessage)
    {
        $this->errorCode = $errorCode;
        $this->errorMessage = $errorMessage;
    }


    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

    /**
     * @param int $errorCode
     * @return ErrorResponse
     */
    public function setErrorCode(int $errorCode): ErrorResponse
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     * @return ErrorResponse
     */
    public function setErrorMessage(string $errorMessage): ErrorResponse
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }


}