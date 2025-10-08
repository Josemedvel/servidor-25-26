<?php
if(isset($_GET["operand_1"], $_GET["operand_2"], $_GET["operator"]) 
        && $_GET["operand_1"] != "" 
        && $_GET["operand_2"] != "" 
        && $_GET["operator"] != ""){
        
            $op_1 = (int)$_GET["operand_1"];
            $op_2 = (int)$_GET["operand_2"];
            $operator = $_GET["operator"];
            $resultado = 0;

            switch($operator){
                case "plus":
                    $resultado = $op_1 + $op_2;
                    break;
                case "minus":
                    $resultado = $op_1 - $op_2;
                    break;
                case "multiply":
                    $resultado = $op_1 * $op_2;
                    break;
                case "divide":
                    if($op_2 == 0){
                        $resultado = "El divisor no puede ser 0";
                    }else{
                        $resultado = $op_1 / $op_2;
                    }
                    break;
                case "power":
                    if($op_1 == 0 && $op_2 == 0){
                        $resultado = "No se puede calcular 0 elevado a 0";
                    }else{
                        $resultado = $op_1 ** $op_2;
                    }
                    break;
                default:
                    $resultado = "Ese operador no existe";
            }
    }else{
        $operator = "+";
        $op_1 = "";
        $op_2 = "";
    }
    ?>
<form action="#" method="get">
    <input type="number" name="operand_1" value=<?=$op_1?>>
    <br>
    <select name="operator">
        <option value="plus" <?php if($operator == "plus"){echo "selected";} ?>>+</option>
        <option value="minus" <?php if($operator == "minus"){echo "selected";} ?>>-</option>
        <option value="divide" <?php if($operator == "divide"){echo "selected";} ?>>/</option>
        <option value="multiply" <?php if($operator == "multiply"){echo "selected";} ?>>*</option>
        <option value="power" <?php if($operator == "power"){echo "selected";} ?>>potencia</option>
    </select>
    <br>
    <input type="number" name="operand_2" value=<?=$op_2?>>
    <input type="submit" value="Calcular">
</form>
<?php
    echo "<h2>$resultado</h2>";
?>
