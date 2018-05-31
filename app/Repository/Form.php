<?php
namespace App\Repository;
use DB;
class Form {
    static function geraHtml($table) {
        $html = '';
        $options = '';
        $driver = DB::connection()->getConfig('driver');
        if ($driver === 'mysql') {
            $query = "SELECT COLUMN_NAME, CHARACTER_MAXIMUM_LENGTH, COLUMN_COMMENT, IS_NULLABLE FROM information_schema.columns WHERE table_name ='$table'";
        }
        if ($driver === 'pgsql') {
            $query = "SELECT a.attname as COLUMN_NAME, (CASE (a.atttypmod < 0) WHEN TRUE THEN a.attlen ELSE a.atttypmod - 4 END) AS CHARACTER_MAXIMUM_LENGTH, col_description(c.oid, a.attnum) AS COLUMN_COMMENT, (CASE (a.attnotnull) WHEN TRUE THEN 'NO' ELSE 'YES' END) as IS_NULLABLE FROM pg_class c INNER JOIN pg_attribute a ON (c.oid = a.attrelid) WHERE c.relname = '$table' and col_description(c.oid, a.attnum) <> 'NULL'";
        }
        foreach (DB::select($query) as $params) {
            if ($params->COLUMN_COMMENT) {
                $detalhes = explode('|', $params->COLUMN_COMMENT);
                if ($params->IS_NULLABLE == 'NO') {
                    $req = '*';
                } else {
                    $req = '';
                }
                switch ($detalhes[0]) {
                    case 'text':
                        $elemento = '<div class="form-group"><label for=' . $params->COLUMN_NAME . ' class="col-sm-2 control-label">' . trim($detalhes[1]) . '<small class="text-danger"> ' . $req . '</small></label><div class="col-sm-10"><input type="text" maxlength="' . $params->CHARACTER_MAXIMUM_LENGTH . '" class="form-control campo tabula" id="' . trim($params->COLUMN_NAME) . '" name="' . trim($params->COLUMN_NAME) . '" placeholder="' . trim($detalhes[2]) . '"></div></div>';
                        break;
                    case 'simNao':
                        $elemento = '<div class="form-group"><label for=' . $params->COLUMN_NAME . ' class="col-sm-2 control-label">' . trim($detalhes[1]) . '<small class="text-danger">  ' . $req . '</small></label><div class="col-sm-10"><select class="form-control campo tabula" id="' . trim($params->COLUMN_NAME) . '" name="' . trim($params->COLUMN_NAME) . '"><option value="">Selecione...</option><option value="n">Não</option><option value="s">Sim</option></select></div></div>';
                        break;
                    case 'combo':
                        foreach (DB::select("SELECT id, nome FROM $detalhes[1] order by nome") as $dados) {
                            $options .= '<option value="' . $dados->id . '">' . $dados->nome . '</option>';
                        }
                        $elemento = '<div class="form-group"><label for=' . $params->COLUMN_NAME . ' class="col-sm-2 control-label">' . trim($detalhes[2]) . '<small class="text-danger">  ' . $req . '</small></label><div class="col-sm-10"><select class="form-control campo tabula" id="' . trim($params->COLUMN_NAME) . '" name="' . trim($params->COLUMN_NAME) . '"><option value="">Selecione...</option>' . $options . '</select></div></div>';
                        break;
                    default :
                        $elemento = '';
                }
                $html .= $elemento;
            }
        }
        return $html;
    }
}