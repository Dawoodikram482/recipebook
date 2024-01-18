<?php
enum Category: string
{
    case Breakfast = 'Breakfast';
    case Lunch = 'Lunch';
    case Dinner = 'Dinner';

    public function type(): string
    {
        return static::getType($this);
    }
    public static function getType(self $value): string
    {
        return match ($value) {
            Category::Breakfast => 'Breakfast',
            Category::Lunch => 'Lunch',
            Category::Dinner => 'Dinner',
        };
    }
}

