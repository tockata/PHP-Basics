<?php
$variable = (object)[2,34];
$type = gettype($variable);

switch ($type) {
	case 'integer':
    case 'double':
		echo var_dump($variable);
		break;
    case 'boolean':
    case 'string':
    case 'array':
    case 'object':
        echo $type;
        break;
	default: break;
}
?>