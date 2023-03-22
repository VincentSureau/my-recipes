<?php

namespace App\Utils;

enum RecipeKind: string
{
    case Entrée = "entrée";
    case Plat = "plat";
    case Dessert = "dessert";
    case Gourmandises = "gourdmandises";
}
