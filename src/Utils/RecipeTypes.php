<?php

namespace App\Utils;


enum RecipeTypes: string
{
    case Starter = "Entrée";
    case Dish = "Plat";
    case Dessert = "Dessert";
}
