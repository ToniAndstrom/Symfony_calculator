<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController


{
    #[Route("/", name: "calculator_page")]

    public function calculator(Request $request): Response
    {
        $number1 = $request->query->get("number1", "");
        $number2 = $request->query->get("number2", "");
        $operation = $request->query->get("operation", "");


        $value = "";
        if ($number1 ==0|| $number2 ==0 && $operation="division"){
            $value= "Cannot divide by zero";
        }
        switch ($operation) {
            case "add":
                $value = $number1 + $number2;
                break;
            case "subtract":
                $value = $number1 - $number2;
                break;
            case "multiply":
                $value = $number1 * $number2;
                break;
            case "divide":
                $value = $number1 / $number2;
                break;
            default:
                echo "invalid operation";
        }
      


        return $this->render(
            "calculator/index.html.twig",
            ["number1" => $number1, "number2" => $number2, "operation" => $operation, "value" => $value]


        );
    }
}
 
