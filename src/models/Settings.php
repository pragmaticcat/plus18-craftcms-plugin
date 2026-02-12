<?php

namespace pragmatic\plus18\models;

use craft\base\Model;

class Settings extends Model
{
    public bool $enabled = true;
    public string $cookieName = 'silverbranch_age_check';
    public int $cookieDays = 1;
    public int $minimumAge = 18;
    public ?string $logoUrl = null;
    public bool $showNoButton = false;
    public ?string $underageUrl = null;

    /**
     * @var array<string,array{previousText?:string,yesText?:string,noText?:string,afterText?:string}>
     */
    public array $translations = [];

    public function rules(): array
    {
        return [
            [['enabled', 'showNoButton'], 'boolean'],
            [['cookieName'], 'required'],
            [['cookieName', 'logoUrl', 'underageUrl'], 'string'],
            [['cookieDays', 'minimumAge'], 'integer', 'min' => 1],
            [['translations'], 'safe'],
            [['logoUrl', 'underageUrl'], 'default', 'value' => null],
        ];
    }
}
