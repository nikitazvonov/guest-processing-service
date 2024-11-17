<?php

namespace App\Models\Guest;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property int $phone_code
 * @property string $phone_number
 * @property string $phone
 * @property string|null $country
 * @property string $created_at
 * @property string $updated_at
 */
final class Guest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'guests';

    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone_code',
        'phone_number',
        'country',
    ];

    /**
     * Получить полный номер телефона
     */
    protected function phone(): Attribute
    {
        return Attribute::make(
            get: fn () => "+$this->phone_code".$this->phone_number,
        );
    }
}
