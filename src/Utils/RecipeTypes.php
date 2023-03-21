<?php

namespace App\Utils;

enum RecipeTypes: string
{
    case Starter = "entrée";
    case Dish = "plat";
    case Dessert = "dessert";
}
