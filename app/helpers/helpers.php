<?php
function convert_date($value)
{
    return Date('H:i:s - d M Y', strtotime($value));
}
