<?php declare(strict_types=1);

namespace App\Utils\HandleErrors;

/**
 * Class ErrorMessage
 * @package App\Utils\HandleErrors
 */
final class ErrorMessage
{
    /**
     * @param string $status
     * @param string $message
     * @param array  $messageList
     * @param string $messageKey
     *
     * @return string
     */
    public static function getErrorMessage(string $status,
                                           string $message,
                                           array $messageList,
                                           string $messageKey ="message"): string
    {
        $errormsg["status"]    = $status;
        $errormsg[$messageKey] = empty($message) ? $messageList : $message;

        return json_encode($errormsg);
    }

    /**
     * @param array  $messageList
     * @param string $messageKey
     *
     * @return string
     */
    public static function getErrorData(array $messageList, string $messageKey = "data"): string
    {
        return self::getErrorMessage("error", "", $messageList, $messageKey);
    }

    /**
     * @param array $messageList
     *
     * @return string
     */
    public static function getMessageToJson(array $messageList): string
    {
        return json_encode($messageList);
    }
}
