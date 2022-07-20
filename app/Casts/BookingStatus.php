<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class BookingStatus implements CastsAttributes
{
    protected $statuses = ['', 'booked', 'approved', 'disapproved', 'canceled'];
    protected $statusesThai = ['', 'รออนุมัติ', 'อนุมัติแล้ว', 'ไม่อนุมัติ', 'ยกเลิกการจอง'];

    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return array
     */
    public function get($model, $key, $value, $attributes)
    {
        return $this->statusesThai[$value] ?? '#na';
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  array  $value
     * @param  array  $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes)
    {
        return array_search($value, $this->statuses);
    }

    public function __invoke(string $value): int
    {
        return array_search($value, $this->statuses);
    }
}
