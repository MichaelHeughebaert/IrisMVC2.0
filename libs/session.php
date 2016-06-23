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
     * @param string $key Key of the session variable
     * @param string $value Value of the session variable
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Get the stored variable from the session.
     *
     * @param string $key Key of the session variable
     * @return string Value of the session variable
     */
    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        return '';
    }

    /**
     * Destroy the current session.
     */
    public static function destroy()
    {
        session_destroy();
    }
}