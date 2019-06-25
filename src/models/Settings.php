<?php

namespace GlueAgency\Trigger\Models;

use craft\base\Model;

class Settings extends Model
{
    public $triggers = '';

    public function rules()
    {
        return [
            [['triggers'], 'required'],
        ];
    }
}