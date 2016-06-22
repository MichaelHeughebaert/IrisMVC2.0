<?php

namespace libs;

class Session
{
    /**
     * Initialize session.
     */
    public static function init()
    {
        @session_start();
    }

    /**
     * Store the key/variable combination in the session.
     *
     * @param $key string
     * @param $value string
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Get the stored variable from the session.
     *
     * @param $key string
     * @return string|bool
     */
    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        return false;
    }

    /**
     * Destroy the current session.
     */
    public static function destroy()
    {
        session_destroy();
    }
}