<?php

class System
{
    public function tipo_status(int $status)
    {
        switch ($status) {
            case 1:
                return "A iniciar";
            case 2:
                return "Iniciado";
            case 3:
                return "Concluído";
            case 4:
                return "Cancelado";
            default:
                # code...
                break;
        }
    }

    public function converter_data(string $data)
    {
        if (strtotime($data) !== -62169987208) {
            return date("d/m/Y", strtotime($data));
        }
    }
}