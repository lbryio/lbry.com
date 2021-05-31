<?php

class TeamActions extends Actions
{
    /**
     * A team member's page
     *
     * @param string $slug
     *
     * @return array
     */
    public static function executeBio(string $slug)
    {
        return ['content/bio', ['slug' => $slug]];
    }
}
