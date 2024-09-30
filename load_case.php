<?php 
    header('Content-Type: application/json');

    require_once "config.php";

    $columns = ['casos.id_caso', 'user_form.nombre', 'casos.juzgado', 'casos.tipo_caso', 'casos.id_abogado','casos.descripcion', 'casos.estado'];
    $table = 'casos';
    $campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;
    $where = '';

    if ($campo != null) {
        $where = "WHERE (";
        $cont = count($columns);
        for ($i = 0; $i < $cont; $i++) {
            $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
        }
        $where = substr_replace($where, "", -3);
        $where .= ")";
    }

    $sql = "SELECT " . implode(',', $columns) . " FROM " . $table . " INNER JOIN user_form ON casos.id_usuario = user_form.id " . $where;
    $resultado = $conn->query($sql);
    $num_rows = $resultado->num_rows;

    $data = [];

    if ($num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $data[] = $row;
        }
    }

    echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>