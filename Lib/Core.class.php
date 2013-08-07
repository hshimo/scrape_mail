<?php
/**
 * Core class
 *
 *
 *
 */
class Core {


    // include model file & return model object
    public function model($model_name) {
        $model_file = SM_MODEL_PATH . DS . ucwords($model_name) . 'Model.php';
        if (!file_exists($model_file)) {
            // TODO throw error
            die("model file not found. file: " . $model_file);
        }
        require_once $model_file;
        $model_class_name = $model_name . 'Model';
        $model = new $model_class_name();

        return $model;
    }


}