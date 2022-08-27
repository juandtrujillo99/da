<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/galeria/Entrada.inc.php';

class RepositorioEntradaGaleria {

    public static function insertar_entrada($conexion, $entrada) {
        $entrada_insertada = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO galeria(autor_id, url, imagen, texto, fecha, activa) VALUES(:autor_id, :url, :imagen, :texto, NOW(), :activa)";

                $activa = 0;

                if ($entrada -> esta_activa()) {
                    $activa = 1;
                }

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':autor_id', $entrada -> obtener_autor_id(), PDO::PARAM_STR);
                $sentencia -> bindParam(':url', $entrada -> obtener_url(), PDO::PARAM_STR);
                $sentencia -> bindParam(':imagen', $entrada -> obtener_imagen(), PDO::PARAM_STR);
                $sentencia -> bindParam(':texto', $entrada -> obtener_texto(), PDO::PARAM_STR);
                $sentencia -> bindParam(':activa', $activa, PDO::PARAM_STR);

                $entrada_insertada = $sentencia -> execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $entrada_insertada;
    }

    public static function obtener_cuatro_por_fecha_descendente($conexion) {
        $entradas = [];

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM galeria ORDER BY fecha DESC LIMIT 3";//aqui se modifica el numero de entradas que deben aparecer en una pagina especifica

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> execute();

                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {

                        $entradas[] = new EntradaGaleria(
                                $fila['id'], $fila['autor_id'], $fila['url'], $fila['imagen'],
                                $fila['texto'], $fila['fecha'], $fila['activa']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR: '.$ex -> getMessage();
            }
        }
        return $entradas;
    }

    public static function obtener_todas_por_fecha_descendiente($conexion) {
        $entradas = [];

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM galeria ORDER BY fecha DESC LIMIT 40";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> execute();

                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {

                        $entradas[] = new EntradaGaleria(
                                $fila['id'], $fila['autor_id'], $fila['url'], $fila['imagen'],
                                $fila['texto'], $fila['fecha'], $fila['activa']
                        );

                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR: '.$ex -> getMessage();
            }
        }

        return $entradas;
    }

    public static function obtener_entrada_por_url($conexion, $url) {
        $entrada = null;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM galeria WHERE url LIKE :url";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':url', $url, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $entrada = new EntradaGaleria(
                            $resultado['id'], $resultado['autor_id'], $resultado['url'], $resultado['imagen'], 
                            $resultado['texto'], $resultado['fecha'],
                            $resultado['activa']
                            );
                }
            } catch (PDOException $ex) {
                print 'ERROR'. $ex -> getMessage();
            }
        }

        return $entrada;
    }

    public static function obtener_entrada_por_id($conexion, $id) {
        $entrada = null;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM galeria WHERE id = :id";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $entrada = new EntradaGaleria(
                            $resultado['id'], $resultado['autor_id'], $resultado['url'], $resultado['imagen'], 
                            $resultado['texto'], $resultado['fecha'],
                            $resultado['activa']
                            );
                }
            } catch (PDOException $ex) {
                print 'ERROR'. $ex -> getMessage();
            }
        }

        return $entrada;
    }

    public static function obtener_entradas_al_azar($conexion, $limite) {
        $entradas = [];

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM galeria ORDER BY fecha DESC /*RAND()*/ LIMIT $limite";//esta ordenado por fecha del mas reciente al mas antiguo

                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $entradas[] = new EntradaGaleria(
                            $fila['id'], $fila['autor_id'], $fila['url'], $fila['imagen'],
                                $fila['texto'], $fila['fecha'], $fila['activa']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }

        return $entradas;
    }

    public static function contar_entradas_activas_admin($conexion, $id_admin) {
        $total_entradas = '0';

        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) as total_entradas FROM galeria WHERE autor_id = :autor_id AND activa = 1";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':autor_id', $id_admin, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if(!empty($resultado)) {
                    $total_entradas = $resultado['total_entradas'];
                }
            } catch (PDOException $ex) {
                print 'ERROR'.$ex -> getMessage();
            }
        }

        return $total_entradas;
    }

    public static function contar_entradas_inactivas_admin($conexion, $id_admin) {
        $total_entradas = '0';

        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) as total_entradas FROM galeria WHERE autor_id = :autor_id AND activa = 0";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':autor_id', $id_admin, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if(!empty($resultado)) {
                    $total_entradas = $resultado['total_entradas'];
                }
            } catch (PDOException $ex) {
                print 'ERROR'. $ex -> getMessage();
            }
        }

        return $total_entradas;
    }

    public static function obtener_entradas_admin_fecha_descendente($conexion, $id_admin) {
        $entradas_obtenidas = [];

        if (isset($conexion)) {
            try {
                $sql = "SELECT a.id, a.autor_id, a.url, a.imagen, a.texto, a.fecha, a.activa, COUNT(b.id) AS 'cantidad_comentarios' ";
                $sql .= "FROM galeria a ";
                $sql .= "LEFT JOIN comentarios b ON a.id = b.entrada_id ";
                $sql .= "WHERE a.autor_id = :autor_id ";
                $sql .= "GROUP BY a.id ";
                $sql .= "ORDER BY a.fecha DESC";

                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':autor_id', $id_admin, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $entradas_obtenidas[] = array(
                            new EntradaGaleria(
                                $fila['id'], $fila['autor_id'], $fila['url'], $fila['imagen'],
                                $fila['texto'], $fila['fecha'], $fila['activa']
                            ),
                            $fila['cantidad_comentarios']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }

        return $entradas_obtenidas;
    }


    public static function url_existe($conexion, $url) {
        $url_existe = true;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM galeria WHERE url = :url";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':url', $url, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    $url_existe = true;
                } else {
                    $url_existe = false;
                }
            } catch(PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }

        return $url_existe;
    }

    public static function eliminar_comentarios_y_entrada($conexion, $entrada_id) {
        if (isset($conexion)) {
            try {
                $conexion -> beginTransaction();

                $sql1 = "DELETE FROM comentarios WHERE entrada_id=:entrada_id";
                $sentencia1 = $conexion -> prepare($sql1);
                $sentencia1 -> bindParam(':entrada_id', $entrada_id, PDO::PARAM_STR);
                $sentencia1 -> execute();

                $sql2 = "DELETE FROM galeria WHERE id=:entrada_id";
                $sentencia2 = $conexion -> prepare($sql2);
                $sentencia2 -> bindParam(':entrada_id', $entrada_id, PDO::PARAM_STR);
                $sentencia2 -> execute();

                $conexion -> commit();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
                $conexion -> rollBack();
            }
        }
    }

    public static function actualizar_entrada($conexion, $id, $url, $imagen, $texto, $activa) {
        $actualizacion_correcta = false;

        if (isset($conexion)) {
            try {

                $sql = "UPDATE galeria SET url = :url, imagen = :imagen, texto = :texto, activa = :activa WHERE id = :id";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':url', $url, PDO::PARAM_STR);
                $sentencia -> bindParam(':imagen', $imagen, PDO::PARAM_STR);
                $sentencia -> bindParam(':texto', $texto, PDO::PARAM_STR);
                $sentencia -> bindParam(':activa', $activa, PDO::PARAM_STR);
                $sentencia -> bindParam(':id', $id, PDO::PARAM_STR);

                $sentencia -> execute();

                $resultado = $sentencia -> rowCount();

                if (count((array)$resultado)) {
                    $actualizacion_correcta = true;
                } else {
                    $actualizacion_correcta = false;
                }
            } catch(PDOException $ex) {
                print 'ERROR ' . $ex -> getMessage();
            }
        }

        return $actualizacion_correcta;
    }

    public static function buscar_entradas_todos_los_campos($conexion, $termino_busqueda) {
        $entradas = [];

        $termino_busqueda = '%' . $termino_busqueda . '%';

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM galeria WHERE texto LIKE :busqueda ORDER BY fecha DESC LIMIT 25";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':busqueda', $termino_busqueda, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $entradas[] = new EntradaGaleria(
                            $fila['id'], $fila['autor_id'], $fila['url'], $fila['imagen'],
                                $fila['texto'], $fila['fecha'], $fila['activa']
                        );
                    }
                }

            } catch(PDOException $ex) {
                print 'ERROR ' . $ex -> getMessage();
            }
        }

        return $entradas;
    }

    public static function buscar_entradas_por_titulo($conexion, $termino_busqueda) {
        $entradas = [];

        $termino_busqueda = '%' . $termino_busqueda . '%';

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM galeria WHERE titulo LIKE :busqueda ORDER BY fecha DESC LIMIT 25";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':busqueda', $termino_busqueda, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $entradas[] = new EntradaGaleria(
                            $fila['id'], $fila['autor_id'], $fila['url'], $fila['imagen'],
                                $fila['texto'], $fila['fecha'], $fila['activa']
                        );
                    }
                }

            } catch(PDOException $ex) {
                print 'ERROR ' . $ex -> getMessage();
            }
        }

        return $entradas;
    }

    public static function buscar_entradas_por_contenido($conexion, $termino_busqueda) {
        $entradas = [];

        $termino_busqueda = '%' . $termino_busqueda . '%';

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM galeria WHERE texto LIKE :busqueda ORDER BY fecha DESC LIMIT 25";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':busqueda', $termino_busqueda, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $entradas[] = new EntradaGaleria(
                            $fila['id'], $fila['autor_id'], $fila['url'], $fila['imagen'],
                                $fila['texto'], $fila['fecha'], $fila['activa']
                        );
                    }
                }

            } catch(PDOException $ex) {
                print 'ERROR ' . $ex -> getMessage();
            }
        }

        return $entradas;
    }

    public static function buscar_entradas_por_etiqueta($conexion, $termino_busqueda) {
        $entradas = [];

        $termino_busqueda = '%' . $termino_busqueda . '%';

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM galeria WHERE etiqueta LIKE :busqueda ORDER BY fecha DESC LIMIT 25";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':busqueda', $termino_busqueda, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $entradas[] = new EntradaGaleria(
                            $fila['id'], $fila['autor_id'], $fila['url'], $fila['imagen'],
                                $fila['texto'], $fila['fecha'], $fila['activa']
                        );
                    }
                }

            } catch(PDOException $ex) {
                print 'ERROR ' . $ex -> getMessage();
            }
        }

        return $entradas;
    }

    public static function buscar_entradas_por_autor($conexion, $termino_busqueda) {
        $entradas = [];

        $termino_busqueda = '%' . $termino_busqueda . '%';

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM galeria e JOIN administradores u ON u.id = e.autor_id WHERE u.nombre LIKE :busqueda ORDER BY e.fecha DESC LIMIT 25";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':busqueda', $termino_busqueda, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $entradas[] = new EntradaGaleria(
                            $fila['id'], $fila['autor_id'], $fila['url'], $fila['imagen'],
                                $fila['texto'], $fila['fecha'], $fila['activa']
                        );
                    }
                }

            } catch(PDOException $ex) {
                print 'ERROR ' . $ex -> getMessage();
            }
        }

        return $entradas;
    }
}
