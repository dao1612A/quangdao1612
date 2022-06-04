<?php

function render_vote($doctor)
{
    if ($doctor->vote_total != 0)
    {
        return round(($doctor->vote_number / $doctor->vote_total) ,2);
    }

    return 0;
}
